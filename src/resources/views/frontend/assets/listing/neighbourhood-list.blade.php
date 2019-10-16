@if(in_array($template_id,config('list.neighbourhood.no_of_hospitals')))
<div class="col-md-6">
    <span>No. of Hospitals</span>
    <strong>{{ ($value['neighbourhood']['no_of_hospitals']) ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.neighbourhood.no_of_schools')))
<div class="col-md-6">
    <span>No. of Schools</span>
    <strong>{{ ($value['neighbourhood']['no_of_schools']) ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.neighbourhood.no_of_atms')) && isset($value['neighbourhood']['no_of_atms']))
<div class="col-md-6">
    <span>No. of ATMs</span>
    <strong>{{ ($value['neighbourhood']['no_of_atms']) ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.neighbourhood.no_of_restaurants')))
<div class="col-md-6">
    <span>No. of Restaurants</span>
    <strong>{{ ($value['neighbourhood']['no_of_restaurants']) ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.neighbourhood.metro_station_nearby')))
<div class="col-md-6">
    <span>Nearby Metro Station</span>
    <strong>{{ ($value['neighbourhood']['metro_station_nearby']) ?? null }}</strong>
</div>
@endif
@if(in_array($template_id,config('list.neighbourhood.distance_from_closest_airport')))
<div class="col-md-6">
    <span>Distance from closest airport (km)</span>
    <strong>{{ ($value['neighbourhood']['distance_from_closest_airport']) ?? null }}</strong>
</div>
@endif