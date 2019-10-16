<?php

return [

	"customer"=>[
		'migrating_branch'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15'],
		'recovery_branch'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15'],
		'recall_date'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15'],
		'clo_name'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15'],
		'co_name'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15']
    ],
    
	"loan" =>[
		'npa_date'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T11','T12','T13','T14','T15']
    ],
    
	"address"=>[
		'property_address'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14'],
        'state'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14'],
        'city'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14'],
    ],
    
	'configuration'=>[
		'configuration'=>['T1']
    ],
    
	'size' => [
		"area"=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12']
    ],

    'valuation'=>[
    	'realizable_value_1'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14']
    ],

    'third_party_info'=>[
    	'resolution_agent_name'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14']
    ],

    'upcoming_auction'=>[
    	'auction_start_datetime'=>['T1','T2','T3','T4','T5','T6','T7','T8','T9','T10','T12','T13','T14']
    ],

    'kapdata'=>[
    	'kap_price'=>['T1','T3','T4'],
        'kap_price_upper'=>['T1', 'T3', 'T4']
    ],

    'plot'=>[
    	'approved_land_use'=>['T2']
    ],

    'office_summary'=>[
    	'unit_total_no'=>['T6','T7','T12'],
    	'total_area'=>['T6','T7','T12']
    ],

    'building'=>[
    	'building_completion_year'=>['T6','T7','T8','T12'],
    	'lift_in_building'=>['T6','T7','T8','T12'],
    	'business_nature'=>['T8','T9']
    ],

    'oc'=>[
    	'oc_status'=>['T6','T7','T8','T9','T12']
    ],

    'unit'=>[
    	'business_nature'=>['T10']
    ],

    'vehicle'=>[
    	'vehicle_location'=>['T13'],
    	'rto_region'=>['T13'],
    	'vehicle_type'=>['T13'],
    	'vehicle_purpose'=>['T13'],
    	'manufacturer'=>['T13'],
    	'model'=>['T13'],
    	'month_year_mfg'=>['T13'],
    	'fuel_type'=>['T13'],
    	'seating_capacity'=>['T13'],
    	'odo_meter_reading'=>['T13']
    ],
    'past_auction'=>[
        'no_of_auction_held'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],
    'sarfaesi_related'=>[
        'possession_type'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_status_13_4'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_status_13_2'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'issuance_date_13_2'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'dm_cmm_application_status'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'dm_cmm_inspection_conducted'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'dm_cmm_order_status'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
        'dm_application_day'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
    ],
    'document'=>['T1', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7', 'T8', 'T9', 'T10', 'T12', 'T13', 'T14'],
]
?>