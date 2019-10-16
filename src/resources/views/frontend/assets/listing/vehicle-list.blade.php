
    @if(in_array($template_id,config('list.vehicle.vehicle_location')))
    <div class="col-md-6">
        <span>Location of vehicle</span>
        <strong>{{ ($value['vehicle']['vehicle_location']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.rto_regn_no')))
    <div class="col-md-6">
        <span>RTO Regn. no.</span>
        <strong>{{ ($value['vehicle']['rto_regn_no']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.rto_region')))
    <div class="col-md-6">
        <span>RTO Region</span>
        <strong>{{ ($value['vehicle']['rto_region']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.vehicle_type')))
    <div class="col-md-6">
        <span>Vehicle Type</span>
        <!-- <strong>{{ ($value['vehicle']['vehicle_type']) ?? null }}</strong> -->
        <strong>{{ config('assets.vehicle_type.'.$value['vehicle']['vehicle_type']) }}</strong>
    </div>
    @endif

    {{-- @if(in_array($template_id,config('list.vehicle.vehicle_purpose')))
    <div class="col-md-6">
        <span>Vehicle Purpose</span>
        <!-- <strong>{{ ($value['vehicle']['vehicle_purpose']) ?? null }}</strong> -->

        <strong>{{ config('assets.vehicle_purpose.'.$value['vehicle']['vehicle_purpose']) }}</strong>
    </div>
    @endif --}}
    @if(in_array($template_id,config('list.vehicle.manufacturer')))
    <div class="col-md-6">
        <span>Manufacturer</span>
        <strong>{{ ($value['vehicle']['manufacturer']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.vehicle.model')))
    <div class="col-md-6">
        <span>Model</span>
        <strong>{{ ($value['vehicle']['model']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.colour')))
    <div class="col-md-6">
        <span>Color</span>
        <strong>{{ ($value['vehicle']['colour']) ?? null }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.vehicle.month_year_mfg')))
    <div class="col-md-6">
        <span>Month & year of MFG</span>
        <strong>{{ ($value['vehicle']['month_year_mfg']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.fuel_type')))
    <div class="col-md-6">
        <span>Fuel Type</span>
        <!-- <strong>{{ ($value['vehicle']['fuel_type']) ?? null }}</strong>
 -->
        <strong>{{ config('assets.fuel_type.'.$value['vehicle']['fuel_type']) }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.vehicle.seating_capacity')))
    <div class="col-md-6">
        <span>Seating Capacity</span>
        <strong>{{ ($value['vehicle']['seating_capacity']) ?? null }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.asset_condition')))
    <div class="col-md-6">
        <span>Condition of asset</span>
        <!--        <strong>{{ ($value['vehicle']['asset_condition']) ?? null }}</strong> -->

        <strong>{{ config('assets.asset_condition.'.$value['vehicle']['asset_condition']) }}</strong>
    </div>
    @endif
    @if(in_array($template_id,config('list.vehicle.odo_meter_reading')))
    <div class="col-md-6">
        <span>Odometer Reading (kms)</span>
        <strong>{{ ($value['vehicle']['odo_meter_reading']) ?? 'Unknown' }}</strong>
    </div>
    @endif

