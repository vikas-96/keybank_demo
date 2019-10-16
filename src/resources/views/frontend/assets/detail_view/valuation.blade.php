@if(isset($assets['valuation']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Valuation</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets, 'valuation', 'latest_valuation_report_date_1', $template_id))
            <li>
                <span>Date of Latest Valuation Report - 1</span>
                {{ assetdetail_value($assets, 'valuation', 'latest_valuation_report_date_1', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'latest_valuation_report_date_2', $template_id))
            <li>
                <span>Date of Latest Valuation Report - 2</span>
                {{ assetdetail_value($assets, 'valuation', 'latest_valuation_report_date_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'fair_market_value_1', $template_id))
            <li>
                <span>Fair Market Value Latest - 1</span>
                {{ assetdetail_value($assets, 'valuation', 'fair_market_value_1', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'fair_market_value_2', $template_id))
            <li>
                <span>Fair Market Value Latest - 2</span>
                {{ assetdetail_value($assets, 'valuation', 'fair_market_value_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'realizable_value_sanction_date', $template_id))
            <li>
                <span>Realizable Value - Sanction Date</span>
                {{ assetdetail_value($assets, 'valuation', 'realizable_value_sanction_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'realizable_value_recall_date', $template_id))
            <li>
                <span>Realizable Value - Recall Date</span>
                {{ assetdetail_value($assets, 'valuation', 'realizable_value_recall_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'realizable_value_1', $template_id))
            <li>
                <span>Realizable Value Latest - 1</span>
                {{ assetdetail_value($assets, 'valuation', 'realizable_value_1', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'realizable_value_2', $template_id))
            <li>
                <span>Realizable Value Latest - 2</span>
                {{ assetdetail_value($assets, 'valuation', 'realizable_value_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'forced_sale_value_1', $template_id))
            <li>
                <span>Forced Sale Value Latest - 1</span>
                {{ assetdetail_value($assets, 'valuation', 'forced_sale_value_1', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'forced_sale_value_2', $template_id))
            <li>
                <span>Forced Sale Value Latest - 2</span>
                {{ assetdetail_value($assets, 'valuation', 'forced_sale_value_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'rental_rate_area', $template_id))
            <li>
                <span>Rental Rate in the Area (Rs. / month)</span>
                {{ assetdetail_value($assets, 'valuation', 'rental_rate_area', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'valuation', 'insurance_value', $template_id))
            <li>
                <span>Insurance Value</span>
                {{ assetdetail_value($assets, 'valuation', 'insurance_value', $template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif