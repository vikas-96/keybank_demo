@if(isset($assets['other']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Other Information</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets,'other','other_property_details',$template_id))
                <li>
                    <span>Other Property Details</span>{{ assetdetail_value($assets,'other','other_property_details',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif