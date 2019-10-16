<?php

namespace App\Services;

use App\Models\Asset;
use Illuminate\Support\Facades\DB;

class ReportsService
{
    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

    // Report on the basis of Category

    public function getCategoryReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }
        $match_array['customer.property_type'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        // \DB::connection('mongodb')->enableQueryLog();

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {

                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],
                    [
                        '$group' => [
                            '_id' => '$customer.property_type',
                            'count' => ['$sum' => 1],
                        ]
                    ],
                    [
                        '$project' => [
                            '_id' => 0,
                            'y' => '$count',

                            'name' => ['$switch' => [
                                'branches' => [
                                    ["case" => ['$eq' => ['$_id', 'open_vacant_plot']], "then" => "Open Vacant Plot"],
                                    ["case" => ['$eq' => ['$_id', 'residential']], "then" => "Residential"],
                                    ["case" => ['$eq' => ['$_id', 'commercial']], "then" => "Commercial"],
                                    ["case" => ['$eq' => ['$_id', 'industrial']], "then" => "Industrial"],
                                    ["case" => ['$eq' => ['$_id', 'agricultural']], "then" => "Agricultural"],
                                    ["case" => ['$eq' => ['$_id', 'stock']], "then" => "Stock"],
                                    ["case" => ['$eq' => ['$_id', 'other']], "then" => "Other"],
                                    ["case" => ['$eq' => ['$_id', 'vehicles']], "then" => "Vehicles"]
                                ],
                                "default" => null
                            ]],
                            // 'total' => ['$sum' => '$count']
                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            // dd("here", \DB::connection('mongodb')->getQueryLog());
            throw $exception;
        }
    }

    //  Report for Market value based on property type

    public function getMarketValueReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }
        $match_array['customer.property_type'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {

                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],
                    [
                        '$group' => [
                            '_id' => '$customer.property_type',
                            'count' => ['$sum' => 1],
                            'avg_market_value' => ['$avg' => '$valuation.avgfairmarketvalue'],
                        ]
                    ],
                    [
                        '$project' => [
                            '_id' => 0,
                            'y' => ['$ceil' => '$avg_market_value'],

                            'name' => ['$switch' => [
                                'branches' => [
                                    ["case" => ['$eq' => ['$_id', 'open_vacant_plot']], "then" => "Open Vacant Plot"],
                                    ["case" => ['$eq' => ['$_id', 'residential']], "then" => "Residential"],
                                    ["case" => ['$eq' => ['$_id', 'commercial']], "then" => "Commercial"],
                                    ["case" => ['$eq' => ['$_id', 'industrial']], "then" => "Industrial"],
                                    ["case" => ['$eq' => ['$_id', 'agricultural']], "then" => "Agricultural"],
                                    ["case" => ['$eq' => ['$_id', 'stock']], "then" => "Stock"],
                                    ["case" => ['$eq' => ['$_id', 'other']], "then" => "Other"],
                                    ["case" => ['$eq' => ['$_id', 'vehicles']], "then" => "Vehicles"]
                                ],
                                "default" => null
                            ]],
                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }


    //Report for Marketability

    public function getMarketabilityReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }
        $match_array['kapdata.marketability'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],
                    [
                        '$group' => [
                            '_id' => '$kapdata.marketability',
                            'avg_market_value' => ['$avg' => '$valuation.avgfairmarketvalue'],
                            'count' => ['$sum' => 1],

                        ]
                    ],
                    [
                        '$project' => [
                            '_id' => 0,
                            'y' => '$count',

                            'name' => ['$switch' => [
                                'branches' => [
                                    ["case" => ['$eq' => ['$_id', 'red']], "then" => "Low"],
                                    ["case" => ['$eq' => ['$_id', 'orange']], "then" => "Medium"],
                                    ["case" => ['$eq' => ['$_id', 'green']], "then" => "High"],
                                    ["case" => ['$eq' => ['$_id', 'unknown']], "then" => "Unknown"]
                                ],
                                "default" => null
                            ]],
                            'fair_market_avg' => ['$ceil' => '$avg_market_value']

                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    // Report for possession type

    public function getPossessionReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }

        $match_array['sarfaesi_related.possession_type'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],
                    [
                        '$group' => [
                            '_id' => '$sarfaesi_related.possession_type',
                            'count' => ['$sum' => 1],

                        ]
                    ],
                    [
                        '$project' => [
                            '_id' => 0,
                            'y' => '$count',
                            'name' => ['$switch' => [
                                'branches' => [
                                    ["case" => ['$eq' => ['$_id', 'symbolic']], "then" => "SYMBOLIC"],
                                    ["case" => ['$eq' => ['$_id', 'physical']], "then" => "PHYSICAL"],
                                    ["case" => ['$eq' => ['$_id', 'not_repossessed']], "then" => "NOT REPOSSESSED"],
                                    ["case" => ['$eq' => ['$_id', 'unknown']], "then" => "UNKNOWN"]
                                ],
                                "default" => null
                            ]],

                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Report for KAP data

    public function getKapDataReports($request)
    {

        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }

        $match_array['template_id'] = ['$in' => config('assets.kapdata_template')];
        $match_array['kapdata.avgkapprice'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],

                    [
                        '$group' => [
                            '_id' => ['property_type' => '$customer.property_type', 'kap' => '$kapdata.avgkapprice'],
                            'count' => ['$sum' => 1],
                        ],
                    ],

                    [
                        '$project' => [
                            '_id' => 0,
                            'property_type' => '$_id.property_type',
                            'kap' => '$_id.kap',
                            'count' => 1

                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Report Based on SUb type

    public function getSubtypeReports($request)
    {

        $property_sub_type = config('assets.property_sub_type');
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }

        $match_array['customer.property_type'] = ['$exists' => true, '$nin' => [null, 'vehicles', 'others', 'stock']];
        $match_array['customer.property_sub_type'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array, $property_sub_type) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],

                    [
                        '$group' => [
                            '_id' => ['property_type' => '$customer.property_type', 'property_sub_type' => '$customer.property_sub_type'],
                            'count' => ['$sum' => 1],
                        ],
                    ],

                    [
                        '$project' => [
                            '_id' => 0,
                            'property_type' => '$_id.property_type',
                            'name' => '$_id.property_sub_type',
                            'kap' => '$_id.kap',
                            'y' => '$count'
                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    // Report for possession type

    public function getAuctionDataReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }

        $match_array['template_id'] = ['$in' => config('template.sections.past_auction')];
        $match_array['past_auction.no_of_auction_held'] = ['$exists' => true, '$ne' => null];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],

                    [
                        '$bucket' => [
                            'groupBy' => '$past_auction.no_of_auction_held',
                            'boundaries' => [0, 1, 2, 3],
                            'default' => "2+",
                            'output' => [
                                'count' => ['$sum' => 1],
                                'titles' => ['$push' => '$customer.property_type']
                            ]
                        ]
                    ],

                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Report for Reserve Price

    public function getReservePriceReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }

        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        $match_array['past_auction.auction.0.reserve_price'] = ['$exists' => true];


        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([
                    [
                        '$match' => $match_array
                    ],
                    [
                        '$unwind' => '$past_auction.auction'
                    ],

                    [
                        '$group' => [
                            '_id' => ['property_type' => '$customer.property_type', 'reserve_price' => '$past_auction.auction.reserve_price'],
                            'reserve_price' => ['$first' => '$past_auction.auction.reserve_price'],

                            'count' => ['$sum' => 1],
                        ],
                    ],

                    [
                        '$project' => [
                            '_id' => 0,
                            'property_type' => '$_id.property_type',
                            'reserve_price' => 1,
                            'count' => 1

                        ]
                    ]
                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    //Report for Area Spread Report

    public function getAreaSpreadReports($request)
    {
        $match_array = [];
        if (!empty($request['city'])) {
            $match_array['address.city'] = ['$in' => $request['city']];
        }
        if (!empty($request['state'])) {
            $match_array['address.state'] = ['$in' => $request['state']];
        }
        if (!empty($request['pincode'])) {
            $match_array['address.pincode'] = ['$in' => $request['pincode']];
        }
        if (!empty($request['recovery_branch'])) {
            $match_array['customer.recovery_branch'] = ['$in' => $request['recovery_branch']];
        }
        $match_array['size.area'] = ['$exists' => true, '$ne' => null];
        $match_array['customer.property_type'] = ['$nin' => ['vehicles', 'others', 'stock']];
        $match_array['status'] = ['$exists' => true, '$eq' => 'completed'];

        try {
            $data = Asset::raw(function ($collection) use ($match_array) {
                return $collection->aggregate([

                    [
                        '$match' => $match_array
                    ],

                    [
                        '$group' => [
                            '_id' => ['property_type' => '$customer.property_type', 'area' => '$size.area'],
                            'count' => ['$sum' => 1],
                        ],
                    ],

                    [
                        '$project' => [
                            '_id' => 0,
                            'property_type' => '$_id.property_type',
                            'area' => '$_id.area',
                            'count' => 1

                        ]
                    ]


                ]);
            });
            return $data;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
