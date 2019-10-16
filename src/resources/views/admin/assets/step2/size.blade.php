<div class="col-md-24 section-heading">
    <h5>Size / Area</h5>
</div>
@if(in_array($template_id,config('template.size.plot_section')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_length">Length of Plot</label>
        <input type="text" name="size[plot_length]" id="plot_length"
            value="{{old('size.plot_length',($assets['size']['plot_length'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_length_unit">Unit of Length</label>
        <select name="size[plot_length_unit]" class="cs-select" id="plot_length_unit">
            <option value=""></option>
            @foreach (config('assets.unit_length') as $k=>$v )
            <option value={{$k}}
                {{(old('size.plot_length_unit',($assets['size']['plot_length_unit'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_breadth">Breadth of Plot
        </label>
        <input type="text" name="size[plot_breadth]" id="plot_breadth"
            value="{{old('size.plot_breadth',($assets['size']['plot_breadth'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="plot_breadth_unit">Unit of Breadth</label>
        <select name="size[plot_breadth_unit]" class="cs-select" id="plot_breadth_unit">
            <option value=""></option>
            @foreach (config('assets.unit_length') as $k=>$v )
            <option value={{$k}}
                {{(old('size.plot_breadth_unit',($assets['size']['plot_breadth_unit'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id, config('template.size.common_section')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="area_type" class="required">Type of Area</label>
        <select name="size[area_type]" class="cs-select" id="area_type">
            <option value=""></option>
            @foreach (config('assets.area_type') as $k=>$v )
            <option value={{$k}} {{(old('size.area_type',($assets['size']['area_type'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="area" class="required">Area</label>
        <input type="number" step=".01" required="true" name="size[area]" id="area"
            value="{{old('size.area',($assets['size']['area'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="unit" class="required">Unit</label>
        <select name="size[unit]" class="cs-select" id="unit">
            <option value=""></option>
            @foreach (config('assets.unit') as $k=>$v )
            <option value={{$k}} {{(old('size.unit',($assets['size']['unit'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif

@if(in_array($template_id,config('template.size.loft_section')))


<div class="col-md-6 ">
    <div class="form-group">
        <label for="loft_area">Mezzanine / Loft Area</label>
        <input type="number" step=".01" name="size[loft_area]" id="loft_area"
            value="{{old('size.loft_area',($assets['size']['loft_area'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="loft_height">Height of Mezzanine / Loft</label>
        <select name="size[loft_height]" class="cs-select" id="loft_height">
            <option value=""></option>
            @foreach (config('assets.height') as $k=>$v )
            <option value={{$k}}
                {{(old('size.loft_height',($assets['size']['loft_height'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>


<div class="col-md-6 ">
    <div class="form-group">
        <label for="loft_area_type">Type of Area</label>
        <select name="size[loft_area_type]" class="cs-select" id="loft_area_type">
            <option value=""></option>
            @foreach (config('assets.area_type') as $k=>$v )
            <option value={{$k}}
                {{(old('size.loft_area_type',($assets['size']['loft_area_type'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="loft_unit" class="">Unit</label>
        <select name="size[loft_unit]" class="cs-select" id="loft_unit">
            <option value=""></option>
            @foreach (config('assets.unit') as $k=>$v )
            <option value={{$k}} {{(old('size.loft_unit',($assets['size']['loft_unit'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

@endif


@if(in_array($template_id,config('template.size.balcony_section')))


<div class="col-md-6 ">
    <div class="form-group">
        <label for="terrace_area">Total Terrace / Balcony area</label>
        <input type="number" step=".01" name="size[terrace_area]" id="terrace_area"
            value="{{old('size.terrace_area',($assets['size']['terrace_area'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="terrace_unit">Unit</label>
        <select name="size[terrace_unit]" class="cs-select" id="terrace_unit">
            <option value=""></option>
            @foreach (config('assets.unit') as $k=>$v )
            <option value={{$k}}
                {{(old('size.terrace_unit',($assets['size']['terrace_unit'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif
@if(in_array($template_id,config('template.size.basement_section')))

<div class="col-md-6 ">
    <div class="form-group">
        <label for="basement_construction">Basement Construction</label>
        <select name="size[basement_construction]" class="cs-select" id="basement_construction">
            <option value=""></option>
            @foreach (config('assets.yes_no_options') as $k=>$v )
            <option value={{$k}}
                {{(old('size.basement_construction',($assets['size']['basement_construction'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="basement_construction_area">Basement Construction Area</label>
        <input type="number" step=".01" name="size[basement_construction_area]" id="basement_construction_area"
            value="{{old('size.basement_construction_area',($assets['size']['basement_construction_area'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="basement_area_type">Type of Area</label>
        <select name="size[basement_area_type]" class="cs-select" id="basement_area_type">
            <option value=""></option>
            @foreach (config('assets.area_type') as $k=>$v )
            <option value={{$k}}
                {{(old('size.basement_area_type',($assets['size']['basement_area_type'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="basement_unit">Unit</label>
        <select name="size[basement_unit]" class="cs-select" id="basement_unit">
            <option value=""></option>
            @foreach (config('assets.unit') as $k=>$v )
            <option value={{$k}}
                {{(old('size.basement_unit',($assets['size']['basement_unit'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="basement_usage">Basement - Usage</label>
        <select name="size[basement_usage]" class="cs-select" id="basement_usage">
            <option value=""></option>
            @foreach (config('assets.usage') as $k=>$v )
            <option value={{$k}}
                {{(old('size.basement_usage',($assets['size']['basement_usage'] ?? null)) == $k)?'selected':''}}>{{$v}}
            </option>
            @endforeach
        </select>
    </div>
</div>
@endif