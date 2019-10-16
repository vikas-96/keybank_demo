<div class="col-md-24 section-heading">
    <h5>Neighbourhood Information</h5>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="zone_type">Zone type / Area Type </label>
        <select name="neighbourhood[zone_type]" id="zone_type" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.zone_type') as $k=>$v )
            <option value={{$k}}
                {{(old('neighbourhood.zone_type',($assets['neighbourhood']['zone_type'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="development_status">Development status of the area / infrastructure information</label>
        <input type="text" name="neighbourhood[development_status]" id="development_status"
            value="{{old('neighbourhood.development_status',($assets['neighbourhood']['development_status'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="locality_classification">Classification of Locality</label>
        <select name="neighbourhood[locality_classification]" id="locality_classification" class="cs-select">
            <option value=""></option>
            @foreach (config('assets.locality_classification') as $k=>$v )
            <option value={{$k}}
                {{(old('neighbourhood.locality_classification',($assets['neighbourhood']['locality_classification'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="metro_station_nearby">Metro station within 500 meters</label>
        <select name="neighbourhood[metro_station_nearby]" id="metro_station_nearby" class="cs-select">
            <option value="">Select</option>
            @foreach (config('assets.yes_no') as $k=>$v )
            <option value={{$k}}
                {{(old('neighbourhood.metro_station_nearby',($assets['neighbourhood']['metro_station_nearby'] ?? null)) == $k)?'selected':''}}>
                {{$v}}</option>
            @endforeach
        </select>
    </div>
</div>

{{-- Removed
<div class="col-md-6 ">
    <div class="form-group">
        <label for="railway_within_500_meter">Railway station within 500 meters</label>
        <select name="neighbourhood[railway_within_500_meter]" id="railway_within_500_meter" class="cs-select">
            <option value="">Select</option>
            @foreach (config('assets.yes_no') as $k=>$v )
            <option value={{$k}}
{{(old('neighbourhood.railway_within_500_meter',($assets['neighbourhood']['railway_within_500_meter'] ?? null)) == $k)?'selected':''}}>
{{$v}}</option>
@endforeach
</select>
</div>
</div> --}}
<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_schools">Number of School within 3kms</label>
        <input type="text" name="neighbourhood[no_of_schools]" id="no_of_schools"
            value="{{old('neighbourhood.no_of_schools',($assets['neighbourhood']['no_of_schools'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_hospitals">Number of hospitals within 3kms</label>
        <input type="text" name="neighbourhood[no_of_hospitals]" id="no_of_hospitals"
            value="{{old('neighbourhood.no_of_hospitals',($assets['neighbourhood']['no_of_hospitals'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_shopping_malls">Number of Shopping malls within 2kms</label>
        <input type="text" name="neighbourhood[no_of_shopping_malls]" id="no_of_shopping_malls"
            value="{{old('neighbourhood.no_of_shopping_malls',($assets['neighbourhood']['no_of_shopping_malls'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_atms">Number of Atms within 3kms</label>
        <input type="text" name="neighbourhood[no_of_atms]" id="no_of_atms"
            value="{{old('neighbourhood.no_of_atms',($assets['neighbourhood']['no_of_atms'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_restaurants"> Number of restaurants within 1 kms</label>
        <input type="text" name="neighbourhood[no_of_restaurants]" id="no_of_restaurants"
            value="{{old('neighbourhood.no_of_restaurants',($assets['neighbourhood']['no_of_restaurants'] ?? null))}}">
    </div>
</div>
<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_parks">Number of Parks within 500 meters</label>
        <input type="text" name="neighbourhood[no_of_parks]" id="no_of_parks"
            value="{{old('neighbourhood.no_of_parks',($assets['neighbourhood']['no_of_parks'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="distance_from_closest_airport"> Distance from closest airport (km)</label>
        <input type="text" name="neighbourhood[distance_from_closest_airport]" id="distance_from_closest_airport"
            value="{{old('neighbourhood.distance_from_closest_airport',($assets['neighbourhood']['distance_from_closest_airport'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="no_of_petrol_pumps"> Number of petrol pumps within 1kms</label>
        <input type="text" name="neighbourhood[no_of_petrol_pumps]" id="no_of_petrol_pumps"
            value="{{old('neighbourhood.no_of_petrol_pumps',($assets['neighbourhood']['no_of_petrol_pumps'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="facing_road_width"> Width of Facing Road(in Feets)</label>
        <input type="number" step=".01" name="neighbourhood[facing_road_width]" id="facing_road_width"
            value="{{old('neighbourhood.facing_road_width',($assets['neighbourhood']['facing_road_width'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="side_road_width"> Width of side road(in Feets)</label>
        <input type="number" step=".01" name="neighbourhood[side_road_width]" id="side_road_width"
            value="{{old('neighbourhood.side_road_width',($assets['neighbourhood']['side_road_width'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="adjoining_properties_north">Adjoining Properties (North)</label>
        <input type="text" name="neighbourhood[adjoining_properties_north]" id="adjoining_properties_north"
            value="{{old('neighbourhood.adjoining_properties_north',($assets['neighbourhood']['adjoining_properties_north'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="adjoining_properties_south"> Adjoining Properties (South)</label>
        <input type="text" name="neighbourhood[adjoining_properties_south]" id="adjoining_properties_south"
            value="{{old('neighbourhood.adjoining_properties_south',($assets['neighbourhood']['adjoining_properties_south'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="adjoining_properties_east"> Adjoining Properties (East)</label>
        <input type="text" name="neighbourhood[adjoining_properties_east]" id="adjoining_properties_east"
            value="{{old('neighbourhood.adjoining_properties_east',($assets['neighbourhood']['adjoining_properties_east'] ?? null))}}">
    </div>
</div>

<div class="col-md-6 ">
    <div class="form-group">
        <label for="adjoining_properties_west"> Adjoining Properties (West)</label>
        <input type="text" name="neighbourhood[adjoining_properties_west]" id="adjoining_properties_west"
            value="{{old('neighbourhood.adjoining_properties_west',($assets['neighbourhood']['adjoining_properties_west'] ?? null))}}">
    </div>
</div>


@push('js')
<script type="text/javascript">
</script>
@endpush