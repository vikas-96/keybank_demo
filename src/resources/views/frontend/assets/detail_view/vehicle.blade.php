@if(isset($assets['vehicle']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Vehicle Details</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'vehicle','vehicle_location',$template_id))
            <li>
                <span>Location of
                    Vehicle</span>{{ assetdetail_value($assets,'vehicle','vehicle_location',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','rto_regn_no',$template_id))
            <li>
                <span>RTO Regn No.</span>{{ assetdetail_value($assets,'vehicle','rto_regn_no',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','rto_region',$template_id))
            <li>
                <span>RTO Region</span>{{ assetdetail_value($assets,'vehicle','rto_region',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','vehicle_type',$template_id))
            <li>
                <span>Type of
                    Vehicle</span>{{config('assets.vehicle_type.'.assetdetail_value($assets,'vehicle','vehicle_type',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','vehicle_purpose',$template_id))
            <li>
                <span>Commercial /
                    Personal</span>{{config('assets.vehicle_purpose.'.assetdetail_value($assets,'vehicle','vehicle_purpose',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','manufacturer',$template_id))
            <li>
                <span>Manufacturer</span>{{ assetdetail_value($assets,'vehicle','manufacturer',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','model',$template_id))
            <li>
                <span>Model</span>{{ assetdetail_value($assets,'vehicle','model',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','colour',$template_id))
            <li>
                <span>Colour</span>{{ assetdetail_value($assets,'vehicle','colour',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','month_year_mfg',$template_id) || validate_assetdetail($assets,'vehicle','year_mfg',$template_id))
            <li>
                <span>Month & Year of Mfg</span>
                @if(!empty(assetdetail_value($assets,'vehicle','month_year_mfg',$template_id)))
                    {{ assetdetail_value($assets,'vehicle','month_year_mfg',$template_id) }}
                @else 
                    --
                @endif
                    /
                @if(!empty(assetdetail_value($assets,'vehicle','year_mfg',$template_id)))
                    {{ assetdetail_value($assets,'vehicle','year_mfg',$template_id) }}
                @else
                    --
                @endif
                &nbsp;&nbsp;&nbsp;&nbsp;(MM/YYYY)
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','fuel_type',$template_id))
            <li>
                <span>Fuel
                    Type</span>{{config('assets.fuel_type.'.assetdetail_value($assets,'vehicle','fuel_type',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','seating_capacity',$template_id))
            <li>
                <span>Seating Capacity</span>{{ assetdetail_value($assets,'vehicle','seating_capacity',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','asset_condition',$template_id))
            <li>
                <span>Asset
                    Condition</span>{{config('assets.asset_condition.'.assetdetail_value($assets,'vehicle','asset_condition',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','odo_meter_reading',$template_id))
            <li>
                <span>Odometer Reading (kms)</span>
                {{ assetdetail_value($assets,'vehicle','odo_meter_reading',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','purchase_cost',$template_id))
            <li>
                <span>Purchase Details Cost
                    (Rs.)</span>{{ assetdetail_value($assets,'vehicle','purchase_cost',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','tare_weight',$template_id))
            <li>
                <span>Unladen / Tare Wt Kgs</span>{{ assetdetail_value($assets,'vehicle','tare_weight',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','gross_weight',$template_id))
            <li>
                <span>Laden / Gross Wt Kgs</span>{{ assetdetail_value($assets,'vehicle','gross_weight',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','chasis_no',$template_id))
            <li>
                <span>Chasis No.</span>{{ assetdetail_value($assets,'vehicle','chasis_no',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','engine_no',$template_id))
            <li>
                <span>Engine No.</span>{{ assetdetail_value($assets,'vehicle','engine_no',$template_id) }}
            </li>
            @endif


            @if(validate_assetdetail($assets,'vehicle','total_tyres',$template_id))
            <li>
                <span>Total Tyres - Body</span>{{ assetdetail_value($assets,'vehicle','total_tyres',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','fitted_tyres_condition',$template_id))
            <li>
                <span>Fitted Tyres
                    Condition</span>{{ assetdetail_value($assets,'vehicle','fitted_tyres_condition',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','spare_tyres',$template_id))
            <li>
                <span>No of Spare Tyre/s</span>{{ assetdetail_value($assets,'vehicle','spare_tyres',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','cond_spare_tyres',$template_id))
            <li>
                <span>Condition of Spare
                    Tyre/s</span>{{ assetdetail_value($assets,'vehicle','cond_spare_tyres',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','displacement',$template_id))
            <li>
                <span>Displacement (CC)</span>{{ assetdetail_value($assets,'vehicle','displacement',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','horsepower',$template_id))
            <li>
                <span>Horsepower</span>{{ assetdetail_value($assets,'vehicle','horsepower',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','cylinders',$template_id))
            <li>
                <span>Cylinders</span>{{ assetdetail_value($assets,'vehicle','cylinders',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','lifting_capacity',$template_id))
            <li>
                <span>Lifting Capacity</span>{{ assetdetail_value($assets,'vehicle','lifting_capacity',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'vehicle','used_vehicle',$template_id))
            <li>
                <span>Vehicle Used For</span>{{ assetdetail_value($assets,'vehicle','used_vehicle',$template_id) }}
            </li>
            @endif


        </ul>
    </div>
</div>
@endif