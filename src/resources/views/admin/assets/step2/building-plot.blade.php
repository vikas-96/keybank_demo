    <div class="col-md-24 section-heading">
        <h5>Plot / Building Information</h5>
    </div>
        
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="allowed_construction_floors">Floors allowed for Construction</label>
                <input type="text" name="allowed_construction_floors" id="allowed_construction_floors"
                    value={{ old('allowed_construction_floors')}}>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                <label for="no_of_floors_in_building">No. of floors in the building</label>
                <input type="text" name="no_of_floors_in_building" id="no_of_floors_in_building"
                    value={{ old('no_of_floors_in_building')}}>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="lift_in_building">Lift in the building</label>
                    <select name="lift_in_building" class="cs-select" id="lift_in_building">
                        <option value=""></option>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="building_amenities">Building Amenities</label>
                    <select name="building_amenities" class="cs-select-multi" id="building_amenities">
                        @foreach (config('assets.building_amenities') as $k=>$v )
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="building_completion_year">Year of completion of the building </label>
                    <input type="text" name="building_completion_year" id="building_completion_year">
                </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="residual_life_of_building">Residual Life of Building (Yrs)</label>
                    <input type="number" step=".01" name="residual_life_of_building" id="residual_life_of_building">
                </div>
            </div>
            
            <div class="col-md-6 ">
                <div class="form-group">
                    <label for="building_condition">Building Condition</label>
                    <select name="building_condition" class="cs-select-multi" id="building_condition">
                        @foreach (config('assets.building_condition') as $k=>$v )
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="corner_plot">Corner Plot</label>
                    <select name="corner_plot" class="cs-select" id="corner_plot">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value=""></option>
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="boundary_wall">Boundary Wall / Fencing </label>
                    <select name="boundary_wall" class="cs-select" id="boundary_wall">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value=""></option>
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="boundary_wall_type">Boundary Wall Type </label>
                    <select name="boundary_wall_type" class="cs-select" id="boundary_wall_type">
                        @foreach (config('assets.boundary_wall_type') as $k=>$v )
                        <option value=""></option>
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="agriculture_land">Agriculture Land </label>
                    <select name="agriculture_land" class="cs-select" id="agriculture_land">
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value=""></option>
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <div class="col-md-6 ">
                    <div class="form-group">
                    <label for="ownership_type">Ownership Type</label>
                    <select name="ownership_type" class="cs-select" id="ownership_type">
                        @foreach (config('assets.ownership_type') as $k=>$v )
                        <option value=""></option>
                        <option value={{$k}}>{{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </div>





@push('js')
<script type="text/javascript">

</script>
@endpush