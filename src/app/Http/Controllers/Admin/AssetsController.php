<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class AssetsController extends AdminBaseController
{
    use Helpers;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
        return view('admin.assets.index');
    }
    /**
     * [getAsset description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getAsset(Request $request)
    {
        try {
            $start = 1;
            $length = $request->get('length');
            $order = $request->order[0]['dir'] ?: 'desc';
            $sort = $request->columns[0]['name'] ?: 'created_at';
            if ($request->get('start') > 0) {
                $start = ((int) ($request->get('start') / $length)) + 1;
            }
            $q = null;
            if (!empty($request->search['value'])) {
                $q = $request->search['value'];
            }

            $response = $this->api->with(['auth' => $this->user, 'per_page' => $length, 'page' => $start, 'sort' => $sort, 'order' => $order])->get('api/asset?search=' . $q);
            $response['recordsTotal'] = $response['meta']['total'];
            $response['recordsFiltered'] = $response['meta']['total'];
            $response['draw'] = $request->get('draw');
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
        return $response;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postCategoryForm(Request $request)
    {

        $validatedData = $request->validate([
            'property_category' => 'required',
            'property_type' => 'required',
            'property_sub_type' => 'required_unless:property_type,vehicles,stock,others',
            'description' => 'required_if:property_type,vehicles,stock,others'
        ]);

        $property_category = $request->property_category;
        $property_type = $request->property_type;
        $property_sub_type = $request->property_sub_type;
        $description = $request->description;

        // $template_id = null;
        // if ($property_type == "vehicles" || $property_type == "others" || $property_type == "stock") {
        $template_id = \Config::get('assets.templates.' . $property_type);
        // }

        if (isset($request->property_sub_type)) {
            $template_id = \Config::get('assets.templates.' . $property_sub_type);
        }

        return redirect()->route('step1')->with([
            'property_category' => $property_category,
            'property_type' => $property_type,
            'property_sub_type' => $property_sub_type,
            'description' => $description,
            'template_id' => $template_id
        ]);
    }

    public function getStep1(Request $request, $asset_id = null)
    {
        try {

            $categories_data = [
                'property_category' => Session::get('property_category'),
                'property_type' => Session::get('property_type') ?? $request->old('customer.property_type'),
                'property_sub_type' => Session::get('property_sub_type'),
                'description' => Session::get('description') ?? $request->old('customer.description'),
                'template_id' => Session::get('template_id') ?? $request->old('template_id')
            ];

            $step = 1;
            $assets = array();
            $property_id = "";
            $banklist_and_state = $this->api->with(['auth' => $this->user])->get('api/commondata');
            $categories_data['banklist_and_state'] = $banklist_and_state;

            //Migrating Branch Array
            $migrating_branchs = $this->getMigratingBranch();
            $migrating_branchs = $migrating_branchs['data'] ;
            // dd($migrating_branchs['data']);
            // Microm Market
            $micromarkets = $this->getMicromarket();
            $micromarkets = $micromarkets['data'];
            $completed_before = null;

            if (isset($asset_id)) {
                $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=1');
                
                $completed_before = $assets['next_step'];
                if (isset($assets['customer'])) {
                    $categories_data['property_category'] = $assets['customer']['property_category'];
                    // dd($assets);
                    $property_id = $assets['property_id'];
                    $categories_data['property_type'] = $assets['customer']['property_type'];
                    $categories_data['property_sub_type'] = ($assets['customer']['property_sub_type']) ?? null;
                    $categories_data['description'] = $assets['customer']['description'] ?? null;
                    $categories_data['template_id'] = $assets['template_id'] ?? null;
                }
            }

            if (!isset($categories_data['template_id'])) {
                return redirect('assets/create')->withError(['message' => 'Please select categories.']);
            }

            return view('admin.assets.step1.step1', $categories_data, compact('assets', 'asset_id', 'step', 'completed_before', 'property_id','migrating_branchs','micromarkets'));
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function postStep1(Request $request, $asset_id = null)
    {

        $validator = Validator::make($request->all(), [
            'customer.property_category' => 'required',
            'customer.property_type' => 'required',
            'customer.property_sub_type' => 'required_unless:customer.property_type,vehicles,stock,others',
            'customer.description' => 'required_if:customer.property_type,vehicles,stock,others'
        ]);

        if ($validator->fails()) {
            return redirect('assets/create')->withErrors($validator);
        }
        try {

            $data = $request->only('customer', 'loan', 'address', 'account_no', 'stock_other', 'recorded_by', 'entry_status', 'template_id');

            if (isset($asset_id)) {
                $response = $this->api->with(['auth' => $this->user])->put('api/asset/' . $asset_id, $data);
            } else {

                $data['status'] = "pending";
                if (in_array($request->template_id, config('template.sections.stock_other'))) {
                    $data['status'] = "completed";
                }
                $template_id = $request->template_id;
                $data['next_step'] = config('template.steps.' . $template_id . '.1');
                $response = $this->api->with(['auth' => $this->user])->post('api/asset', $data);
            }

            if (in_array($request->template_id, config('template.sections.stock_other'))) {
                return redirect('assets/')->withSuccess(['message' => 'Asset added Successfully']);
            }
            return redirect()->route('step2', $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function getStep2(Request $request, $asset_id)
    {
        try {
            $step = 2;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=2');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 2) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }

                return view('admin.assets.step2.step2', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }

        // return view('admin.assets.step2.step2', compact('asset_id', 'template_id'));
    }

    public function postStep2(Request $request, $asset_id)
    {

        try {
            $step_info = $this->stepInfo($asset_id);
            $template_id = $step_info['template_id'];
            $next_step = config('template.steps.' . $template_id . '.2');
            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 2) {
                    $request->merge(['next_step' => $next_step]);
                }
            }
            $response = $this->api->with(['auth' => $this->user])->put('api/updatesteptwo/' . $asset_id, $request->except(['_token', '_url']));
            return redirect()->route('step' . $next_step, $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {

            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function getStep3(Request $request, $asset_id)
    {

        try {
            $step = 3;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=3');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 3) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }

                return view('admin.assets.step3.step3', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function postStep3(Request $request, $asset_id)
    {
        try {
            $step_info = $this->stepInfo($asset_id);
            $template_id = $step_info['template_id'];
            $next_step = config('template.steps.' . $template_id . '.3');

            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 3) {
                    $request->merge(['next_step' =>  $next_step]);
                }
            }
            $response = $this->api->with(['auth' => $this->user])->put('api/updatestepthree/' . $asset_id, $request->except(['_token', '_url']));
            return redirect()->route('step' . $next_step, $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function getStep4(Request $request, $asset_id)
    {

        try {
            $step = 4;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=4');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 4) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }

                return view('admin.assets.step4.step4', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function postStep4(Request $request, $asset_id)
    {
        try {
            $step_info = $this->stepInfo($asset_id);
            $template_id = $step_info['template_id'];
            $next_step = config('template.steps.' . $template_id . '.4');

            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 4) {
                    $request->merge(['next_step' => $next_step]);
                }
            }

            $response = $this->api->with(['auth' => $this->user])->put('api/updatestepfour/' . $asset_id, $request->except(['_token', '_url']));
            return redirect()->route('step' . $next_step, $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }


    public function getStep5(Request $request, $asset_id)
    {
        try {
            $step = 5;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=5');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 5) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }

                return view('admin.assets.step5.step5', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function postStep5(Request $request, $asset_id)
    {
        try {
            $step_info = $this->stepInfo($asset_id);
            $template_id = $step_info['template_id'];
            $next_step = config('template.steps.' . $template_id . '.5');

            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 5) {
                    $request->merge(['next_step' => $next_step]);
                }
            }

            $response = $this->api->with(['auth' => $this->user])->put('api/updatestepfive/' . $asset_id, $request->except(['_token', '_url']));
            return redirect()->route('step' . $next_step, $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }


    public function getStep6(Request $request, $asset_id = null)
    {
        try {
            $step = 6;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=6');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 6) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }
                return view('admin.assets.step6.step6', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function postStep6(Request $request, $asset_id = null)
    {
        // return redirect()->route('step7', $asset_id);
        try {
            $step_info = $this->stepInfo($asset_id);
            if (isset($step_info)) {

                $template_id = $step_info['template_id'];
                $next_step = config('template.steps.' . $template_id . '.6');

                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 6) {
                    $request->merge(['next_step' => $next_step]);
                }
            }
            $response = $this->api->with(['auth' => $this->user])->put('api/updatestepsix/' . $asset_id, $request->except(['_token', '_url']));

            return redirect()->route('step' . $next_step, $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }


    public function getCategoryOptions(Request $request)
    {
        $options  = config("assets." . $request->val . "");
        if (isset($options)) {
            return json_encode($options);
        }
        return null;
    }

    public function getCity($id)
    {
        $response = $this->api->with(['auth' => $this->user])->get('api/city/' . $id);
        return $response;
    }
    /**
     * [getStep7 description]
     * @param  Request $request  [description]
     * @param  [type]  $asset_id [description]
     * @return [type]            [description]
     */
    public function getStep7(Request $request, $asset_id)
    {
        try {
            $step = 7;
            $assets = $this->api->with(['auth' => $this->user])->get('api/asset/' . $asset_id . '?step=7');
            $completed_before = $assets['next_step'];
            if ($assets['status'] == "completed" || $assets['next_step'] >= 7) {
                $template_id = $assets['template_id'];
                $next_step = config('template.steps.' . $template_id . '.' . $step);
                $property_id = $assets['property_id'];

                if ($next_step === null) {
                    abort(404);
                }

                return view('admin.assets.step7.step7', compact('asset_id', 'assets', 'template_id', 'step', 'completed_before', 'property_id'));
            }
            return redirect('assets/step' . $assets['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            $ex->getStatusCode() == "404" ? abort(404) : "";
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [postStep7 description]
     * @param  Request $request  [description]
     * @param  [type]  $asset_id [description]
     * @return [type]            [description]
     */
    public function postStep7(Request $request, $asset_id)
    {
        try {
            $step_info = $this->stepInfo($asset_id);
            $template_id = $step_info['template_id'];
            $next_step = config('template.steps.' . $template_id . '.7');

            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] <= 7) {

                    $request->merge(['next_step' => $next_step]);
                }
            }
            $response = $this->api->with(['auth' => $this->user])->put('api/updatestepseven/' . $asset_id, $request->except(['_token', '_url']));
            return redirect()->route('step8', $response['message']);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [getStep8 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getStep8(Request $request)
    {
        try {
            $step = 8;
            $asset_id = $request->asset_id;

            $step_info = $this->stepInfo($asset_id);
            $property_id = isset($step_info['property_id']) ? $step_info['property_id'] : "";
            $template_id = $step_info['template_id'];
            $completed_before = $step_info['next_step'];
            if (isset($step_info)) {
                if ($step_info['status'] == "pending" && $step_info['next_step'] != 8) {
                    return redirect('assets/step' . $step_info['next_step'] . '/' . $asset_id)->withError(['message' => 'Please complete this step before proceeding further.']);
                }
            }

            $documents = $this->api->with(['auth' => $this->user])->get('api/getdocument/' . $asset_id);
            $finalDocuments = [];
            if (!empty($documents)) {
                foreach ($documents as $key => $value) {
                    # code...

                    if ($value['type'] == 'property_photos') {
                        $finalDocuments[$value['type']][] = [
                            '_id' => $value['_id'],
                            'document' => $value['document'],
                            'url' => $value['url'],
                            'filetype' => $value['filetype']
                        ];
                    } else {
                        $finalDocuments[$value['type']] = [
                            '_id' => $value['_id'],
                            'document' => $value['document'],
                            'url' => $value['url'],
                            'filetype' => $value['filetype']
                        ];
                    }
                }
            }
             
            /*array_walk($finalDocuments, function(&$v){
            $v = (count($v) == 1) ? array_pop($v): $v;
         });*/
            return view('admin.assets.step8.step8', compact('asset_id', 'finalDocuments', 'template_id', 'step', 'completed_before', 'property_id'));
        } catch (\Exception $ex) {

            return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [uploadDocumentStep8 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function uploadDocumentStep8(Request $request)
    {

        try {

            $response = $this->api->with(['auth' => $this->user])->post('api/uploaddocument', $request->except(['_token', '_url']));
            return json_encode(array('response' => 'success', 'data' => $response));
            //return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            \Log::error('Upload Document Error :' . $ex);
            return json_encode(array('response' => 'error', 'message' => 'Invalid Data'));
            //return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [deleteDocumentStep8 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function deleteDocumentStep8(Request $request)
    {
        try {

            $response = $this->api->with(['auth' => $this->user])->post('api/deletedocument', $request->except(['_token', '_url']));

            return json_encode(array('response' => 'success', 'data' => $response));
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            \Log::error('Upload Document Error :' . $ex);
            return json_encode(array('response' => 'error', 'message' => 'Invalid Data'));
            //return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            \Log::error('Upload Document Error :' . $ex);
            return json_encode(array('response' => 'error', 'message' => 'Invalid Data'));
            //return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [postStep8 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postStep8(Request $request)
    {
        $data = array();
        $document_id = $request->asset_id;

        $request->validate([
            'valuation_report_1' => 'required|file',
            'valuation_report_2' => 'required|file',
            'property_photos' => 'required|file',
            'index_2' => 'required|file',
            'floor_plan' => 'required|file',
            'insurance_policy' => 'required|file',
            'inspection_report' => 'required|file',
            'form_13_2' => 'required|file',
            'form_13_4' => 'required|file',
            'dm_application' => 'required|file',
            'dm_order' => 'required|file',
            'possession_order' => 'required|file',
            'possession_receipt' => 'required|file',
            'panchanama' => 'required|file',
            'feature_image' => 'required|file',
            'property.*' => 'required',

        ]);

        try {
            $asset_id = $request->get('asset_id');
            $property = $request->get('property');

            // passed property hidden field array
            $data = $this->createDocumentMasterArray($property, $asset_id);
            //$data = json_encode($data);
            if (!is_null($data) && !is_null($document_id)) {

                $response = $this->api->with(['auth' => $this->user])->post('api/updatestepeight/' . $document_id, $data);
                return redirect()->route('step9');
            } else {
                return redirect()->route('step8', ['id' => $document_id])->with('error', 'Unable to saved document');
            }
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return redirect()->route('step8', ['id' => $document_id])->with('error', $ex->getMessage());
        }
    }
    /**
     * [updateStep8 description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateStep8(Request $request)
    {
        $data = array();
        $asset_id = $request->asset_id;
        $request->validate([
            'property.*' => 'required',
        ]);

        try {
            $asset_id = $request->get('asset_id');
            $property = $request->get('property');

            $data = $this->createDocumentMasterArray($property, $asset_id);

            $status = [
                'status' => 'completed'
            ];

            if (!is_null($data) && !is_null($asset_id)) {
                $response = $this->api->with(['auth' => $this->user])->post('api/updatestepeightdocument/' . $asset_id, $data);

                $this->api->with(['auth' => $this->user])->put('api/updatefinalstep/' . $asset_id, $status);

                return redirect('assets/')->withSuccess(['message' => 'Asset Added Successfully!']);
            } else {
                return redirect()->route('step8', ['id' => $asset_id])->with('error', 'Unable to saved document');
            }
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return redirect()->route('step8', ['id' => $asset_id])->with('error', $ex->getMessage());
        }
    }
    /**
     * [createDocumentMasterArray description]
     * @param  [type] $property [description]
     * @return [type]           [description]
     */
    public function createDocumentMasterArray($property = null, $asset_id)
    {
        $data = array();
        foreach ($property as $key => $value) {

            if (!empty($value)) {
                if (is_array($value['document'])) {
                    $doc_arr = isset($value['document'][0]) ? json_decode($value['document'][0]) : null;
                    if (!empty($doc_arr)) {
                        foreach ($doc_arr as $arr) {
                            array_push($data, array('_id' => $value['_id'], 'document' => $arr, 'asset_id' => $asset_id, 'type' => $key));
                        }
                    }
                } else {
                    array_push($data, array('_id' => $value['_id'], 'document' => $value['document'], 'asset_id' => $asset_id, 'type' => $key));
                }
            }
        }
        return $data;
    }


    /**
     * [get_template description]
     * @param  [type] $asset_id [description]
     * @return [type]           [description]
     */
    public function stepInfo($asset_id = null)
    {
        $assets = $this->api->with(['auth' => $this->user])->get('api/gettemplate/' . $asset_id);
        return $assets ?? null;
    }

    public function getMigratingBranch()
    {
        $migrating_branchs = $this->api->with(['auth' => $this->user])->get('api/migrating_branch');
        return $migrating_branchs;
    }
    public function getMicromarket()
    {
        $micromarkets = $this->api->with(['auth' => $this->user])->get('api/micromarket');
        return $micromarkets;
    }
}
