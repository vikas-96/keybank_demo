<?php

namespace App\Services;

use App\Models\Asset;
use App\Models\DocumentMaster;
use Carbon\Carbon;

class AssetService
{
    public function __construct(Asset $asset)
    {

        $this->asset = $asset;
    }

    public function index($request)
    {


        $data = $this->asset->with(['banklist', 'feature_image', 'migratingbranch']);
        $data = $data->select('property_id', 'customer.property_category', 'customer.property_type', 'banklist.bank_name AS bank_name', 'customer.owner_name', 'customer.migrating_branch', 'feature_image.url', 'status', 'customer.lender_name', 'migratingbranch');
        $searchFilters = $request->only(['property_category', 'property_type', 'lender_name', 'owner_name', 'migrating_branch', 'status']);

        if ($request->has('q')) {
            $name = $request->q;
            $data = $data->where(function ($query) use ($name) {
                return $query->where('property_category', 'like', '%' . $name . '%')
                    ->orWhere('property_type', 'like', '%' . $name . '%');
                //->orWhere('owner_name', 'like', '%' . $name . '%');
            }); //->whereIn('is_active',[true,'1']);
            return $data->get();
        }

        if ($request->has('search') && !empty($request->search)) {
            $name = $request->search;
            $data = $data->where('customer.property_category', 'like', '%' . $name . '%')
                ->orWhere('customer.property_type', 'like', '%' . $name . '%')
                ->orWhere('property_id', 'like', '%' . $name . '%')
                ->orWhere('customer.owner_name', 'like', '%' . $name . '%');
        }

        if (!empty($searchFilters)) {
            $data =  $data->where(function ($query) use ($request, $searchFilters) {
                foreach ($searchFilters as $key => $value) {
                    if ($request->has($key)) {
                        if ($request->has('is_active') && $key == 'is_active') {
                            $query->Where($key, filter_var($value, FILTER_VALIDATE_BOOLEAN));
                        } else {
                            $query->Where($key, 'LIKE', "%" . $value . "%");
                        }
                    }
                }
            });
        }

        $per_page = (int) $request->input('per_page', 10);
        $sort = $request->input('sort', 'created_at');
        $order = $request->input('order', 'desc');
        $data = $data->orderBy($sort, $order)->paginate($per_page);

        return $data;
    }

