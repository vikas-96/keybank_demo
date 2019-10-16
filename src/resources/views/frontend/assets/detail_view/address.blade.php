@if(isset($assets['address']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Property Address </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'address','plot_no',$template_id))
            <li>
                <span>Plot No.</span>{{ assetdetail_value($assets,'address','plot_no',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','survey_no',$template_id))
            <li>
                <span>Survey No.</span>{{ assetdetail_value($assets,'address','survey_no',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','hissa_no',$template_id))
            <li>
                <span>Hissa No.</span>{{ assetdetail_value($assets,'address','hissa_no',$template_id)}}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','unit_number',$template_id))
            <li>
                <span>Unit Number</span>{{ assetdetail_value($assets,'address','unit_number',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','shop_showroom_name',$template_id))
            <li>
                <span>Shop / Showroom
                    Name</span>{{ assetdetail_value($assets,'address','shop_showroom_name',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','godown_name',$template_id))
            <li>
                <span>Godown Name</span>{{ assetdetail_value($assets,'address','godown_name',$template_id)}}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','building_name',$template_id))
            <li>
                <span>Building Name</span>{{ assetdetail_value($assets,'address','building_name',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','rera',$template_id))
            <li>
                <span>RERA # (If Applicable)</span>{{ assetdetail_value($assets,'address','rera',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','floor',$template_id))
            <li>
                <span>Floor</span>{{ assetdetail_value($assets,'address','floor',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','wing',$template_id))
            <li>
                <span>Wing</span>{{ assetdetail_value($assets,'address','wing',$template_id)}}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','street_name',$template_id))
            <li>
                <span>Street Name</span>{{ assetdetail_value($assets,'address','street_name',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','locality',$template_id))
            <li>
                <span>Locality</span>{{ assetdetail_value($assets,'address','locality',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','micromarket',$template_id))
            <li>
                <span>Micromarket</span>
                @if(isset($assets['micromarket']['name']))
                    {{ $assets['micromarket']['name'] }}
                @endif
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','city',$template_id) && isset($assets['city']['city']))
            <li>
                <span>City</span>{{ $assets['city']['city'] }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','district',$template_id))
            <li>
                <span>District</span>{{ assetdetail_value($assets,'address','district',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','ward',$template_id))
            <li>
                <span>Ward</span>{{ assetdetail_value($assets,'address','ward',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','village',$template_id))
            <li>
                <span>Village</span>{{ assetdetail_value($assets,'address','village',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','taluka',$template_id))
            <li>
                <span>Taluka</span>{{ assetdetail_value($assets,'address','taluka',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','other',$template_id))
            <li>
                <span>Other</span>{{ assetdetail_value($assets,'address','other',$template_id) ?? null }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','state',$template_id) && isset($assets['state']['state']) )
            <li>
                <span>State</span>{{ $assets['state']['state'] }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','pincode',$template_id))
            <li>
                <span>Pincode</span>{{ assetdetail_value($assets,'address','pincode',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','ward',$template_id))
            <li>
                <span>Ward</span>{{ assetdetail_value($assets,'address','ward',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','address_of_property',$template_id))
            <li>
                <span>Address of
                    Property</span>{{ assetdetail_value($assets,'address','address_of_property',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','landmark',$template_id))
            <li>
                <span>Landmark</span>{{ assetdetail_value($assets,'address','landmark',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','latitude',$template_id))
            <li>
                <span>Latitude</span>{{ assetdetail_value($assets,'address','latitude',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'address','longitude',$template_id))
            <li>
                <span>Longitude</span>{{ assetdetail_value($assets,'address','longitude',$template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif