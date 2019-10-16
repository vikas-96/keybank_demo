@if(isset($assets['general_mall_information']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>General Mall Information</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'general_mall_information','common_conference_rooms',$template_id))
                <li>
                    <span>Common Conference rooms</span>{{ assetdetail_value($assets,'general_mall_information','common_conference_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','mall_no_of_restaurants',$template_id))
                <li>
                    <span>Number of Restaurants / Cafeterias</span>{{ assetdetail_value($assets,'general_mall_information','mall_no_of_restaurants',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','children_playing_area',$template_id))
                <li>
                    <span>Children Playing Area?</span>{{ assetdetail_value($assets,'general_mall_information','children_playing_area',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','comment_on_security_system',$template_id))
                <li>
                    <span>Comment on Security Systems</span>{{ assetdetail_value($assets,'general_mall_information','comment_on_security_system',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','comment_on_parking_availability',$template_id))
                <li>
                    <span>Comment on Parking Availability</span>{{ assetdetail_value($assets,'general_mall_information','comment_on_parking_availability',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','other_mall_usp',$template_id))
                <li>
                    <span>Other Mall USP</span>{{ assetdetail_value($assets,'general_mall_information','other_mall_usp',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','painting_status',$template_id))
                <li>
                    <span>Status of Painting</span>{{ config('assets.painting_status.'.assetdetail_value($assets,'general_mall_information','painting_status',$template_id))}}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','basement_construction',$template_id))
                <li>
                    <span>Basement Construction</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'general_mall_information','basement_construction',$template_id))}}
                </li>
            @endif
            @if(validate_assetdetail($assets,'general_mall_information','basement_usage',$template_id))
                <li>
                    <span>Basement - Usage</span>{{ config('assets.usage.'.assetdetail_value($assets,'general_mall_information','basement_usage',$template_id))}}
                </li>
            @endif

        </ul>
    </div>
</div>
@endif