<?php

return [
    'vehicle' => [
        "7" => [
            'vehicle_location'  => 'required',
            'rto_regn_no'  => 'required|regex:/^[\w-]*$/',
            'rto_region'  => 'required|regex:/^[\w-]*$/',
            'vehicle_type'  => 'required|in:light_motor_vehicle,hmv,2_wheeler',
            'vehicle_purpose'  => 'nullable|in:commerical,personal',
            'manufacturer'  => 'required|regex:/^[\w-]*$/',
            'model'  => 'required',
            'purchase_cost'  => 'nullable|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'fuel_type'  => 'nullable|in:petrol,diesel,hybrid,cng,electric',
            'seating_capacity' => 'nullable|numeric',
            'fitted_types_condition'  => 'nullable',
            'spare_tyres' => 'nullable|numeric',
            'cond_spare_tyres' => 'nullable',
            'displacement' => 'nullable|numeric',
            'horsepower' => 'nullable|numeric',
            'lifting_capacity' => 'nullable|numeric',
            'odo_meter_reading' => 'nullable|numeric',
        ],
    ],
];
