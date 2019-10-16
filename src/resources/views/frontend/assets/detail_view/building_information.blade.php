@if(isset($assets['building']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Building Information </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'building','fsi_permitted',$template_id))
                <li>
                    <span>FSI Permitted</span>{{ assetdetail_value($assets,'building','fsi_permitted',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','fsi_consumed',$template_id))
                <li>
                    <span>FSI Consumed</span>{{ assetdetail_value($assets,'building','fsi_consumed',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','lift_in_building',$template_id))
                <li>
                    <span>Lift in the Building</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','lift_in_building',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','building_amenities',$template_id) && isset($assets['building']['building_amenities']))
                <li>
                    <span>Building Amenities</span>
                    @php $building_amenities_value = ''; @endphp
                    @foreach($assets['building']['building_amenities'] as $building_amenities)
                        @php
                            $building_amenities_value .= config('assets.building_amenities.'.$building_amenities).', ';
                        @endphp
                    @endforeach
                    {{trim($building_amenities_value,', ')}}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','business_nature',$template_id))
                <li>
                    <span>Nature of Business</span>{{assetdetail_value($assets,'building','business_nature',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','any_leakages',$template_id))
                <li>
                    <span>Any Leakages</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','any_leakages',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','building_completion_year',$template_id))
                <li>
                    <span>Year of Completion of the Building</span>{{ assetdetail_value($assets,'building','building_completion_year',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','residual_life_of_building',$template_id))
                <li>
                    <span>Residual Life of Building (Yrs)</span>{{ assetdetail_value($assets,'building','residual_life_of_building',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','shed_condition',$template_id))
                <li>
                    <span>Shed Condition</span>{{ config('assets.shed_condition.'.assetdetail_value($assets,'building','shed_condition',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','building_condition',$template_id))
                <li>
                    <span>Building Condition</span>{{ config('assets.building_condition.'.assetdetail_value($assets,'building','building_condition',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','construction_type',$template_id))
                <li>
                    <span>Type of Construction</span>{{assetdetail_value($assets,'building','construction_type',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','business_nature',$template_id))
                <li>
                    <span>Flooring</span>{{assetdetail_value($assets,'building','business_nature',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','wiring',$template_id))
                <li>
                    <span>Wiring</span>{{assetdetail_value($assets,'building','wiring',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','plumbing',$template_id))
                <li>
                    <span>Plumbing</span>{{assetdetail_value($assets,'building','plumbing',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','infrastructure_availability',$template_id))
                <li>
                    <span>Infrastructure Availability</span>{{ config('assets.infrastructure_availability.'.assetdetail_value($assets,'building','infrastructure_availability',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','shed_empty_or_equipped',$template_id))
                <li>
                    <span>Shed Empty or Equipped with P&M</span>{{assetdetail_value($assets,'building','shed_empty_or_equipped',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','p&m',$template_id))
                <li>
                    <span>P&M</span>{{assetdetail_value($assets,'building','p&m',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','other_construction',$template_id))
                <li>
                    <span>Other Construction?</span>{{assetdetail_value($assets,'building','other_construction',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','other_building_usp',$template_id))
                <li>
                    <span>Other Building USP</span>{{assetdetail_value($assets,'building','other_building_usp',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','construction_stage',$template_id))
                <li>
                    <span>Stage of Construction</span>{{ assetdetail_value($assets,'building','construction_stage',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','painting_status',$template_id))
                <li>
                    <span>Status of Painting</span>{{ config('assets.painting_status.'.assetdetail_value($assets,'building','painting_status',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','demolition_proceedings',$template_id))
                <li>
                    <span>Demolition Proceedings if any</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','demolition_proceedings',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','basement_contruction',$template_id))
                <li>
                    <span>Basement Construction</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','basement_contruction',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','basement_construction_area',$template_id))
                <li>
                    <span>Basement Construction Area</span>{{assetdetail_value($assets,'building','basement_construction_area',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','basement_unit',$template_id))
                <li>
                    <span>Unit</span>{{ config('assets.unit.'.assetdetail_value($assets,'building','basement_unit',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','basement_usage',$template_id))
                <li>
                    <span>Basement - Usage</span>{{ config('assets.usage.'.assetdetail_value($assets,'building','basement_usage',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','material_technology_used',$template_id))
                <li>
                    <span>Material and Technology used</span>{{assetdetail_value($assets,'building','material_technology_used',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','structural_safety',$template_id))
                <li>
                    <span>Structural Safety</span>{{assetdetail_value($assets,'building','structural_safety',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','earthquake_resitance_design',$template_id))
                <li>
                    <span>Earthquake Resitance Design</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','earthquake_resitance_design',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','visible_damage_in_building',$template_id))
                <li>
                    <span>Visible Damage in the Building</span>{{assetdetail_value($assets,'building','visible_damage_in_building',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','central_air_conditioning_system',$template_id))
                <li>
                    <span>Central Air Conditioning System</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','central_air_conditioning_system',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','firefighting_provision',$template_id))
                <li>
                    <span>Provision of Firefighting</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'building','firefighting_provision',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','architectural_description',$template_id))
                <li>
                    <span>Architectural Description</span>{{assetdetail_value($assets,'building','architectural_description',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','no_of_floors_in_building',$template_id))
                <li>
                    <span>Number of Floors in the Building</span>{{ assetdetail_value($assets,'building','no_of_floors_in_building',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','common_conference_rooms',$template_id))
                <li>
                    <span>Common Conference Rooms</span>{{assetdetail_value($assets,'building','common_conference_rooms',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','no_of_restaurants',$template_id))
                <li>
                    <span>Number of Restaurants / Cafeterias</span>{{assetdetail_value($assets,'building','no_of_restaurants',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','comment_on_security_system',$template_id))
                <li>
                    <span>Comment on Security Systems</span>{{assetdetail_value($assets,'building','comment_on_security_system',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'building','comment_on_parking_availability',$template_id))
                <li>
                    <span>Comment on Parking Availability</span>{{assetdetail_value($assets,'building','comment_on_parking_availability',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif
