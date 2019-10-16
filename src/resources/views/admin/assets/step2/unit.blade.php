        <div class="col-md-24 section-heading">
            <h5>Unit Details</h5>
        </div>
        @if(in_array($template_id,config('template.unit.business_nature')))
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="business_nature">Nature of Business</label>
                <input type="text" name="unit[business_nature]" id="business_nature"
                    value="{{ old('unit.business_nature',($assets['unit']['business_nature'] ?? null))}}">
            </div>
        </div>
        @endif


        @if(in_array($template_id,config('template.unit.furnishing_status')))
        @php
        $selected_furnishing = old('unit.furnishing_status',($assets['unit']['furnishing_status'] ?? null));
        @endphp
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="furnishing_status">Furnishing Status</label>
                <select name="unit[furnishing_status]" id="furnishing_status" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.furnishing_status') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.furnishing_status',($assets['unit']['furnishing_status'] ?? null)) == $k)?'selected':''}}>
                        {{$v}} </option>
                    @endforeach
                </select> </div>
        </div> @endif
        @if(in_array($template_id,config('template.unit.furnishing_details')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="furnishing_details">Furnishing Details
                </label>
                <input type="text" name="unit[furnishing_details]" id="furnishing_details" value="{{ old('unit.furnishing_details',($assets['unit']['furnishing_details'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.flooring_type')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="flooring_type">Type of Flooring </label>
                <select name="unit[flooring_type]" id="flooring_type" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.flooring_type') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.flooring_type',($assets['unit']['flooring_type'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.fire_safety_compliant')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="fire_safety_compliant">Fire Safety Compliant </label>
                <select name="unit[fire_safety_compliant]" id="fire_safety_compliant" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.yes_no_options') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.fire_safety_compliant',($assets['unit']['fire_safety_compliant'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.unit.office_usp')))
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="office_usp">Office USP</label>
                <input type="text" name="unit[office_usp]" id="office_usp" value="{{ old('unit.office_usp',($assets['unit']['office_usp'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.unit_usp')))
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="unit_usp">Unit USP</label>
                <input type="text" name="unit[unit_usp]" id="unit_usp" value="{{ old('unit.unit_usp',($assets['unit']['unit_usp'] ?? null))}}">
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.unit.flat_usp')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="flat_usp">Flat USP
                </label>
                <input type="text" name="unit[flat_usp]" id="flat_usp" value="{{ old('unit.flat_usp',($assets['unit']['flat_usp'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.office_facing')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="office_facing">Apartment Facing </label>
                <select name="unit[office_facing]" id="office_facing" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.directions') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.office_facing',($assets['unit']['office_facing'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.unit.apartment_facing')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="apartment_facing">Apartment Facing </label>
                <select name="unit[apartment_facing]" id="apartment_facing" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.directions') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.apartment_facing',($assets['unit']['apartment_facing'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.unit_facing')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="unit_facing">Unit Facing </label>
                <select name="unit[unit_facing]" id="unit_facing" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.directions') as $k=>$v )
                    <option value={{$k}}
                        {{(old('unit.unit_facing',($assets['unit']['unit_facing'] ?? null)) == $k)?'selected':''}}>
                        {{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.facing')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="facing">Facing </label>
                <select name="unit[facing][]" id="facing" class="cs-select-multi" multiple='true'>
                    @foreach (config('assets.facing') as $k=>$v )
                    <option value={{$k}}
                    {{(in_array($k,old('unit.facing',($assets['unit']['facing'] ?? []))))?'selected':''}}>{{$v}} 
                    </option>
                    @endforeach </select> </div>
        </div>
        <div class="col-md-6" id="facing_other_block" style="display:none">
            <div class="form-group">
                <label for="facing_other_text">Other Facing Detail
                </label>
                <input type="text" name="unit[facing_other_text]" id="facing_other_text" value="{{ old('unit.facing_other_text',($assets['unit']['facing_other_text'] ?? null))}}">
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.leakage')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="leakage">Any Leakages </label>
                <select name="unit[leakage]" id="leakage" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.yes_no_options') as $k=>$v )
                    <option value={{$k}} {{(old('unit.leakage',($assets['unit']['leakage'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif

        @if(in_array($template_id,config('template.unit.no_of_pillars_in_office')))
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="no_of_pillars_in_office">Number of pillars in the office</label>
            <input type="number" name="unit[no_of_pillars_in_office]" id="no_of_pillars_in_office"
                value="{{ old('unit.no_of_pillars_in_office',($assets['unit']['no_of_pillars_in_office'] ?? null))}}">
        </div>
    </div>
        @endif


        @if(in_array($template_id,config('template.unit.no_of_pillars_in_unit')))
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="no_of_pillars_in_unit">Number of pillars in the unit</label>
            <input type="number" name="unit[no_of_pillars_in_unit]" id="no_of_pillars_in_unit"
                value="{{ old('unit.no_of_pillars_in_unit',($assets['unit']['no_of_pillars_in_unit'] ?? null))}}">
        </div>
    </div>
        @endif
        @if(in_array($template_id,config('template.unit.painting_status')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="painting_status">Status of painting </label>
                <select name="unit[painting_status]" id="painting_status" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.good_bad_options') as $k=>$v )
                    <option value={{$k}} {{(old('unit.painting_status',($assets['unit']['painting_status'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif


        {{--  //For Template 14  --}}

        @if(in_array($template_id,config('template.unit.p&m_description')))
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="p&m_description">Description of P&M
            </label>
            <input type="text" name="unit[p&m_description]" id="p&m_description"
                value="{{ old('unit.p&m_description',($assets['unit']['p&m_description'] ?? null))}}">
        </div>
    </div>
        @endif
        @if(in_array($template_id,config('template.unit.capacity')))
        <div class="col-md-6 ">
            <div class="form-group">
            <label for="capacity">Capacity
            </label>
            <input type="text" name="unit[capacity]" id="capacity" value="{{ old('unit.capacity',($assets['unit']['capacity'] ?? null))}}">
        </div>
    </div>
        @endif

        @if(in_array($template_id,config('template.unit.currently_operational')))
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="currently_operational">Currently Operational?
                </label>
                <select name="unit[currently_operational]" id="currently_operational" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.yes_no_options') as $k=>$v )
                    <option value={{$k}} {{(old('unit.currently_operational',($assets['unit']['currently_operational'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @endif
        @if(in_array($template_id,config('template.unit.industrial_shed')))
        <div class="col-md-6">
            <div class="form-group">
            <label for="industrial_shed">Industrial Shed / Industrial Building
            </label>
            <input type="text" name="unit[industrial_shed]" id="industrial_shed"
                value="{{ old('unit.industrial_shed',($assets['unit']['industrial_shed'] ?? null))}}">
        </div>
    </div>
        @endif

@push('js')
<script type="text/javascript">
    $("#facing").change(function(){
    let options = $("#facing").select2('data');
    $.each(options, function(key,value) {
       if(value.id==="other"){
        $("#facing_other_block").css('display','block');
       }
       else{
        $("#facing_other_block").css('display','none');
       }
    });
})

</script>
@endpush