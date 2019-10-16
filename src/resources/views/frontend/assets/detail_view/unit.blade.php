@if(isset($assets['unit']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Unit Details </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'unit','furnishing_status', $template_id))
                <li>
                    <span>Furnishing Status</span> {{ config('assets.furnishing_status.'.assetdetail_value($assets,'unit','furnishing_status', $template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','furnishing_details',$template_id))
                <li>
                    <span>Furnishing Details</span>
                    <strong>{{ assetdetail_value($assets,'unit','furnishing_details',$template_id) }}</strong>
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','flooring_type',$template_id))
                <li>
                    <span>Type of Flooring</span> {{ config('assets.flooring_type.'.assetdetail_value($assets,'unit','flooring_type',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','fire_safety_compliant',$template_id))
                <li>
                    <span>Fire Safety Compliant</span> {{ config('assets.yes_no_options.'.assetdetail_value($assets,'unit','fire_safety_compliant',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','unit_usp',$template_id))
                <li>
                    <span>Unit USP</span>{{assetdetail_value($assets,'unit','unit_usp',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','apartment_facing',$template_id))
                <li>
                    <span>Apartment Facing</span> {{ config('assets.directions.'.assetdetail_value($assets,'unit','apartment_facing',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','facing',$template_id) && isset($assets['unit']['facing']))
                <li>
                    <span>Facing</span>
                    @php $facing_value = ''; @endphp
                    @foreach($assets['unit']['facing'] as $facing)
                        @php
                            $facing_value .= config('assets.facing.'.$facing).', ';
                        @endphp
                    @endforeach
                    {{trim($facing_value,', ')}}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','leakage',$template_id))
                <li>
                    <span>Any Leakages</span>{{ config('assets.leakage.'.assetdetail_value($assets,'unit','leakage',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','no_of_pillars_in_office',$template_id))
                <li>
                    <span>Number of Pillars in the Office</span>{{ assetdetail_value($assets,'unit','no_of_pillars_in_office',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','painting_status',$template_id))
                <li>
                    <span>Status of Painting</span>{{ config('assets.painting_status.'.assetdetail_value($assets,'unit','painting_status',$template_id))}}
                </li>
            @endif

            @if(validate_assetdetail($assets,'unit','business_nature',$template_id))
                <li>
                    <span>Nature of Business</span>{{ assetdetail_value($assets,'unit','business_nature',$template_id) }}
                </li>
            @endif


            @if(validate_assetdetail($assets,'unit','office_usp',$template_id))
                <li>
                    <span>Office USP</span>{{assetdetail_value($assets,'unit','office_usp',$template_id)}}
                </li>
            @endif

            @if(validate_assetdetail($assets,'unit','office_facing',$template_id))
                <li>
                    <span>Office Facing</span>{{ config('assets.office_facing.'.assetdetail_value($assets,'unit','office_facing',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','unit_facing',$template_id))
                <li>
                    <span>Unit Facing</span>{{ config('assets.unit_facing.'.assetdetail_value($assets,'unit','unit_facing',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','no_of_pillars_in_unit',$template_id))
                <li>
                    <span>Number of Pillars in the Unit</span>{{ assetdetail_value($assets,'unit','no_of_pillars_in_unit',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','p&m_description',$template_id))
                <li>
                    <span>Description of P&M</span>{{assetdetail_value($assets,'unit','p&m_description',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','capacity',$template_id))
                <li>
                    <span>Capacity</span>{{assetdetail_value($assets,'unit','capacity',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','currently_operational',$template_id))
                <li>
                    <span>Currently Operational?</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'unit','currently_operational',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'unit','industrial_shed',$template_id))
                <li>
                    <span>Industrial Shed / Industrial Building</span>{{ assetdetail_value($assets,'unit','industrial_shed',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif
