<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ReportsResource;
use Illuminate\Http\Request;
use App\Services\ReportsService;


class ReportsController extends Controller
{
    protected $ReportsService;

    public function __construct(ReportsService $ReportsService)
    {
        $this->ReportsService = $ReportsService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // This will provide data according to the categories, For eg. Residential,Commercial etc.

    public function getCategoryReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getCategoryReports($request->all());
            return ReportsResource::collection($data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    // Market value based on Property type

    public function getMarketValueReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getMarketValueReports($request->all());
            return ReportsResource::collection($data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }


    // For gettting Marketability and Fair Market value Avg.

    public function getMarketabilityReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getMarketabilityReports($request->all());
            return ReportsResource::collection($data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    //Possession Type report: Symbolic/Physicl etc..

    public function getPossessionReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getPossessionReports($request->all());
            return ReportsResource::collection($data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    // Kap price report on the basis of Range:  Applicable for Residential, Commercial and Agricultural(T1,T2,T4)

    public function getKapDataReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getKapDataReports($request->all());
            $interval = config('template.kap_price_interval');

            if (!empty($data)) {
                $data = $data->toArray();
                $data_array = [];
                $i = 0;
                foreach ($interval as $value) {
                    $range = explode('-', $value);
                    $min = $range[0];
                    $max = $range[1];
                    if (!is_numeric($max)) {
                        $max = 9000;
                        $value = "> $min";
                    }

                    $residential_count = $commercial_count = $agricultural_count = 0;

                    foreach ($data as $key => $val) {

                        if ($val['kap'] >= $min * 100000 && $val['kap'] < $max * 100000) {
                            switch ($val['property_type']) {
                                case 'residential':
                                    $residential_count = $residential_count + $val['count'];
                                    break;
                                case 'commercial':
                                    $commercial_count =  $commercial_count + $val['count'];
                                    break;
                                case 'agricultural':
                                    $agricultural_count = $agricultural_count + $val['count'];
                                    break;
                                default:
                                    break;
                            }
                        }

                        $data_array[$i]['name'] = $value;
                        $data_array[$i]['data'] = [$residential_count, $commercial_count, $agricultural_count];
                    }
                    $i++;
                }
            }
            $final_data = array();

            $final_data['x'] = ['Residential', 'Commercial', 'Agricultural'];
            $final_data['data'] = $data_array;
            return response()->json($final_data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }


    public function getSubtypeReports(Request $request)
    {
        try {
            $subtype_data = [];
            $data = $this->ReportsService->getSubtypeReports($request->all());
            if (!empty($data->toArray())) {
                $property_type = array_column($data->toArray(), 'property_type');
                // $property_types = array_unique($property_type);
                foreach ($data->toArray() as $property) {
                    $property_type_label =  config("assets.property_sub_type." . $property['name']);
                    $subtype_data[$property['property_type']][] = [
                        'y' => $property['y'],
                        'name' => $property_type_label
                    ];
                }
            }
            $final_data = $subtype_data;
            return response()->json($final_data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function getReservePriceReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getReservePriceReports($request->all());

            $interval = config('template.reserve_price_interval');
            if (!empty($data)) {
                $data = $data->toArray();

                $data_array = [];
                $i = 0;
                foreach ($interval as $value) {
                    $range = explode('-', $value);
                    $min = $range[0];
                    $max = $range[1];

                    if (!is_numeric($max)) {
                        $max = 9000;
                        $value = "> $min";
                    }

                    $residential_count = $commercial_count = $agricultural_count = $industrial_count = $stock_count = $others_count = $vehicles_count = 0;
                    foreach ($data as $key => $val) {

                        if ($val['reserve_price'] >= $min * 100000 && $val['reserve_price'] < $max * 100000) {
                            switch ($val['property_type']) {
                                case 'residential':
                                    $residential_count = $residential_count + $val['count'];
                                    break;
                                case 'commercial':
                                    $commercial_count =  $commercial_count + $val['count'];
                                    break;
                                case 'industrial':
                                    $industrial_count =  $industrial_count + $val['count'];
                                    break;
                                case 'agricultural':
                                    $agricultural_count = $agricultural_count + $val['count'];
                                    break;

                                default:
                                    break;
                            }
                        }

                        $data_array[$i]['name'] = $value;
                        $data_array[$i]['data'] = [$residential_count, $commercial_count, $industrial_count, $agricultural_count];
                    }
                    $i++;
                }
            }
            $final_data = array();

            $final_data['x'] = ['Residential', 'Commercial', 'Industrial', 'Agricultural'];
            $final_data['data'] = $data_array;
            return response()->json($final_data);

            return ReportsResource::collection($data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function getAuctionDataReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getAuctionDataReports($request->all());

            foreach ($data->toArray() as $key => $val) {
                $range[] = $val['_id'];
                $property_type = array_count_values((array) $val['titles']);
                $subtype = ['residential', 'commercial', 'industrial', 'agricultural', 'vehicles'];

                // if property subtype does not exist then will assign with 0
                foreach ($subtype as $val) {
                    if (array_key_exists($val, $property_type)) {
                        $allsorteddata[] = [$val => $property_type[$val]];
                    } else {
                        $allsorteddata[] = [$val => 0];
                    }
                }
            }

            $reportdata = [];

            if (!empty($allsorteddata)) {
                $residential = array_column($allsorteddata, 'residential');
                $commercial = array_column($allsorteddata, 'commercial');
                $industrial = array_column($allsorteddata, 'industrial');
                $agricultural = array_column($allsorteddata, 'agricultural');
                $vehicles = array_column($allsorteddata, 'vehicles');

                if (array_sum($residential) > 0) {
                    $reportdata[] = [
                        'name' => 'Residential',
                        'y' => array_sum($residential),
                        'range' => $range,
                        'value' => $residential
                    ];
                }
                if (array_sum($commercial) > 0) {
                    $reportdata[] = [
                        'name' => 'Commercial',
                        'y' => array_sum($commercial),
                        'range' => $range,
                        'value' => $commercial
                    ];
                }
                if (array_sum($industrial) > 0) {
                    $reportdata[] = [
                        'name' => 'Industrial',
                        'y' => array_sum($industrial),
                        'range' => $range,
                        'value' => $industrial
                    ];
                }
                if (array_sum($agricultural) > 0) {
                    $reportdata[] = [
                        'name' => 'Agricultural',
                        'y' => array_sum($agricultural),
                        'range' => $range,
                        'value' => $agricultural
                    ];
                }
                if (array_sum($vehicles) > 0) {
                    $reportdata[] = [
                        'name' => 'Vehicles',
                        'y' => array_sum($vehicles),
                        'range' => $range,
                        'value' => $vehicles
                    ];
                }
            }
            return $reportdata;
        } catch (\Exception $ex) {
            dd($ex);
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }

    public function getAreaSpreadReports(Request $request)
    {
        try {
            $data = $this->ReportsService->getAreaSpreadReports($request->all());
            $interval = config('template.area_spread_interval');

            if (!empty($data)) {
                $data = $data->toArray();
                $data_array = [];
                $i = 0;
                foreach ($interval as $value) {
                    $range = explode('-', $value);
                    $min = $range[0];
                    $max = $range[1];
                    if (!is_numeric($max)) {
                        $max = 9000;
                        $value = "> $min";
                    }

                    $residential_count = $commercial_count = $agricultural_count = 0;

                    foreach ($data as $key => $val) {
                        if ($val['area'] >= $min && $val['area'] < $max) {

                            switch ($val['property_type']) {
                                case 'residential':
                                    $residential_count = $residential_count + $val['count'];
                                    break;
                                case 'commercial':
                                    $commercial_count =  $commercial_count + $val['count'];
                                    break;
                                case 'agricultural':
                                    $agricultural_count = $agricultural_count + $val['count'];
                                    break;
                                default:
                                    break;
                            }
                        }
                        $data_array[$i]['name'] = $value;
                        $data_array[$i]['data'] = [$residential_count, $commercial_count, $agricultural_count];
                    }
                    $i++;
                }
            }
            $final_data = array();

            $final_data['x'] = ['Residential', 'Commercial', 'Agricultural'];
            $final_data['data'] = $data_array;
            return response()->json($final_data);
        } catch (\Exception $ex) {
            return response()->json(['message' => $ex->getMessage()], 500);
        }
    }
}
