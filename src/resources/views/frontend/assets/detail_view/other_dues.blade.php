@if(isset($assets['other_dues']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Other Dues</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets, 'other_dues', 'society_dues', $template_id))
	            <li>
	                <span>Society Dues</span> {{ assetdetail_value($assets, 'other_dues', 'society_dues', $template_id) }}
	            </li>
            @endif
            @if(validate_assetdetail($assets, 'other_dues', 'electricity_dues', $template_id))
            <li>
                <span>Electricity Dues</span> {{ assetdetail_value($assets, 'other_dues', 'electricity_dues', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'other_dues', 'water_dues', $template_id))
            <li>
                <span>Water Dues</span> {{ assetdetail_value($assets, 'other_dues', 'water_dues', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'other_dues', 'property_tax_dues', $template_id))
            <li>
                <span>Propery Tax Dues</span> {{ assetdetail_value($assets, 'other_dues', 'property_tax_dues', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'other_dues', 'other_dues_nature', $template_id))
            <li>
                <span>Other Dues - Nature</span> {{ assetdetail_value($assets, 'other_dues', 'other_dues_nature', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'other_dues', 'other_dues_amount', $template_id))
            <li>
                <span>Other Dues Amount</span> {{ assetdetail_value($assets, 'other_dues', 'other_dues_amount', $template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif
