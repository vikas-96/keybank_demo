<?php

return [

    'customer' => [
        "property_id" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        //"description" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "property_category" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "property_type" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "property_sub_type" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "borrower_name" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        //"is_nclt" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        //"recovery_branch" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "migrating_branch" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "recovery_branch" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "recall_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "clo_name" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "co_name" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
    ],

    'loan' => [
        //To be fetched from relation of account no.
        'npa_date' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
    ],
    'address' => [
        'property_address' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10',  'T12',  'T14'],
    ],
    'configuration' => [
        'configuration' => ['T1'],
        'no_of_cabins' => ['T3', 'T10'],
        "no_of_conference_rooms" => ['T3', 'T4', 'T10'],
        "no_of_seats" => ['T3', 'T4', 'T10'],
        "pantry" => ['T3', 'T4', 'T10'],
        "no_of_toilets" => ["T10"]
    ],
    'size' => [
        'area_type' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12'],
        'area' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12'],
        'unit' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12'],
    ],
    'unit' => [
        'furnishing_status' => ["T1", "T3", "T4", "T5"],
        // "flat_usp" => ["T1"],
        // "office_usp" => ["T3"],
        // "unit_usp" => ["T4", "T5", "T10"],
        // "business_nature" => ["T3", "T4", "T5", "T10"],
        "p&m_description" => ["T14"],
    ],
    'building' => [
        "building_amenities" => ['T12'], // T1,T6, T7, T8,T3, T10, T9 Removed
        'business_nature' => ["T8", "T9"],
        'lift_in_building' => ['T6', 'T12'],
        'building_completion_year' => ['T6', 'T12'],
        'no_of_floors_in_building' => ['T6', 'T12']
    ],
    'neighbourhood' => [
        "no_of_hospitals" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10'], // T12 removed
        "no_of_schools" => ['T1', 'T2', 'T6', 'T7'],
        "no_of_atms" => ['T2'],
        "no_of_restaurants" => ['T1', 'T3', 'T4', 'T6', 'T7'],
        "metro_station_nearby" => ['T10'],
        "distance_from_closest_airport" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10'], // T12 removed
    ],

    //sidebar

    'valuation' => [
        //"fair_market_value_1" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //"fair_market_value_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //"realizable_value_1" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //"realizable_value_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //"forced_sale_value_1" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //"forced_sale_value_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        "fair_market_value_avg" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        "realizable_value_avg" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        "distress_value_avg" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],

    //sidebar

    "upcoming_auction" => [
        'e_auction_date' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        //'auction_start_datetime' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        'reserve_price' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],

    "past_auction" => [
        'no_of_auction_held' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
    ],

    //pending

    "sarfaesi" => [
        //"possession_type" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"possession_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"issuance_status_13_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"issuance_date_13_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"dues_amount_13_2" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"issuance_status_13_4" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"issuance_date_13_4" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"dm_application_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"dm_inspection_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"dm_order_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"fixation_possession_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"panchnama_assuance_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        //"possession_receipt_date" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
    ],

    //Sidebar

    'kap_data' => [
        "marketability" => ["T1", "T3", "T4"],
        "kap_price" => ["T1", "T3", "T4"],
        "kap_price_upper" => ["T1", "T3", "T4"],
        //"packaging_suggestions" => ["T1", "T3", "T4"],
        "other_insights" => ["T1", "T3", "T4"],
    ],

    'plot' => [
        'approved_land_use' => ['T2'],
        "plot_amenities" => ["T2"]
    ],

    'office_summary' => [
        'unit_total_no' => [], // T6,T12 Removed
        'area_type' => [],     // T6,T12 Removed
        'total_area' => [],     // T6,T12 Removed
        'unit' => [],       // T6,T12 Removed
    ],

    'oc' => [
        'oc_status' => [], // T8,T6,T12 Removed
    ],
    'stock_other' => [
        'stock_description' => ['T11', 'T15'],
        'latest_value' => ['T11', 'T15']
    ],

    'vehicle' => [
        "vehicle_location" => ['T13'],
        "rto_regn_no" => ['T13'],
        "rto_region" => ['T13'],
        "vehicle_type" => ['T13'],
        //"vehicle_purpose" => ['T13'],
        "manufacturer" => ['T13'],
        "model" => ['T13'],
        "colour" => ['T13'],
        "month_year_mfg" => ['T13'],
        "fuel_type" => ['T13'],
        "seating_capacity" => ['T13'],
        "asset_condition" => ['T13'],
        "odo_meter_reading" => ['T13']
    ],


];
