@if(isset($assets['charges']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Charges</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets,'charges','monthly_maintenance_charges',$template_id))
                <li>
                    <span>Monthly Maintenance Charges</span>{{ assetdetail_value($assets,'charges','monthly_maintenance_charges',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'charges','security_charges',$template_id))
                <li>
                    <span>Security Charges</span>{{ assetdetail_value($assets,'charges','security_charges',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'charges','other_charges',$template_id))
                <li>
                    <span>Other Charges</span>{{ assetdetail_value($assets,'charges','other_charges',$template_id) }}
                </li>
            @endif

        </ul>
    </div>
</div>
@endif