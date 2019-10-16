<div class="col-md-24 section-heading">
    <h5>Plot Details</h5>
</div>
@if(in_array($template_id,config('template.plot.approved_land_use')))
<div class="form-group ">
    <div class="col-md-6">
        <label for="approved_land_use">Approved Land Use</label>
        <select name="plot[approved_land_use]" class="cs-select" id="approved_land_use">
            <option value="">Select</option>
            @foreach (config('assets.approved_land_use') as $k=>$v )
            <option value={{$k}}
                {{(old('plot.approved_land_use',($assets['plot']['approved_land_use'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.plot_usp')))
<div class="col-md-6">
    <div class="form-group">
        <label for="plot_usp">Plot USP</label>
        <input type="text" name="plot[plot_usp]" id="plot_usp"
            value={{ old('plot.plot_usp',($assets['plot']['plot_usp'] ?? null))}}>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.any_dumping_on_plot')))
<div class="col-md-6">
    <div class="form-group">
        <label for="any_dumping_on_plot">Any Dumping on the Plot</label>
        <input type="text" name="plot[any_dumping_on_plot]" id="any_dumping_on_plot"
            value={{ old('plot.any_dumping_on_plot',($assets['plot']['any_dumping_on_plot'] ?? null))}}>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.corner_plot')))
<div class="col-md-6 ">
    <div class="form-group">
        <label for="corner_plot">Corner Plot</label>
        <select name="plot[corner_plot]" class="cs-select" id="corner_plot">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.corner_plot',($assets['plot']['corner_plot'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.boundary_wall')))


<div class="col-md-6 ">
    <div class="form-group">
        <label for="boundary_wall">Boundary Wall / Fencing </label>
        <select name="plot[boundary_wall]" class="cs-select" id="boundary_wall">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.boundary_wall',($assets['plot']['boundary_wall'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.boundary_wall_type')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="boundary_wall_type">Boundary Wall Type </label>
        <select name="plot[boundary_wall_type]" class="cs-select" id="boundary_wall_type">
            @foreach (config('assets.boundary_wall_type') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.boundary_wall_type',($assets['plot']['boundary_wall_type'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.agriculture_land')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="agriculture_land">Agriculture Land </label>
        <select name="plot[agriculture_land]" class="cs-select" id="agriculture_land">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.agriculture_land',($assets['plot']['agriculture_land'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.ownership_type')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="ownership_type">Ownership Type</label>
        <select name="plot[ownership_type]" class="cs-select" id="ownership_type">
            @foreach (config('assets.ownership_type') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.ownership_type',($assets['plot']['ownership_type'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.plot_amenities')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_amenities">Plot Amenities</label>
        <select name="plot[plot_amenities][]" class="cs-select-multi" id="plot_amenities" multiple='true'>
            @foreach (config('assets.plot_amenities') as $k=>$v )
            <option value={{$k}}
                {{in_array($k,old('plot.plot_amenities',($assets['plot']['plot_amenities'] ?? [])))?'selected':''}}>
                {{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.allowed_construction_floors')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="allowed_construction_floors">Floors allowed for Construction</label>
        <input type="text" name="plot[allowed_construction_floors]" id="allowed_construction_floors"
            value={{ old('plot.allowed_construction_floors',($assets['plot']['allowed_construction_floors'] ?? null))}}>
    </div>
</div>
@endif

@if(in_array($template_id,config('template.plot.matching_of_boundaries')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="matching_of_boundaries">Matching of Boundaries</label>
        <select name="plot[matching_of_boundaries]" class="cs-select" id="matching_of_boundaries">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.matching_of_boundaries',($assets['plot']['matching_of_boundaries'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.independent_access')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="independent_access">Independent access to the Property</label>
        <select name="plot[independent_access]" class="cs-select" id="independent_access">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.independent_access',($assets['plot']['independent_access'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.other_construction')))
<div class="col-md-6 ">
    <div class="form-group">
        <label for="other_construction">Plot Demarcated</label>
        <input type="text" name="plot[other_construction]" id="other_construction"
            value={{ old('plot.other_construction',($assets['plot']['other_construction'] ?? null))}}>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.plot_demarcated')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_demarcated">Plot Demarcated</label>
        <select name="plot[plot_demarcated]" class="cs-select" id="plot_demarcated">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.plot_demarcated',($assets['plot']['plot_demarcated'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif

@if(in_array($template_id,config('template.plot.land_type')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="land_type">Type of Land</label>
        <select name="plot[land_type]" class="cs-select" id="land_type" multiple="true">
            @foreach (config('assets.land_type') as $k=>$v )
            <option value=""></option>
            <option value={{$k}} {{(old('plot.land_type',($assets['plot']['land_type'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.plot_overlooking')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_overlooking">Plot Overloking</label>
        <select name="plot[plot_overlooking][]" class="cs-select-multi" id="plot_overlooking" multiple='true'>
            @foreach (config('assets.facing') as $k=>$v )
            <option value={{$k}}
                {{in_array($k,old('plot.plot_overlooking',($assets['plot']['plot_overlooking'] ?? [])))?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-md-6" id="plot_overlooking_other_section" style="display:none">
    <div class=" form-group">
        <label for="plot_overlooking_other">Other Overlooking Detail
        </label>
        <input type="text" name="plot[plot_overlooking_other]" id="plot_overlooking_other"
            value="{{old('plot.plot_overlooking_other',($assets['plot']['plot_overlooking_other'] ?? null))}}">
    </div>
</div>
@endif

@if(in_array($template_id,config('template.plot.gated_plot')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="gated_plot">Gated Plot</label>
        <select name="plot[gated_plot]" class="cs-select" id="gated_plot">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.gated_plot',($assets['plot']['gated_plot'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.plot_facing')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_facing">Plot Facing</label>
        <select name="plot[plot_facing]" class="cs-select" id="plot_facing">
            @foreach (config('assets.directions') as $k=>$v )
            <option value=""></option>
            <option value={{$k}}
                {{(old('plot.plot_facing',($assets['plot']['plot_facing'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif

@if(in_array($template_id,config('template.plot.tube_well')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="tube_well">Tube Well in Premises
        </label>
        <select name="plot[tube_well]" class="cs-select" id="tube_well">
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value=""></option>
            <option value={{$k}} {{(old('plot.tube_well',($assets['plot']['tube_well'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.unauthorized_construction_comment')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="unauthorized_construction_comment">Comment on unauthorized construction
        </label>
        <input type="text" name="plot[unauthorized_construction_comment]" id="unauthorized_construction_comment"
            value="{{old('plot.unauthorized_construction_comment',($assets['plot']['unauthorized_construction_comment'] ?? null))}}">
    </div>
</div>
@endif
@if(in_array($template_id,config('template.plot.any_construction_on_plot')))
<div class="col-md-6">
    <div class="form-group">
        <label for="any_construction_on_plot">Any Dumping on the Plot</label>
        <input type="text" name="plot[any_construction_on_plot]" id="any_construction_on_plot"
            value={{ old('plot.any_construction_on_plot',($assets['plot']['any_construction_on_plot'] ?? null))}}>
    </div>
</div>
@endif

@php
$plot_composition = (old('plot.plot_composition', ($assets['plot']['plot_composition'] ?? null)) !== null) &&
(!empty(old('plot.plot_composition', ($assets['plot']['plot_composition'] ?? null)))) ?
count(old('plot.plot_composition', ($assets['plot']['plot_composition'] ?? null))) : 1;
@endphp

@if(in_array($template_id,config('template.plot.plot_composition')))
<div class="form-group">
    <label>Plot Composition</label>
    <table class="table" id="plot_composition">
        <tr>
            <th>Survey No.</th>
            <th>Area</th>
            <th>Unit</th>
            <th></th>
        </tr>
        <tbody id="plot_composition_table">
            @for($k = 0; $k < $plot_composition; $k++) <tr id="plot_composition_section_{{$k}}">
                <td><input type="text" id="survey_no_{{$k}}" name="plot[plot_composition][{{$k}}][survey_no]"
                        class="form-control"
                        value="{{ old('plot.plot_composition.'.$k.'.survey_no',($assets['plot']['plot_composition'][$k]['survey_no'] ?? null)) }}" />
                </td>
                <td><input type="text" id="area_{{$k}}" name="plot[plot_composition][{{$k}}][area]" class="form-control"
                        value="{{ old('plot.plot_composition.'.$k.'.area',($assets['plot']['plot_composition'][$k]['area'] ?? null)) }}" />
                </td>
                <td><input type="text" id="unit_{{$k}}" name="plot[plot_composition][{{$k}}][unit]" class="form-control"
                        value="{{ old('plot.plot_composition.'.$k.'.unit',($assets['plot']['plot_composition'][$k]['unit'] ?? null)) }}" />
                </td>
                @if($k == 0)
                <td><button type="button" id="add_plot_composition" class="btn btn-success">Add More</button></td>
                @else
                <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                @endif
                </tr>
                @endfor
        </tbody>
    </table>
</div>
@endif


@push('js')
<script type="text/javascript">
    $("#plot_overlooking").change(function(){
        let options = $("#plot_overlooking").select2('data');
        $.each(options, function(key,value) {
        if(value.id==="other"){
            $("#plot_overlooking_other_section").css('display','block');
        }
        else{
            $("#plot_overlooking_other_section").css('display','none');
            $("#plot_overlooking_other").val(null);
        }
        });
    });

    var i = {{ $plot_composition }};

    $("#add_plot_composition").click(function() {
            let appnd =
                '<tr><td><input type="text" id="survey_no_'+i+'" name="plot[plot_composition]['+i+'][survey_no]" class="form-control"' +
                '</td><td><input type="text" id="area_'+i+'" name="plot[plot_composition]['+i+'][area]" class="form-control"' +
                '</td><td><input type="text" id="unit_'+i+'" name="plot[plot_composition]['+i+'][unit]" class="form-control"' +
                '</td><td><button type="button" class="btn btn-danger remove-tr">Remove</button>'+
                '</td></tr>';

            $("#plot_composition_table").append(appnd);

            i++;
        });

</script>
@endpush