    public function store($assetData)
    {
        try {
            /*Create a record in the users table*/
            $asset = Asset::create($assetData);

            return $asset->id;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function show($id, $step = null)
    {
        $AssetData = Asset::where('_id', $id);
        if (!is_null($step) && $step == '4') {
            $AssetData = $AssetData->with('valuer1', 'valuer2', 'resolution_agent', 'advocate');
        } else if (!is_null($step) && $step == '1') {
            $AssetData = $AssetData->with('caseleadofficer', 'caseofficer', 'banklist', 'recoverybranch', 'state', 'city', 'migratingbranch','micromarket');
        }
        $AssetData = $AssetData->latest()->first();
        if (!is_null($step) && $step == '1') {

            $loans = \App\Models\Loan::with('borrowerDetail', 'bankDetail')->select('borrower_id', 'account_no', 'first_sanction_date', 'banking_arrangement', 'lead_bank', 'sbi_share', 'npa_date')->whereIn('_id', $AssetData->loan)->where('is_active', true)->get()->toArray();
            foreach ($loans as $key => &$value) {
                # code...
                $value['first_sanction_date'] = $value['first_sanction_date']->toDateTime()->format('d/m/Y');
                $value['npa_date'] = $value['npa_date']->toDateTime()->format('d/m/Y');
                $value['borrower_id'] = $value['borrower_detail'];
                $value['lead_bank'] = $value['bank_detail'];

                unset($value['borrower_detail'], $value['bank_detail']);
            }
            $AssetData->loan = $loans;
        }
        if (!empty($AssetData)) {
            return $AssetData;
        }

        throw new \Exception("Record not found");
    }

    public function update($assetData, $assetId)
    {

        $currentassets = Asset::findOrFail($assetId);
        $currentassets->update($assetData);
        return $currentassets->id;
    }

    public function destroy($id)
    {
        // $borrower = Asset::findOrFail($id);

        // if ($borrower->delete()) {
        //     return $borrower;
        // }
    }

    public function updateStepTwo($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepThree($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepFour($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepFive($requestData, $id)
    {

        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepSix($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepSeven($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function updateStepEight($requestData)
    {
        $currentassets = DocumentMaster::insert($requestData);

        return $currentassets;
    }
    /**
     * Update or create document master
     * [updateStepEightDocuments description]
     * @param  [type] $requestData [description]
     * @return [type]              [description]
     */
    public function updateStepEightDocuments($requestData)
    {
        if (!empty($requestData)) {

            foreach ($requestData as $key => $value) {
                # code...
                $currentdocument = DocumentMaster::updateOrCreate(['_id' => $value['_id']], ['document' => $value['document'], 'asset_id' => $value['asset_id'], 'type' => $value['type']]);
            }
            return true;
        }
        return false;
    }

    public function uploadDocument($requestData)
    {
        try {
            /* Getting the file stored into the 'storage/app/public' folder */

            $assets = Asset::findOrFail($requestData['id']);
            $property_type = $assets->customer['property_type'];
            $property_id = $assets->property_id;
            $path = 'documents/' . $property_type . '/' . $property_id . '/' . $requestData['type'];
            $storage_path = upload_document($requestData['file'], $path);

            // $storage_url = storage_url($storage_path);
            $data = [
                'path' => $storage_path,
                'id' => $requestData['id'],
                'type' => $requestData['type'],
            ];
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
    /**
     * [showDocument description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function showDocument($id = null)
    {

        $documentData = DocumentMaster::select('type', 'document', 'url', 'asset_id', 'filetype')->where('asset_id', $id)->get();
        if (!empty($documentData)) {
            return $documentData;
        }
        throw new \Exception("Record not found");
    }
    /**
     * [deleteDocument description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function deleteDocument($id)
    {
        $documentMaster = DocumentMaster::findOrFail($id);
        if ($documentMaster->delete()) {
            delete_document($documentMaster->document);
            return $documentMaster;
        }
    }
    public function getTemplate($id)
    {
        $assetData = Asset::select('template_id', 'status', 'next_step', 'property_id')->find($id);
        if (!empty($assetData)) {
            return $assetData;
        }
        throw new \Exception("Record not found");
    }

    public function updateFinalStep($requestData, $id)
    {
        $currentassets = Asset::findOrFail($id);
        $currentassets->update($requestData);

        return $currentassets->id;
    }

    public function getDetailView($id)
    {
        $AssetData = Asset::with('caseleadofficer', 'caseofficer', 'advocate', 'resolution_agent', 'valuer1', 'valuer2', 'recoverybranch', 'banklist', 'state', 'city', 'user', 'feature_image', 'migratingbranch','micromarket')->where('_id', $id)->first();

        //loan section
        $loans = \App\Models\Loan::with('borrowerDetail', 'bankDetail')->select('borrower_id', 'account_no', 'first_sanction_date', 'banking_arrangement', 'lead_bank', 'sbi_share', 'npa_date')->whereIn('_id', $AssetData->loan)->where('is_active', true)->get()->toArray();
        $borrower_name = null;
        $npa_date = null;
        $count = count($loans);
        $borrower_details = array();
        foreach ($loans as $key => &$value) {
            # code...
            $value['first_sanction_date'] = $value['first_sanction_date']->toDateTime()->format('d/m/Y');
            $value['npa_date'] = $value['npa_date']->toDateTime()->format('d/m/Y');
            $value['borrower_id'] = $value['borrower_detail'];
            $value['lead_bank'] = $value['bank_detail'];

            unset($value['borrower_detail'], $value['bank_detail']);
            if (!isset($borrower_name))
                $borrower_name = $value['borrower_id']['name'];
            if (!isset($npa_date))
                $npa_date = $value['npa_date'];
        }
        if ($count > 1) {
            $borrower_name .= ', ...';
            $npa_date .= ', ...';
        }
        $borrower_details['borrower_name'] = $borrower_name;
        $borrower_details['npa_date'] = $npa_date;
        $AssetData->loan = $loans;
        $AssetData->borrower_details = $borrower_details;

        //Document section
        $document = DocumentMaster::select('url', 'document', 'type')->where('asset_id', $id)->get()->toArray();
        $document_array = array_column($document, 'url', 'type');
        $AssetData->document = $document_array;
        $AssetData->document_master = $document;
        if (!empty($AssetData)) {
            return $AssetData;
        }

        throw new \Exception("Record not found");
    }

    public function getFilterData($request, $template_id)
    {
        if (isset($request['compare'])) {
            $property_id = array_map('trim', explode(',', $request['compare']));
            $AssetData = Asset::with('caseleadofficer', 'caseofficer', 'advocate', 'resolution_agent', 'valuer1', 'valuer2', 'recoverybranch', 'feature_image')->whereIn('_id', $property_id)->take(3)->get();
            foreach ($AssetData as $key => &$val) {

                $loans = \App\Models\Loan::with('borrowerDetail', 'bankDetail')->select('borrower_id', 'account_no', 'first_sanction_date', 'banking_arrangement', 'lead_bank', 'sbi_share', 'npa_date')->whereIn('_id', $val->loan)->where('is_active', true)->get()->toArray();
                $count = count($loans);
                $borrower_name = null;
                $npa_date = null;
                foreach ($loans as $key => &$value) {
                    # code...
                    $value['npa_date'] = $value['npa_date']->toDateTime()->format('d/m/Y');
                    $value['account_no'] = $value['account_no'];
                    if (!isset($npa_date))
                        $npa_date = $value['npa_date'];
                }
                $val->loan = $loans;
            }
        } else {
            $AssetData = Asset::with('caseleadofficer', 'caseofficer', 'recoverybranch', 'feature_image', 'migratingbranch')->where('template_id', $template_id)->where('status', 'completed');

            //property category wise condition
            if (isset($request->property_sub_type) && (in_array($request->property_type, ['stock', 'others', 'vehicles']) == false)) {
                $property_condition = $AssetData->where('customer.property_sub_type', $request->property_sub_type);
                
            } else {
                $property_condition = $AssetData->where('customer.property_type', $request->property_type);
            }

            //Property ID
            if (isset($request['property_id'])) {
                $AssetData = $AssetData->where('property_id', 'like', '%' . $request['property_id'] . '%');
            }
            // customer
            if (isset($request['customer'])) {
                if (isset($request['customer']['recall_date'])) {
                    $date = explode(' - ', $request['customer']['recall_date']);
                    $date1 = \Carbon\Carbon::createFromFormat('d/m/Y', $date[0])->startOfDay();
                    $date2 = \Carbon\Carbon::createFromFormat('d/m/Y', $date[1])->endOfDay();
                }
                if (isset($request['customer']['migrating_branch'])) {
                    $AssetData = $AssetData->whereIn('customer.migrating_branch', $request['customer']['migrating_branch']);
                }
                if (isset($request['customer']['recovery_branch'])) {
                    $AssetData = $AssetData->whereIn('customer.recovery_branch', $request['customer']['recovery_branch']);
                }

                if (isset($request['customer']['clo_name'])) {
                    $AssetData = $AssetData->whereIn('customer.clo_name', $request['customer']['clo_name']);
                }
                if (isset($request['customer']['co_name'])) {
                    $AssetData = $AssetData->whereIn('customer.co_name', $request['customer']['co_name']);

                }

            }

            //loan
            // if(isset($request['loan'])){
            //     if (isset($request['loan']['npa_date'])) {
            //         $date = explode(' - ',$request['loan']['npa_date']);
            //         $AssetData = $AssetData->whereBetween('loan.npa_date', $date);
            //     }
            // }

            // Address

            if (isset($request['address'])) {
                if (isset($request['address']['property_address'])) {
                    $AssetData = $AssetData->where('address.property_address', 'like', '%' . $request['address']['property_address'] . '%');
                }
                if (isset($request['address']['state'])) {
                    $AssetData = $AssetData->whereIn('address.state', $request['address']['state']);
                }
                if (isset($request['address']['city'])) {
                    $AssetData = $AssetData->whereIn('address.city', $request['address']['city']);
                }
            }

            // Configuration
            if (isset($request['configuration'])) {
                if (isset($request['configuration']['configuration'])) {
                    $AssetData = $AssetData->where('configuration.configuration', $request['configuration']['configuration']);
                }
            }


            // Valuation
            if (isset($request['valuation'])) {

                if (isset($request['valuation']['min_fair_market_value'])) {

                    $AssetData = $AssetData->where('valuation.avgfairmarketvalue', '>=', (double) $request['valuation']['min_fair_market_value']);
                }
                if (isset($request['valuation']['max_fair_market_value'])) {

                    $AssetData = $AssetData->where('valuation.avgfairmarketvalue', '<=', (double) $request['valuation']['max_fair_market_value']);
                }
            }

            // Third Party Info
            if (isset($request['third_party_info'])) {
                if (isset($request['third_party_info']['resolution_agent_name'])) {
                    $AssetData = $AssetData->whereIn('third_party_info.resolution_agent_name', $request['third_party_info']['resolution_agent_name']);
                }
            }

            // Upcoming Auction
            if (isset($request['upcoming_auction'])) {
                if (isset($request['upcoming_auction']['auction_start_datetime'])) {
                    $date = explode(' - ', $request['upcoming_auction']['auction_start_datetime']);

                    $date1 = \Carbon\Carbon::createFromFormat('d/m/Y H a', $date[0]);
                    $date2 = \Carbon\Carbon::createFromFormat('d/m/Y H a', $date[1]);
                    $AssetData = $AssetData->whereBetween('upcoming_auction.auction_start_datetime', [$date1, $date2]);
                }
            }

            // Kap Data
            if (isset($request['kapdata'])) {
                if (isset($request['kapdata']['min_kap_price'])) {
                    $AssetData = $AssetData->where('kapdata.avgkapprice', '>=', (double) $request['kapdata']['min_kap_price']);
                }
                if (isset($request['kapdata']['max_kap_price'])) {
                    $AssetData = $AssetData->where('kapdata.avgkapprice', '<=', (double) $request['kapdata']['max_kap_price']);
                }
            }

            // Plot
            if (isset($request['plot'])) {
                if (isset($request['plot']['approved_land_use'])) {
                    $AssetData = $AssetData->where('plot.approved_land_use', $request['plot']['approved_land_use']);
                }
            }

            // Summary  of Offices, Cinemas, Other Entertainment Areas
            if (isset($request['office_summary'])) {
                if (isset($request['office_summary']['unit_total_no'])) {
                    $AssetData = $AssetData->where('office_summary.unit_total_no', 'like', '%' . $request['office_summary']['unit_total_no'] . '%');
                }
                //TODO
                if (isset($request['office_summary']['total_area'])) {
                    $AssetData = $AssetData->whereBetween('office_summary.total_area', [1, 100]);
                }
            }

            // Building Information
            if (isset($request['building'])) {
                if (isset($request['building']['building_completion_year'])) {
                    $AssetData = $AssetData->where('building.building_completion_year', $request['building']['building_completion_year']);
                }
                if (isset($request['building']['lift_in_building'])) {
                    $AssetData = $AssetData->where('building.lift_in_building', $request['building']['lift_in_building']);
                }
                if (isset($request['building']['business_nature'])) {
                    $AssetData = $AssetData->where('building.business_nature', 'like', '%' . $request['building']['business_nature'] . '%');
                }
            }

            // OC
            if (isset($request['oc'])) {
                if (isset($request['oc']['oc_status'])) {
                    $AssetData = $AssetData->where('oc.oc_status', $request['oc']['oc_status']);
                }
            }

            // Unit
            if (isset($request['unit'])) {
                if (isset($request['unit']['business_nature'])) {
                    $AssetData = $AssetData->where('unit.business_nature', 'like', '%' . $request['unit']['business_nature'] . '%');
                }
            }

            //Size
            if (isset($request['size'])) {
                if (isset($request['size']['from_area'])) {
                    $AssetData = $AssetData->where('size.avgarea', '>=', (int) $request['size']['from_area']);
                }
                if (isset($request['size']['to_area'])) {
                    $AssetData = $AssetData->where('size.avgarea', '<=', (int) $request['size']['to_area']);
                }
            }

            // Past Auction
            if (isset($request['past_auction'])) {

                if (isset($request['past_auction']['min_no_of_auction_held'])) {

                    $AssetData = $AssetData->where('past_auction.no_of_auction_held', '>=', (int) $request['past_auction']['min_no_of_auction_held']);
                }
                if (isset($request['past_auction']['max_no_of_auction_held'])) {
                    $AssetData = $AssetData->where('past_auction.no_of_auction_held', '<=', (int) $request['past_auction']['max_no_of_auction_held']);
                }
            }
            // Vehicle
            if (isset($request['vehicle'])) {
                if (isset($request['vehicle']['vehicle_location'])) {
                    $AssetData = $AssetData->where('vehicle.vehicle_location', 'like', '%' . $request['vehicle']['vehicle_location'] . '%');
                }
                if (isset($request['vehicle']['rto_region'])) {
                    $AssetData = $AssetData->where('vehicle.rto_region', 'like', '%' . $request['vehicle']['rto_region'] . '%');
                }
                if (isset($request['vehicle']['vehicle_type'])) {
                    $AssetData = $AssetData->where('vehicle.vehicle_type', $request['vehicle']['vehicle_type']);
                }
                if (isset($request['vehicle']['vehicle_purpose'])) {
                    $AssetData = $AssetData->where('vehicle.vehicle_purpose', $request['vehicle']['vehicle_purpose']);
                }
                if (isset($request['vehicle']['manufacturer'])) {
                    $AssetData = $AssetData->where('vehicle.manufacturer', 'like', '%' . $request['vehicle']['manufacturer'] . '%');
                }
                if (isset($request['vehicle']['model'])) {
                    $AssetData = $AssetData->where('vehicle.model', 'like', '%' . $request['vehicle']['model'] . '%');
                }
                if (isset($request['vehicle']['month_year_mfg'])) {
                    $AssetData = $AssetData->where('vehicle.month_year_mfg', 'like', '%' . $request['vehicle']['month_year_mfg'] . '%');
                }
                if (isset($request['vehicle']['fuel_type'])) {
                    $AssetData = $AssetData->where('vehicle.fuel_type', $request['vehicle']['fuel_type']);
                }
                if (isset($request['vehicle']['seating_capacity'])) {

                    $AssetData = $AssetData->where('vehicle.seating_capacity', '=',(int)$request['vehicle']['seating_capacity']);
                }
                if (isset($request['vehicle']['odo_meter_reading'])) {
                    $AssetData = $AssetData->where('vehicle.odo_meter_reading', '=',(int)$request['vehicle']['odo_meter_reading']);
                }
            }
            // sarfaesi
            if (isset($request['sarfaesi_related'])) {
                if (isset($request['sarfaesi_related']['possession_type'])) {
                    $AssetData = $AssetData->where('sarfaesi_related.possession_type', $request['sarfaesi_related']['possession_type']);
                }
                if (isset($request['sarfaesi_related']['issuance_status_13_4'])) {
                    $AssetData = $AssetData->where('sarfaesi_related.issuance_status_13_4', $request['sarfaesi_related']['issuance_status_13_4']);
                }
                if (isset($request['sarfaesi_related']['issuance_status_13_2'])) {
                    $AssetData = $AssetData->where('sarfaesi_related.issuance_status_13_2', $request['sarfaesi_related']['issuance_status_13_2']);
                }
                if (isset($request['sarfaesi_related']['issuance_day_13_2'])) {
                    $issuance_day_13_2 = Carbon::now()->subDays($request['sarfaesi_related']['issuance_day_13_2'])->startOfDay();
                    $current_date = Carbon::now()->startOfDay();
                    $AssetData = $AssetData->whereBetween('sarfaesi_related.issuance_date_13_2', [$issuance_day_13_2, $current_date]);
                }
                if (isset($request['sarfaesi_related']['dm_cmm_application_status'])) {
                    if($request['sarfaesi_related']['dm_cmm_application_status'] == 'applied')
                    {
                        $AssetData = $AssetData->whereNotNull('sarfaesi_related.dm_application_date');
                    }else{
                        $AssetData = $AssetData->whereNull('sarfaesi_related.dm_application_date');
                    }
                    
                }
                if (isset($request['sarfaesi_related']['dm_cmm_inspection_conducted'])) {
                    if($request['sarfaesi_related']['dm_cmm_inspection_conducted'] == 'yes')
                    {
                        $AssetData = $AssetData->whereNotNull('sarfaesi_related.dm_inspection_date');
                    }else{
                        $AssetData = $AssetData->whereNull('sarfaesi_related.dm_inspection_date');
                    }
                }
                if (isset($request['sarfaesi_related']['dm_cmm_order_status'])) {
                    if($request['sarfaesi_related']['dm_cmm_order_status'] == 'issued')
                    {
                        $AssetData = $AssetData->whereNotNull('sarfaesi_related.dm_order_date');
                    }else{
                        $AssetData = $AssetData->whereNull('sarfaesi_related.dm_order_date');
                    }
                }
                if (isset($request['sarfaesi_related']['dm_application_day'])) {
                    $dm_application_day = Carbon::now()->subDays($request['sarfaesi_related']['dm_application_day'])->startOfDay();
                    $current_date = Carbon::now()->startOfDay();
                    $AssetData = $AssetData->whereBetween('sarfaesi_related.dm_application_date', [$dm_application_day, $current_date]);
                }
            }
            //Document
            if (isset($request['docuemnt'])) {
                if (!isset($request['docuemnt']['no_photos']) || !isset($request['docuemnt']['with_photos'])) {
                    if (isset($request['docuemnt']['no_photos'])) {
                        $AssetData = $AssetData->doesntHave('feature_image');
                    }
                    if (isset($request['docuemnt']['with_photos'])) {
                        $AssetData = $AssetData->whereHas('feature_image');
                    }
                }
            }

            $per_page = (int) $request->input('per_page', 10);
            $sort = $request->input('sort', 'created_at');
            $order = $request->input('order', 'asc');
            $AssetData = $AssetData->orderBy($sort, $order)->paginate($per_page);
            $AssetData = $this->getLoanDetails($AssetData);

        }
        if (!empty($AssetData)) {
            return $AssetData;
        } else {
            throw new \Exception("Record not found");
        }
    }


    public function getLoanDetails($AssetData)
    {
        foreach ($AssetData as $key => &$val) {

            $loans = \App\Models\Loan::with('borrowerDetail', 'bankDetail')->select('borrower_id', 'account_no', 'first_sanction_date', 'banking_arrangement', 'lead_bank', 'sbi_share', 'npa_date')->whereIn('_id', $val->loan)->where('is_active', true)->get()->toArray();
            $count = count($loans);
            $borrower_name = null;
            $npa_date = null;
            foreach ($loans as $key => &$value) {
                # code...
                $value['first_sanction_date'] = $value['first_sanction_date']->toDateTime()->format('d/m/Y');
                $value['npa_date'] = $value['npa_date']->toDateTime()->format('d/m/Y');
                $value['borrower_id'] = $value['borrower_detail'];
                $value['lead_bank'] = $value['bank_detail'];
                unset($value['borrower_detail'], $value['bank_detail']);
                if (!isset($borrower_name))
                    $borrower_name = $value['borrower_id']['name'];
                if (!isset($npa_date))
                    $npa_date = $value['npa_date'];
            }
            if ($count > 1) {
                $borrower_name .= ', ...';
                $npa_date .= ', ...';
            }
            $loans['borrower_name'] = $borrower_name;
            $loans['npa_date'] = $npa_date;
            $val->loan = $loans;
        }
        return $AssetData;
    }
}
