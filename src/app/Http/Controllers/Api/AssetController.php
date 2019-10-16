<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AssetService;
use App\Http\Resources\AssetResource;
use App\Http\Resources\AssetListResource;
use App\Http\Resources\AssetDetailResource;
use App\Http\Requests\AssetRequest;
use App\Http\Requests\AssetStepTwoRequest;
use App\Http\Requests\AssetStepThreeRequest;
use App\Http\Requests\AssetStepFourRequest;
use App\Http\Requests\AssetStepFiveRequest;
use App\Http\Requests\AssetStepSixRequest;
use App\Http\Requests\AssetStepSevenRequest;
use App\Http\Requests\AssetStepEightRequest;
use App\Http\Requests\UploadDocumentRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\IncrementalId;

class AssetController extends Controller
{
    protected $AssetService;

    public function __construct(AssetService $AssetService)
    {
        $this->AssetService = $AssetService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $assets = $this->AssetService->index($request);
        return AssetResource::collection($assets);
        //return new AssetResource($assets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AssetRequest $request)
    {
        try {
            $request->merge(['loan' => $request->account_no]);
            $property = $this->generatePropertyId($request->customer['property_category'], $request->customer['property_type'], ($request->customer['property_sub_type'] ?? null));
            $property_id = $property->type . $property->seq;
            $request->merge(['property_id' => $property_id]);

            $assets = $this->AssetService->store($request->except(['_token', '_url', 'clo_text', 'co_text', 'auth', 'account_no', 'customer.clo_email', 'customer.clo_number', 'customer.co_number', 'customer.co_email']));

            return response()->json(['message' => $assets], 201);
        } catch (\Exception $ex) {
            return response()->json(['message'
            => $ex->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        try {
            $assets = $this->AssetService->show($id, $request->step);
            return response()->json(new AssetResource($assets), 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 404);
        }
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
    public function update(AssetRequest $request, $id)
    {
        try {
            $request->merge(['loan' => $request->account_no]);
            $assets = $this->AssetService->update($request->except('account_no', 'auth', 'customer.clo_email', 'customer.clo_number', 'customer.co_number', 'customer.co_email'), $id);
            return response()->json(['message' => $assets], 200);
            // return response()->json(new CaseleadofficerResource($assets), 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // try {
        //     $deleteUser = $this->AssetService->destroy($id);

        //     return response()->json(['message' => 'Borrower has been deleted successfully!'], 200);
        // } catch(ModelNotFoundException $ex) {
        //     return response()->json(['message' => 'Unable to find requested Borrower!'], 404);
        // } catch (\Exception $ex) {
        //     return response()->json(['message' => $ex->getMessage()], 500);
        // }
    }

    public function updateStepTwo(AssetStepTwoRequest $request, $id)
    {

        try {
            $plot = $request->plot;
            if (isset($request->size)) {
                $size = $request->size;
                $avgarea = null;

                if (isset($size['unit']) && $size['unit'] != 'unknown') {
                    $avgarea = ($size['area']) ?? null;

                    if ($size['unit'] == 'sq_mt') {
                        $avgarea = isset($size['area']) ? floatval($size['area']) * 10.7639 : null;
                    }
                }
                $size['avgarea'] = $avgarea;
                $request->merge(['size' => $size]);
            }

            if (isset($request->plot['plot_composition'])) {
                //$encumbrances = array_values($request->encumbrances);
                $map_plot_composition = array_map('array_filter', array_values($plot['plot_composition']));
                $filter_plot_composition = array_filter($map_plot_composition);
                $plot['plot_composition'] = $filter_plot_composition;
                $request->merge(['plot' => $plot]);
            }

            $assets = $this->AssetService->updateStepTwo($request->except(['_token', '_url', 'auth', 'template_id']), $id);

            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepThree(AssetStepThreeRequest $request, $id)
    {

        try {

            $valuation = ($request->valuation) ?? null;
            if (!empty($valuation)) {
                $avgfairmarketvalue = $valuation['fair_market_value_1'];
                if (isset($valuation['fair_market_value_2']) && $valuation['fair_market_value_2'] > 0) {
                    $avgfairmarketvalue = round(($valuation['fair_market_value_1'] + (isset($valuation['fair_market_value_2']) ? $valuation['fair_market_value_2'] : 0)) / 2);
                }

                $valuation['avgfairmarketvalue'] = $avgfairmarketvalue;
                $request->merge(['valuation' => $valuation]);
            }
            $assets = $this->AssetService->updateStepThree($request->except(['_token', '_url', 'auth']), $id);
            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepFour(AssetStepFourRequest $request, $id)
    {

        try {
            $assets = $this->AssetService->updateStepFour($request->except(['_token', '_url', 'advocate_name_text', 'latest_valuer_name_1_text', 'latest_valuer_name_2_text', 'resolution_agent_name_text', 'third_party_info.latest_valuer_email_1', 'third_party_info.valuer_contact_number_1', 'latest_valuer_email_2', 'third_party_info.valuer_contact_number_2', 'third_party_info.resolution_agent_email', 'third_party_info.resolution_agent_contact_number', 'third_party_info.advocate_email', 'third_party_info.advocate_contact_number', 'advocate_name_text', 'auth']), $id);

            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepFive(AssetStepFiveRequest $request, $id)
    {

        try {
            $past_auction = $request->past_auction;
            if (isset($request->past_auction['last_auction_successfull']) && ($request->past_auction['last_auction_successfull'] != 'yes')) {
                $past_auction['no_of_bidders_in_last_auction'] = null;
                $past_auction['successful_bid_amount'] = null;
                $past_auction['final_recovery_amount'] = null;
                $past_auction['auction_gst'] = null;
                $past_auction['auction_tds'] = null;
            }
            //$past_auction['auction'] = array_values($past_auction['auction']);
            $map_past_auction = array_map('array_filter', array_values($past_auction['auction']));
            $filter_past_auction = array_filter($map_past_auction);
            $past_auction['auction'] = $filter_past_auction;
            $request->merge(['past_auction' => $past_auction]);
            $assets = $this->AssetService->updateStepFive($request->except(['_token', '_url', 'auth']), $id);

            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepSix(AssetStepSixRequest $request, $id)
    {

        try {
            if (isset($request->encumbrances)) {
                //$encumbrances = array_values($request->encumbrances);
                $map_encumbrances = array_map('array_filter', array_values($request->encumbrances));
                $filter_encumbrances = array_filter($map_encumbrances);
                $request->merge(['encumbrances' => $filter_encumbrances]);
            }
            if (isset($request->legal_issue_by_borrower)) {
                //$legal_issue_by_borrower = array_values($request->legal_issue_by_borrower);
                $map_legal_issue = array_map('array_filter', array_values($request->legal_issue_by_borrower));
                $filter_legal_issue = array_filter($map_legal_issue);
                $request->merge(['legal_issue_by_borrower' => $filter_legal_issue]);
            }
            $assets = $this->AssetService->updateStepSix($request->except('user_text', 'auth'), $id);

            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepSeven(AssetStepSevenRequest $request, $id)
    {

        try {

            $kapdata = ($request->kapdata) ?? 0;
            if (!empty($kapdata)) {
                $avgkapprice = 0;
                if (!empty($kapdata['kap_price'])) {
                    $avgkapprice = $kapdata['kap_price'];
                }
                if (!empty($kapdata['kap_price_upper'])) {
                    $avgkapprice += $kapdata['kap_price_upper'];
                    $avgkapprice = round($avgkapprice / 2);
                }
                $kapdata['avgkapprice'] = $avgkapprice;
                $request->merge(['kapdata' => $kapdata]);
            }
            $assets = $this->AssetService->updateStepSeven($request->except(['_token', '_url', 'auth']), $id);

            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function updateStepEight(AssetStepEightRequest $request)
    {

        try {

            $assets = $this->AssetService->updateStepEight($request->except('auth'));

            return response()->json(['message' => 'Assets added Successfully'], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function uploadDocument(UploadDocumentRequest $request)
    {
        $validatedData = $request->validated();

        try {
            $assets = $this->AssetService->uploadDocument($validatedData);

            return response()->json($assets, 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
    public function updateStepEightDocument(AssetStepEightRequest $request)
    {
        try {
            // dd($request->all());
            $document = array_filter($request->except('auth'), function ($value) {
                return !is_null($value['document']) && $value['document'] !== '';
            });
            $assets = $this->AssetService->updateStepEightDocuments($document);
            return response()->json($assets, 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
    /**
     * [documentList description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function documentList($id = null)
    {
        try {
            $documents = $this->AssetService->showDocument($id);
            return response()->json(new AssetResource($documents), 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 404);
        }
    }
    /**
     * [deleteDocument description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteDocument(Request $request)
    {
        try {

            $deleteDocument = $this->AssetService->deleteDocument($request->id);
            return response()->json(['message' => 'Document has been deleted successfully!'], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Document!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
    /**
     * [getTemplate description]
     * @param  Request $request [description]
     * @param  [type]  $id      [description]
     * @return [type]           [description]
     */
    public function getTemplate(Request $request, $id)
    {

        try {
            $assets = $this->AssetService->getTemplate($id);
            return response()->json(new AssetResource($assets), 200);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 404);
        }
    }

    public function updateFinalStep(Request $request, $id)
    {
        try {
            $assets = $this->AssetService->updateFinalStep($request->except(['_token', '_url', 'advocate_name_text', 'latest_valuer_name_1_text', 'latest_valuer_name_2_text', 'resolution_agent_name_text', 'latest_valuer_email_1', 'valuer_contact_number_1', 'latest_valuer_email_2', 'valuer_contact_number_2', 'resolution_agent_email', 'resolution_agent_contact_number', 'advocate_email', 'advocate_contact_number', 'auth']), $id);
            return response()->json(['message' => $assets], 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function getDetailView($id)
    {
        try {
            $assets = $this->AssetService->getDetailView($id);

            return response()->json(new AssetDetailResource($assets), 200);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function getFilterData(Request $request)
    {
        try {
            $template_id = $request->template_id;
            $assets = $this->AssetService->getFilterData($request, $template_id);
            return AssetListResource::collection($assets);
        } catch (ModelNotFoundException $ex) {
            return response()->json(['message' => 'Unable to find requested Assets!'], 404);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    /**
     * [getPropertyId description]
     * @param  [type] $categories        [description]
     * @param  [type] $property_type     [description]
     * @param  [type] $property_sub_type [description]
     * @return [type]                    [description]
     */
    public function generatePropertyId($categories = null, $property_type = null, $property_sub_type = null)
    {
        if (isset($categories) && isset($property_type)) {
            $cat = ucfirst($categories[0]);
            $pro_type = ucfirst($property_type[0]);
            if (in_array($property_type, ['stock', 'others', 'vehicles']))
                $pro_sub_type = \Config::get('property_prefix.' . $property_type);
            else
                $pro_sub_type = \Config::get('property_prefix.' . $property_sub_type);

            $prefix = "SBIN";
            $type = $prefix . $cat . $pro_type . $pro_sub_type;

            $property = IncrementalId::where('type', $type)->latest()->first();
            if (is_null($property)) {
                $seq = str_pad(1, 5, "0", STR_PAD_LEFT);
                $property = IncrementalId::create(['type' => $type, 'seq' => $seq]);
            } else {
                $seq = str_pad($property->seq + 1, 5, "0", STR_PAD_LEFT);
                $property->update(['seq' => $seq]);
            }

            return $property;
        }
    }
}
