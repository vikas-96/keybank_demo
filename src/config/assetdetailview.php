<?php

return [

    "customer" => [
        "property_id" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "description" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "property_type" => ['T1s', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        "property_sub_type" => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'is_nclt' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'migrating_branch' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'recovery_branch' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'recall_date' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'clo_name' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'co_name' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
    ],

    "loan" => [
        'account_no' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'npa_date' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'borrower_name' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
        'cif' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T11', 'T12', 'T13', 'T14', 'T15'],
    ],

    "address" => [
        'property_address' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
    ],

    'configuration' => [
        'configuration' => ['T1'],
        'no_of_servant_rooms' => ['T1'],
        'no_of_servant_toilets' => ['T1'],
        'no_of_toilets' => ['T1','T3','T4','T5','T10'],
        'no_of_terraces' => ['T1'],
        'no_of_cabins' => ['T3','T4','T10'],
        'no_of_conference_rooms' => ['T3','T4','T10'],
        "no_of_seats" => ['T3','T4','T10'],
        "pantry" => ['T3','T4'],
        "other_rooms" => ['T3','T4'],
        "no_of_floor_in_unit" => ['T3','T4','T5'],
        "no_of_rooms" => ['T5'],

    ],

    'size' => [
        'area_type' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12'],
        'area' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12'],
        'unit' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12'],
        'loft_area' => ['T1','T3','T4'],
        'loft_height' => ['T1','T3','T4'],
        'loft_area_type' => ['T1','T3','T4'],
        'loft_unit' => ['T1','T3','T4'],
        'terrace_area' => ['T1','T3','T4'],
        'terrace_unit' => ['T1','T3','T4'],
        'basement_construction' => ['T1','T3','T4','T5','T10'],
        'basement_construction_area' => ['T1','T3','T4','T5','T10'],
        'basement_area_type' => ['T1','T3','T4','T5','T10'],
        'basement_unit' => ['T1','T3','T4','T5','T10'],
        'basement_usage' => ['T1','T3','T4','T5','T10'],
    ],

    'unit' => [
        'business_nature' => ['T3','T4','T5','T10'],
        'furnishing_status' => ['T1','T3','T4','T5'],
        'furnishing_details' => ['T1','T3','T4','T5'],
        'flooring_type' => ['T1','T3','T4','T5'],
        'flat_usp' => ['T1'],
        'apartment_facing' => ['T1'],
        'office_usp' => ['T1','T3'],
        'office_facing' => ['T1','T3'],
        'unit_usp' => ['T1','T3','T4','T5'],
        'unit_facing' => ['T1','T3','T4','T10'],
        'facing' => ['T1','T3','T4'],
        'p&m_description' => ['T14'],
    ],

    "plot" => [
        'plot_amenities' => ['T2'],
    ],
    
    "building" => [
        'lift_in_building' => ['T1','T3','T4','T5','T6','T7','T8','T10','T12'],
        'building_amenities' => ['T1','T3','T6','T7','T8','T9','T10','T12'],
        'building_completion_year' => ['T1','T3','T4','T5','T6','T7','T10','T12'],
    ],
    
    "amenities" => [
        'no_of_covered_parkings' => ['T1','T3','T4'],
        'no_of_open_parkings' => ['T1','T3','T4'],
        'total_no_of_parkings' => ['T1','T3','T4'],
    ],

    "neighbourhood" => [
        'metro_station_nearby' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11'],
        'railway_within_500_meter' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11'],
        'no_of_schools' => ['T1','T2','T6','T7','T11'],
        'no_of_shopping_malls' => ['T1','T2','T6','T7','T11'],
        'no_of_hospitals' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11'],
        'no_of_atms' => ['T1','T2','T3','T4','T6','T7','T11'],
        'no_of_restaurants' => ['T1','T2','T3','T4','T6','T7','T11'],
        'no_of_parks' => ['T1','T2','T6','T7','T11'],
        'distance_from_closest_airport' => ['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11'],
        'no_of_petrol_pumps' => ['T1','T2','T3','T4','T6','T7','T8','T9','T10','T11'],
    ],

    "valuation" => [
        'fair_market_value_1' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'fair_market_value_2' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'realizable_value_1' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'realizable_value_2' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'forced_sale_value_1' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'forced_sale_value_2' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],

    "other_dues" => [
        'society_dues' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'electricity_dues' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'water_dues' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'property_tax_dues' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'other_dues_nature' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'other_dues_amount' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],

    "upcoming_auction" => [
        'e_auction_date' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        'auction_start_datetime' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        'auction_end_datetime' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
        'reserve_price' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
    ],

    "past_auction" => [
        'no_of_auction_held' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T14'],
    ],

    "sarfaesi_related" => [
        'possession_type' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_status_13_2' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_date_13_2' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_status_13_4' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_date_13_4' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],

    "kap_data" => [
        'marketability' => ["T1", "T3", "T4"],
        'kap_price' => ["T1", "T3", "T4"],
        'kap_price_upper' => ["T1", "T3", "T4"],
        'packaging_suggestions' => ["T1", "T3", "T4"],
        'other_insights' => ["T1", "T3", "T4"],
    ],

    "stock_other" => [
        'stock_description' => ['T11','T15'],
        'latest_value' => ['T11','T15'],
    ],

];