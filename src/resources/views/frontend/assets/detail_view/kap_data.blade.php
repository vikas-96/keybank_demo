@if(isset($assets['kapdata']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>KAP Data</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets, 'kapdata', 'marketability', $template_id))
                <li>
                    <span>Marketability</span> {{ config('assets.marketability.'.assetdetail_value($assets,'kapdata','marketability', $template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets, 'kapdata', 'kap_price', $template_id))
            <li>
                <span>KAP Price</span> {{ assetdetail_value($assets, 'kapdata', 'kap_price', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'kapdata', 'packaging_suggestions', $template_id))
            <li>
                <span>Packaging Suggestions</span> {{ assetdetail_value($assets, 'kapdata', 'packaging_suggestions', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'kapdata', 'other_insights', $template_id))
            <li>
                <span>KAP Insights</span> {{ assetdetail_value($assets, 'kapdata', 'other_insights', $template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif

