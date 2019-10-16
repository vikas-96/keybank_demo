@if(isset($assets['configuration']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Configuration </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'configuration','configuration',$template_id))
                <li>
                    <span>Configuration</span>{{ config('assets.template1_config.'.assetdetail_value($assets,'configuration','configuration',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_servant_rooms',$template_id))
                <li>
                    <span>Number of Servant Rooms</span>{{ assetdetail_value($assets,'configuration','no_of_servant_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_servant_toilets',$template_id))
                <li>
                    <span>Number of Servant Toilets</span>{{ assetdetail_value($assets,'configuration','no_of_servant_toilets',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_toilets',$template_id))
                <li>
                    <span>Number of Baths / Toilets</span>{{ assetdetail_value($assets,'configuration','no_of_toilets',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','self_contained',$template_id))
                <li>
                    <span>Self Contained</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'configuration','self_contained',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_cabins',$template_id))
                <li>
                    <span>Number of Cabins</span>{{ assetdetail_value($assets,'configuration','no_of_cabins',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_conference_rooms',$template_id))
                <li>
                    <span>Number of Conference Rooms</span>{{ assetdetail_value($assets,'configuration','no_of_conference_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_seats',$template_id))
                <li>
                    <span>Number of Seats</span>{{ assetdetail_value($assets,'configuration','no_of_seats',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','pantry',$template_id))
                <li>
                    <span>Pantry</span>{{ assetdetail_value($assets,'configuration','pantry',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','other_rooms',$template_id))
                <li>
                    <span>Other Rooms / Cabins</span>{{ assetdetail_value($assets,'configuration','other_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_rooms',$template_id))
                <li>
                    <span>Number of Rooms</span>{{ assetdetail_value($assets,'configuration','no_of_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_terraces',$template_id))
                <li>
                    <span>Number of Balconies / Terraces</span>{{ assetdetail_value($assets,'configuration','no_of_terraces',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'configuration','no_of_floor_in_unit',$template_id))
                <li>
                    <span>Number of Floors in the Unit</span>{{ assetdetail_value($assets,'configuration','no_of_floor_in_unit',$template_id) }}
                </li>
            @endif
            
        </ul>
    </div>
</div>
@endif
