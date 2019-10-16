<div class="col-md-24 section-heading">
    <h5>Basic Amenities</h5>
</div>
@if(in_array($template_id,config('template.amenities.no_of_covered_parkings')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_covered_parkings">Number of Covered parkings
        </label>
        <input type="number" name="amenities[no_of_covered_parkings]" id="no_of_covered_parkings"
            value="{{old('amenities.no_of_covered_parkings',($assets['amenities']['no_of_covered_parkings'] ?? null))}}">
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.no_of_open_parkings')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_open_parkings">Number of Open parkings
        </label>
        <input type="number" name="amenities[no_of_open_parkings]" id="no_of_open_parkings"
            value="{{old('amenities.no_of_open_parkings',($assets['amenities']['no_of_open_parkings'] ?? null))}}">
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.total_no_of_parkings')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="total_no_of_parkings">Total Number of parkings
        </label>
        <input type="text" name="amenities[total_no_of_parkings]" id="total_no_of_parkings"
            value="{{old('amenities.total_no_of_parkings',($assets['amenities']['total_no_of_parkings'] ?? null))}}">
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.electricity_line_provided')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="electricity_line_provided">Electricity Line provided up to Plot</label>
        <select name="amenities[electricity_line_provided]" id="electricity_line_provided" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.electricity_line_provided',($assets['amenities']['electricity_line_provided'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.electricity_line_provided')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="water_line_provided">Water Line provided up to Plot</label>
        <select name="amenities[water_line_provided]" id="water_line_provided" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.water_line_provided',($assets['amenities']['water_line_provided'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.electricity_line_provided')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="gas_line_provided">Gas Line provided up to Plot</label>
        <select name="amenities[gas_line_provided]" id="gas_line_provided" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.gas_line_provided',($assets['amenities']['gas_line_provided'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.amenities.electricity_line_provided')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="tube_well_in_premises">Tube Well in Premises</label>
        <select name="amenities[tube_well_in_premises]" id="tube_well_in_premises" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.tube_well_in_premises',($assets['amenities']['tube_well_in_premises'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif

<div class="col-md-6 ">
    <div class="form-group">
        <label for="electricity_availability">Power Backup</label>
        <select name="amenities[electricity_availability]" id="electricity_availability" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.electricity_availability',($assets['amenities']['electricity_availability'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="water_availability">Water Availability - 24/7</label>
        <select name="amenities[water_availability]" id="water_availability" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('amenities.water_availability',($assets['amenities']['water_availability'] ?? null))==$k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>


@push('js')
<script type="text/javascript">
</script>
@endpush