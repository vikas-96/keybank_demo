@if(isset($assets['neighbourhood']))
<div class="col-lg-24" id="displaymap">
    <div class="card-detail">
        <h4>Neighbourhood Information </h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="property-detail">
                    @if(validate_assetdetail($assets, 'neighbourhood', 'zone_type', $template_id))
                    <li>
                        <span>Zone type / Area Type</span>
                        {{ config('assets.zone_type.'.assetdetail_value($assets,'neighbourhood','zone_type', $template_id)) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'development_status', $template_id))
                    <li>
                        <span>Development Status of the Area / infrastructure information</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'development_status', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'no_of_hospitals', $template_id))
                    <li>
                        <span>Number of Hospitals within 3kms</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'no_of_hospitals', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'no_of_atms', $template_id))
                    <li>
                        <span>Number of Atms within 3kms</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'no_of_atms', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'no_of_restaurants', $template_id))
                    <li>
                        <span>Number of Restaurants within 1 kms</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'no_of_restaurants', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'distance_from_closest_airport', $template_id))
                    <li>
                        <span>Distance from closest airport (km)</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'distance_from_closest_airport', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'no_of_petrol_pumps', $template_id))
                    <li>
                        <span>Number of Petrol pumps within 1kms</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'no_of_petrol_pumps', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'metro_station_nearby', $template_id))
                    <li>
                        <span>Metro Station within 500 meters</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'metro_station_nearby', $template_id) }}
                    </li>
                    @endif

                    @if(validate_assetdetail($assets, 'neighbourhood', 'adjoining_properties_north', $template_id))
                    <li>
                        <span>Adjoining Properties (North)</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'adjoining_properties_north', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'adjoining_properties_south', $template_id))
                    <li>
                        <span>Adjoining Properties (South)</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'adjoining_properties_south', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'adjoining_properties_east', $template_id))
                    <li>
                        <span>Adjoining Properties (East)</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'adjoining_properties_east', $template_id) }}
                    </li>
                    @endif
                    @if(validate_assetdetail($assets, 'neighbourhood', 'adjoining_properties_west', $template_id))
                    <li>
                        <span>Adjoining Properties (West)</span>
                        {{ assetdetail_value($assets, 'neighbourhood', 'adjoining_properties_west', $template_id) }}
                    </li>
                    @endif
                </ul>
            </div>
            @if(isset($value['address']['latitude']) && isset($value['address']['longitude']))
            <div class="col-lg-12">
                <div class="map">
                    <iframe async style="width:100%;height:50%;" frameborder="0" id="cusmap" scrolling="no"
                        marginheight="0" marginwidth="0"
                        src="https://maps.google.it/maps?q={{$value['address']['latitude']}},{{$value['address']['longitude']}}&output=embed"></iframe>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endif