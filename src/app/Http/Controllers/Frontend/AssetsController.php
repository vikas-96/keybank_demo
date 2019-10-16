<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminBaseController;
use App\Models\Asset;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Session;

class AssetsController extends AdminBaseController
{

    protected $per_page = 10;

    function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * [index description]
     * @return [type] [description]
     */
    public function index()
    {
        $migrating_branchs = $this->api->with(['auth' => $this->user])->get('api/migrating_branch');
        return view('frontend.assets.listing.listing-assets', compact('migrating_branchs'));
    }
    public function searchAssetList(Request $request)
    {
        $categories_data = $this->getCategoriesData($request);
        return view('frontend.listing-search', $categories_data);
    }
    /**
     * [table_list description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getAssetList(Request $request)
    {
        try {
            $view = isset($request->view) ? $request->view : "";

            $categories_data = $this->getCategoriesData($request);

            if (!Session::has('property_category') || !Session::has('property_type') || !Session::has('template_id')) {
                return redirect()->route('asset.search');
            }

            $template_id = $categories_data['template_id'];

            $request->merge(['template_id' => $template_id]);
            $request->merge(['property_category' => $categories_data['property_category']]);
            $request->merge(['property_type' => $categories_data['property_type']]);
            $request->merge(['property_sub_type' => $categories_data['property_sub_type']]);

            $req_data = http_build_query($request->all());

            // if property sub type is not selected
            if (in_array($request->property_type, ['stock', 'others', 'vehicles']) == false) {
                if (!Session::has('property_sub_type') && empty($req_data->property_sub_type)) {
                    return redirect()->route('asset.search')->with('error', ['message' => 'Please Select Property Sub Type']);
                }
            }

            $assets = $this->api->with(['auth' => $this->user])->get('api/getfilterdata/?' . $req_data);
            $migrating_branchs = $this->api->with(['auth' => $this->user])->get('api/migrating_branch');
            
            
            //$data = Asset::paginate(1);

            $banklist_and_state = $this->api->with(['auth' => $this->user])->get('api/commondata');
            $banklist_and_state['banklist_and_state'] = $banklist_and_state;

            $data = $this->generatorPaginator($assets, $request);

            if ($view == 'table') {
                return view('frontend.table-listing-assets', $categories_data, compact('template_id', 'banklist_and_state', 'view', 'migrating_branchs'))->with(['data' => $data]);
            }
            return view('frontend.assets.listing.listing-assets', $categories_data, compact('template_id', 'banklist_and_state', 'view', 'migrating_branchs'))->with(['data' => $data]);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [getCategoriesData description]
     * @param  [type] $request [description]
     * @return [type]          [description]
     */
    public function getCategoriesData($request)
    {
        if (isset($request->property_category))
            Session::put('property_category', $request->property_category);
        if (isset($request->property_type))
            Session::put('property_type', $request->property_type);

        $property_type = Session::get('property_type');
        if (isset($request->property_type)) {
            Session::put('property_sub_type', $request->property_sub_type);
        } elseif (Session::has('property_type') && ($property_type == 'others' || $property_type == 'vehicles' || $property_type == 'stock')) {
            Session::forget('property_sub_type');
        }
        $template_id = \Config::get('assets.templates.' . Session::get('property_type'));
        if (isset($request->property_sub_type) || Session::has('property_sub_type')) {
            $template_id = \Config::get('assets.templates.' . Session::get('property_sub_type'));
        }
        $categories_data = [
            'property_category' => Session::get('property_category') ?? $request->old('property_category'),
            'property_type' => Session::get('property_type') ?? $request->old('property_type'),
            'property_sub_type' => Session::get('property_sub_type') ?? $request->old('property_sub_type'),
            'template_id' => $template_id ?? $request->old('template_id')
        ];
        if (!is_null($template_id))
            Session::put('template_id', $template_id);
        return $categories_data;
    }
    /**
     * [detail description]
     * @param  [type] $template_id [description]
     * @return [type]              [description]
     */
    public function detail($id)
    {
        try {
            $categories_data = [
                'property_category' => Session::get('property_category'),
                'property_type' => Session::get('property_type'),
                'property_sub_type' => Session::get('property_sub_type') ?? null,
                'template_id' => Session::get('template_id')
            ];
            $template_id = \Config::get('assets.templates.' . Session::get('property_type'));
            if (Session::has('property_sub_type')) {
                $template_id = \Config::get('assets.templates.' . Session::get('property_sub_type'));
            }
            if (is_null($template_id))
                return abort(404);

            $assets = $this->api->with(['auth' => $this->user])->get('api/getdetailview/' . $id);
            $migrating_branchs = $this->api->with(['auth' => $this->user])->get('api/migrating_branch');

            $banklist_and_state = $this->api->with(['auth' => $this->user])->get('api/commondata');
            $banklist_and_state['banklist_and_state'] = $banklist_and_state;

            return view('frontend.detail', $categories_data, compact('assets', 'template_id', 'banklist_and_state', 'migrating_branchs'));
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function assetDetail($id)
    {
        $assets = $this->api->with(['auth' => $this->user])->get('api/getdetailview/' . $id);
        return $assets;
    }

    /**
     * [postAssetList description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function postAssetList(Request $request)
    {
        $template_id = \Config::get('assets.templates.' . $request->property_type);
        if (isset($request->property_sub_type)) {
            $template_id = \Config::get('assets.templates.' . $request->property_sub_type);
        }
        try {
            $list = $this->api->with(['auth' => $this->user])->get('api/getfilterdata/?template_id=' . $template_id);
            $data = $list['data'];
            $meta = $list['meta'];

            return view('frontend.assets.listing.listing-assets', compact('data', 'meta'));
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }
    /**
     * [getCategoryOptions description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCategoryOptions(Request $request)
    {
        $options  = config("assets." . $request->val . "");
        if (isset($options)) {
            return json_encode($options);
        }
        return null;
    }
    public function test()
    {
        \DB::connection()->enableQueryLog();
        $id = ['5d725376d13ca50386483012', '5d762123d13ca5039474b792'];
        $asset = Asset::first();

        $id = new \MongoDB\BSON\ObjectId('5d725376d13ca50386483012');
        $models = Asset::raw(function ($collection) use ($asset, $id) {

            //return $collection->find();
            return $collection->aggregate([
                [
                    //'$unwind' =>[$asset],
                    '$match' => [
                        'address.city' => [
                            '$in' => ['5d4d3da249caf75293739c7d', '5d4d3da249caf75293739c95']
                        ]
                    ],
                ],
                [
                    '$group' => [
                        '_id' => array(
                            '_id' => '$_id',
                            'property_type' => '$customer.property_type',
                        ),
                        //'_id'=>'$_id',
                        'property_category' => ['$first' => '$customer.property_category'],
                        //'_id' => '$customer.property_type',
                        'count' => ['$sum' => 1],
                    ],
                ],
                [
                    '$project' => [
                        "property_type" => '$_id.property_type',
                        "property_category" => 1,
                        '_id' => 0,
                        'count' => 1
                    ],
                ],
            ]);
        });
        $queries = \DB::getQueryLog();
        dd($models);
        $sec = "vehicle";
        $arr = config("list." . $sec);
        $str = "";

        $str .= '{{-- ' . ucwords(str_replace("_", " ", $sec)) . ' Blog Start --}}';
        foreach ($arr as $key => $value) {
            $str .= "\r\n";

            //$str.='@if(in_array($template_id,config("list.'.$sec.'.'.$key.'")))';
            $arr_key = $key;

            $str .= '@if(isset($value["' . $sec . '"]["' . $arr_key . '"]))';
            $str .= '<td>$value["' . $key . '"]</td>';

            $str .= '@endif';
        }
        $str .= "\r\n";
        $str .= '{{-- ' . ucwords(str_replace("_", " ", $sec)) . ' Blog End --}}';
        dd($str);
    }

    public function generatorPaginator($assets, $request)
    {
        $data = array();
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        //Create a new Laravel collection from the array data
        $collection = new Collection($assets['data']);
        //Define how many items we want to be visible in each page
        $per_page = $this->per_page;

        //Slice the collection to get the items to display in current page
        //$currentPageResults = $collection->slice(($currentPage - 1) * $per_page, $per_page)->all();

        //Create our paginator and add it to the data array
        $data = new LengthAwarePaginator($collection, $assets['meta']['total'], $per_page);

        //Set base url for pagination links to follow e.g custom/url?page=6
        //$data->setPath($request->url());
        $data->setPath(\Request::fullUrl());

        return $data;
    }

    public function filterAsset(Request $request)
    {
        $data = http_build_query($request->all());
        try {
            $asset = $this->api->with(['auth' => $this->user])->get('api/getfilterdata?' . $data);
            return view('frontend.table-listing-assets', compact('asset'));
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function assetCompare(Request $request)
    {
        try {
            $categories_data = [
                'property_category' => Session::get('property_category'),
                'property_type' => Session::get('property_type'),
                'property_sub_type' => Session::get('property_sub_type') ?? null,
                'template_id' => Session::get('template_id')
            ];
            return view('frontend.assets.compare.compare', $categories_data);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return $this->internalExceptionRedirect($ex);
        } catch (\Exception $ex) {
            return $this->exceptionRedirect($ex);
        }
    }

    public function assetComparePartial(Request $request)
    {
        try {
            $template_id = \Config::get('assets.templates.' . Session::get('property_type'));
            if (isset($request->property_sub_type) || Session::has('property_sub_type')) {
                $template_id = \Config::get('assets.templates.' . Session::get('property_sub_type'));
            }
            $request->merge(['template_id' => $template_id]);
            $req_data = http_build_query($request->all());
            $list = $this->api->with(['auth' => $this->user])->get('api/getfilterdata/?' . $req_data);
            $assetLists = $list['data'];
            $categories_data = [
                'property_category' => Session::get('property_category'),
                'property_type' => Session::get('property_type'),
                'property_sub_type' => Session::get('property_sub_type') ?? null,
                'template_id' => Session::get('template_id')
            ];
            
            $view = view('frontend.assets.compare.compare_partial', compact('assetLists', 'template_id'))->render();
            return response()->json(['html' => $view], 200);
        } catch (\Dingo\Api\Exception\InternalHttpException $ex) {
            return response()->json(['html' => ''], 500);
        } catch (\Exception $ex) {
            return response()->json(['html' => ''], 500);
        }
    }
    /**
     * [getCaseLeadOfficer description]
     * @return [type] [description]
     */
    public function getCaseLeadOfficer(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $response = $this->api->with(['auth' => $this->user])->post('api/getcaseleadofficer/', $request->all());
            return json_encode($response);
        }
        return null;
    }
    /**
     * [getCaseOfficer description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getCaseOfficer(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $response = $this->api->with(['auth' => $this->user])->post('api/getcaseofficer/', $request->all());
            return json_encode($response);
        }
        return null;
    }
    /**
     * [getResolutionAgent description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function getResolutionAgent(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $response = $this->api->with(['auth' => $this->user])->post('api/getresolutionagent/', $request->all());
            return json_encode($response);
        }
        return null;
    }
}
