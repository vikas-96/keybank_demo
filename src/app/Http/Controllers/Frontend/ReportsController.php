<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\AdminBaseController;
use \Illuminate\Support\Facades\DB;
use App\Models\Asset;
use App\Models\User;
use App\Http\Requests\ReportRequest;
use Session;

class ReportsController extends AdminBaseController
{
    function __construct(User $user)
    {
        $this->user = $user;
    }

    public function searchReports(Request $request)
    {
        if (isset($request->type))
            Session::put('report_type', $request->type);

        if (Session::has('report_type')) {
            return redirect()->route('reports');   // index function
        }

        $banklist_and_state = $this->api->with(['auth' => $this->user])->get('api/commondata');
        $categories_data['branch_and_state'] = $banklist_and_state;
        return view('frontend.reports.report-search', $categories_data);
    }

    public function getReportFilter(Request $request)
    {

        if (!Session::has('report_type'))
            Session::put('report_type', 'property_type');

        if (Session::has('reportsfilter')) {
            Session::forget('reportsfilter');
        }
        $reportsfilter['reportsfilter'] = $request->only('state', 'city', 'recovery_branch', 'pincode');
        if (!empty($reportsfilter['reportsfilter']))
            Session::put('reportsfilter', $reportsfilter['reportsfilter']);

        return redirect()->route('reports');  // index function
    }

    public function index(Request $request)
    {
        // if (!Session::has('reportsfilter') || !Session::has('report_type')) {
        //     return redirect()->route('reports-search');   // searchReport function
        // }
        try {
            $data = Session::has('reportsfilter') ? Session::get('reportsfilter') : [];

            $request->merge($data);
            $query_params = http_build_query($data, '', '&amp;');

            switch (Session::get('report_type')) {
                case "property_type":
                    $data['property_type'] = $this->property_type($query_params);
                    $data['market_value'] = $this->property_type_market_value($query_params);
                    break;
                case "property_sub_type":
                    $data = $this->property_sub_type($query_params);
                    break;
                case "area_pincode":
                    $data = $this->area_pincode($query_params);
                    break;
                case "reserve_price":
                    $data = $this->reserve_price($query_params);
                    break;
                case "kap_price":
                    $data = $this->kap_price($query_params);
                    break;
                case "area_spread":
                    $data = $this->area_spread($query_params);
                    break;
                case "marketability":
                    $data = $this->marketability($query_params);
                    break;
                case "possession_type":
                    $data = $this->possession_type($query_params);
                    break;
                case "auction":
                    $data = $this->auction($query_params);
                    break;
            }
            // dd($data);

            $banklist_and_state = $this->api->with(['auth' => $this->user])->get('api/commondata');
            $categories_data['branch_and_state'] = $banklist_and_state;

            return view('frontend.reports.reports', $categories_data, compact('data'));
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    public function property_type($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/categoryreports/?' . $query_params);
    }

    public function property_type_market_value($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/marketvaluereports/?' . $query_params);
    }

    public function property_sub_type($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/subtypereports/?' . $query_params);
    }

    public function area_pincode($query_params)
    {
        // return $this->api->with(['auth' => $this->user])->get('api/categoryreports/?' . $query_params);
    }

    public function reserve_price($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/reservepricereports/?' . $query_params);
    }

    public function kap_price($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/kapdatareports/?' . $query_params);
    }

    public function area_spread($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/areaspreadreports/?' . $query_params);
    }

    public function marketability($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/marketabilityreports/?' . $query_params);
    }

    public function possession_type($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/possessionreports/?' . $query_params);
    }

    public function auction($query_params)
    {
        return $this->api->with(['auth' => $this->user])->get('api/auctionreports/?' . $query_params);
    }

    public function getCity(Request $request)
    {
        $stateid_query_string = implode(',', $request->stateid);
        $response = $this->api->with(['auth' => $this->user])->get('api/city/' . $stateid_query_string);
        return $response;
    }

    public function getPincode(Request $request)
    {
        $cityid_query_string = implode(',', $request->cityid);
        $response = $this->api->with(['auth' => $this->user])->get('api/pincode/' . $cityid_query_string);
        return $response;
    }

    public function test(Request $request)
    {
        $data = [
            // 'state' => ["5d4d3ac349caf75293739c08"],
            'city' => ["5d4d3da249caf75293739ca1"],
            // 'pincode' => ["509353"],
        ];

        $request->merge($data);
        $query_params = http_build_query($data, '', '&amp;');

        try {
            $data =  $this->api->with(['auth' => $this->user])->get('api/categoryreports/?' . $query_params);
            return $data;
        } catch (\Exception $exception) {
            dd($exception);
            throw $exception;
        }
    }
}
