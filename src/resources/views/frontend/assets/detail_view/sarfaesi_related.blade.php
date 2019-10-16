@if(isset($assets['sarfaesi_related']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>SARFAESI Related</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets, 'sarfaesi_related', 'possession_type', $template_id))
                <li>
                    <span>Possession Type</span> {{ config('assets.possession_type.'.assetdetail_value($assets,'sarfaesi_related','possession_type', $template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'possession_date', $template_id))
            <li>
                <span>Date of Possession</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'possession_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'issuance_status_13_2', $template_id))
                <li>
                    <span>13(2) Issuance Status</span> {{ config('assets.issuance_status.'.assetdetail_value($assets,'sarfaesi_related','issuance_status_13_2', $template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'issuance_date_13_2', $template_id))
            <li>
                <span>13(2) Issuance DATE</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'issuance_date_13_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'dues_amount_13_2', $template_id))
            <li>
                <span>13(2) Amount of Dues</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'dues_amount_13_2', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'issuance_status_13_4', $template_id))
                <li>
                    <span>13(4) Issuance Status</span> {{ config('assets.issuance_status.'.assetdetail_value($assets,'sarfaesi_related','issuance_status_13_4', $template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'issuance_date_13_4', $template_id))
            <li>
                <span>13(4) Issuance DATE</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'issuance_date_13_4', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'dm_application_date', $template_id))
            <li>
                <span>DM / CMM Application Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'dm_application_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'dm_inspection_date', $template_id))
            <li>
                <span>DM / CMM Inspection Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'dm_inspection_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'dm_order_date', $template_id))
            <li>
                <span>DM / CMM Order Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'dm_order_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'sarfaesi_relatedfixation_possession_date', $template_id))
            <li>
                <span>Fixation of Physical Possession Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'sarfaesi_relatedfixation_possession_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'panchnama_assuance_date', $template_id))
            <li>
                <span>Panchnama Issuance Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'panchnama_assuance_date', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'sarfaesi_related', 'possession_receipt_date', $template_id))
            <li>
                <span>Possession Receipt Date</span> {{ assetdetail_value($assets, 'sarfaesi_related', 'possession_receipt_date', $template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif
