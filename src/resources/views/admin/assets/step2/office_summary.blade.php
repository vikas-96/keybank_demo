    <div class="col-md-24 section-heading">
        @if($template_id == 'T6')
        <h5>Summary of Offices, Cinemas, Other Entertainment Areas</h5>
        @elseif($template_id == 'T7')
        <h5>Summary of Offices and Shops</h5>
        @else
        <h5>Summary of Flats and Shops</h5>
        @endif
    </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="office_unit_total_no">Total Number of units</label>
                <input type="number" name="office_summary[unit_total_no]" id="office_unit_total_no"
                    value="{{ old('office_summary.unit_total_no',($assets['office_summary']['unit_total_no'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="office_area_type" class="required">Type of Area</label>
                <select name="office_summary[area_type]" required="true" class="cs-select" id="office_area_type">
                    <option value=""></option>
                    @foreach (config('assets.area_type') as $k=>$v )
                    <option value={{$k}} {{(old('office_summary.area_type',($assets['office_summary']['area_type'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="office_total_area" class="required">Total Area</label>
                <input type="number" step=".01" name="office_summary[total_area]" required="true" id="office_total_area"
                    value="{{ old('office_summary.total_area',($assets['office_summary']['total_area'] ?? null))}}">
            </div>
        </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="office_unit" class="required">Unit</label>
                <input type="number" name="office_summary[unit]" id="office_unit" required="true" 
                    value="{{ old('office_summary.unit',($assets['office_summary']['unit'] ?? null))}}">
            </div>
        </div>