<div class="col-md-24 section-heading">
    <h5>Vehicle Details</h5>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="vehicle_location" class="required">Location of Vehicle</label>
        <input type="text" name="vehicle[vehicle_location]" id="vehicle_location"
            value="{{old('vehicle.vehicle.vehicle_location',($assets['vehicle']['vehicle_location'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="rto_regn_no" class="required">RTO Regn No.</label>
        <input type="text" class="to_uppercase" name="vehicle[rto_regn_no]" id="rto_regn_no"
            value="{{old('vehicle.rto_regn_no',($assets['vehicle']['rto_regn_no'] ?? null))}}"
            onkeyup="this.value = this.value.toUpperCase();">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="rto_region" class="required">RTO Region</label>
        <input type="text" name="vehicle[rto_region]" id="rto_region"
            value="{{old('vehicle.rto_region',($assets['vehicle']['rto_region'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="vehicle_type" class="required">Type of Vehicle</label>
        <select name="vehicle[vehicle_type]" id="vehicle_type" class="cs-select">
            <option value=""></option>
            @php
            $value = "";
            if(null !== old('vehicle.vehicle_type',($assets['vehicle']['vehicle_type'] ?? null)))
            {
            $value = old('vehicle.vehicle_type',($assets['vehicle']['vehicle_type'] ?? null));
            }
            elseif(isset($vehicle_type))
            {
            $value = $vehicle_type;
            }
            @endphp
            @foreach (config('assets.vehicle_type') as $k=>$v )
            @php
            $selected = $value == $k ? 'selected' : '';
            @endphp
            <option value={{$k}} {{$selected}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="vehicle_purpose">Commercial / Personal</label>
        <select name="vehicle[vehicle_purpose]" id="vehicle_purpose" class="cs-select">
            <option value=""></option>
            @php
            $value = "";
            if(null !== old('vehicle.vehicle_purpose',($assets['vehicle']['vehicle_purpose'] ?? null)))
            {
            $value = old('vehicle.vehicle_purpose',($assets['vehicle']['vehicle_purpose'] ?? null));
            }
            elseif(isset($vehicle_purpose))
            {
            $value = $vehicle_purpose;
            }
            @endphp
            @foreach (config('assets.vehicle_purpose') as $k=>$v )
            @php
            $selected = $value == $k ? 'selected' : '';
            @endphp
            <option value={{$k}} {{$selected}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="manufacturer" class="required">Manufacturer</label>
        <input type="text" name="vehicle[manufacturer]" id="manufacturer"
            value="{{old('vehicle.manufacturer',($assets['vehicle']['manufacturer'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="model" class="required">Model</label>
        <input type="text" class="to_uppercase" name="vehicle[model]" id="model"
            value="{{old('vehicle.model',($assets['vehicle']['model'] ?? null))}}"
            onkeyup="this.value = this.value.toUpperCase();">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="purchase_cost">Purchase Details Cost (Rs.)</label>
        <input type="text" name="vehicle[purchase_cost]" id="purchase_cost"
            value="{{old('vehicle.purchase_cost',($assets['vehicle']['purchase_cost'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="tare_weight">Unladen / Tare Wt Kgs</label>
        <input type="text" name="vehicle[tare_weight]" id="tare_weight"
            value="{{old('vehicle.tare_weight',($assets['vehicle']['tare_weight'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="gross_weight">Laden / Gross Wt Kgs</label>
        <input type="text" name="vehicle[gross_weight]" id="gross_weight"
            value="{{old('vehicle.gross_weight',($assets['vehicle']['gross_weight'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="colour">Colour</label>
        <input type="text" name="vehicle[colour]" id="colour"
            value="{{old('vehicle.colour',($assets['vehicle']['colour'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="month_year_mfg">Month & Year of Mfg</label>
        <div class="row">
        <div class="col-6 ">
        <input type="text" name="vehicle[month_year_mfg]" id="month_year_mfg"
            value="{{old('vehicle.month_year_mfg',($assets['vehicle']['month_year_mfg'] ?? null))}}" placeholder="Month">
        </div>
        <span style="line-height: 30px; display: inline-block; vertical-align: top">-</span>
        <div class="col-6 ">
        <input type="text" name="vehicle[year_mfg]" id="year_mfg"
            value="{{old('vehicle.year_mfg',($assets['vehicle']['year_mfg'] ?? null))}}" placeholder="Year">
        </div>
    </div>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="chasis_no">Chasis No</label>
        <input type="text" name="vehicle[chasis_no]" id="chasis_no"
            value="{{old('vehicle.chasis_no',($assets['vehicle']['chasis_no'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="engine_no">Engine No</label>
        <input type="text" name="vehicle[engine_no]" id="engine_no"
            value="{{old('vehicle.engine_no',($assets['vehicle']['engine_no'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="fuel_type">Fuel Type</label>
        <select name="vehicle[fuel_type]" id="fuel_type" class="cs-select">
            <option value=""></option>
            @php
            $value = "";
            if(null !== old('vehicle.fuel_type',($assets['vehicle']['fuel_type'] ?? null)))
            {
            $value = old('vehicle.fuel_type',($assets['vehicle']['fuel_type'] ?? null));
            }
            elseif(isset($fuel_type))
            {
            $value = $fuel_type;
            }
            @endphp
            @foreach (config('assets.fuel_type') as $k=>$v )
            @php
            $selected = $value == $k ? 'selected' : '';
            @endphp
            <option value={{$k}} {{$selected}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="seating_capacity">Seating Capacity</label>
        <input type="text" name="vehicle[seating_capacity]" id="seating_capacity"
            value="{{old('vehicle.seating_capacity',($assets['vehicle']['seating_capacity'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="total_tyres">Total Tyres - Body</label>
        <input type="text" name="vehicle[total_tyres]" id="total_tyres"
            value="{{old('vehicle.total_tyres',($assets['vehicle']['total_tyres'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="fitted_types_condition">Fitted Tyres Condition</label>
        <input type="text" name="vehicle[fitted_tyres_condition]" id="fitted_tyres_condition"
            value="{{old('vehicle.fitted_tyres_condition',($assets['vehicle']['fitted_tyres_condition'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="spare_tyres">No of Spare Tyre/s</label>
        <input type="text" name="vehicle[spare_tyres]" id="spare_tyres"
            value="{{old('vehicle.spare_tyres',($assets['vehicle']['spare_tyres'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="cond_spare_tyres">Condition of Spare Tyre/s</label>
        <input type="text" name="vehicle[cond_spare_tyres]" id="cond_spare_tyres"
            value="{{old('vehicle.cond_spare_tyres',($assets['vehicle']['cond_spare_tyres'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="displacement">Displacement (CC)</label>
        <input type="text" name="vehicle[displacement]" id="displacement"
            value="{{old('vehicle.displacement',($assets['vehicle']['displacement'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="horsepower">Horsepower</label>
        <input type="text" name="vehicle[horsepower]" id="horsepower"
            value="{{old('vehicle.horsepower',($assets['vehicle']['horsepower'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="cylinders">Cylinders</label>
        <input type="text" name="vehicle[cylinders]" id="cylinders"
            value="{{old('vehicle.cylinders',($assets['vehicle']['cylinders'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="lifting_capacity">Lifting Capacity</label>
        <input type="text" name="vehicle[lifting_capacity]" id="lifting_capacity"
            value="{{old('vehicle.lifting_capacity',($assets['vehicle']['lifting_capacity'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="used_vehicle">Vehicle Used For</label>
        <input type="text" name="vehicle[used_vehicle]" id="used_vehicle"
            value="{{old('vehicle.used_vehicle',($assets['vehicle']['used_vehicle'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="asset_condition">Asset Condition</label>
        <select name="vehicle[asset_condition]" id="asset_condition">
            <option value=""></option>
            @php
            $value = "";
            if(null !== old('vehicle.asset_condition',($assets['vehicle']['asset_condition'] ?? null)))
            {
            $value = old('vehicle.asset_condition',($assets['vehicle']['asset_condition'] ?? null));
            }
            elseif(isset($asset_condition))
            {
            $value = $asset_condition;
            }
            @endphp
            @foreach (config('assets.asset_condition') as $k=>$v )
            @php
            $selected = $value == $k ? 'selected' : '';
            @endphp
            <option value={{$k}} {{$selected}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="odo_meter_reading">Odometer Reading (kms)</label>
        <input type="text" name="vehicle[odo_meter_reading]" id="odo_meter_reading"
            value="{{old('vehicle.odo_meter_reading',($assets['vehicle']['odo_meter_reading'] ?? null))}}">
    </div>
</div>

        <div class="col-md-6 ">
                <div class="form-group">
                <label for="residual_life">Residual Life (Yrs)</label>
                <input type="number" step=".01" name="vehicle[residual_life]" id="residual_life"
                    value="{{old('vehicle.residual_life',($assets['vehicle']['residual_life'] ?? null))}}">
            </div>
        </div>

        <div class="col-md-6 ">
                <div class="form-group">
                <label for="replacement_cost">Replacement Cost</label>
                <input type="number" name="vehicle[replacement_cost]" id="replacement_cost"
                    value="{{old('vehicle.replacement_cost',($assets['vehicle']['replacement_cost'] ?? null))}}">
            </div>
        </div>

        <div class="col-md-6 ">
                <div class="form-group">
                <label for="other_vehicle_details">Other Vehicle Details</label>
                <input type="text" name="vehicle[other_vehicle_details]" id="other_vehicle_details"
                    value="{{old('vehicle.other_vehicle_details',($assets['vehicle']['other_vehicle_details'] ?? null))}}">
            </div>
        </div>



@push('js')
<script>
    $(document).ready(function(){

        $("#vehicle_type,#vehicle_purpose,#fuel_type,#fitted_types_condition,#asset_condition").select2({
            placeholder: 'Select an option',
            dropdownAutoWidth : true,
            width: '100%',
        });
        
    });
</script>
@endpush