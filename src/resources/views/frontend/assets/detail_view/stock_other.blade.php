@if(isset($assets['stock_other']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Other Information</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets, 'stock_other', 'stock_description', $template_id))
	            <li>
	                <span>Stock Description</span> {{ assetdetail_value($assets, 'stock_other', 'stock_description', $template_id) }}
	            </li>
            @endif
            @if(validate_assetdetail($assets, 'stock_other', 'latest_value', $template_id))
            <li>
                <span>Latest Value</span> {{ assetdetail_value($assets, 'stock_other', 'latest_value', $template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif