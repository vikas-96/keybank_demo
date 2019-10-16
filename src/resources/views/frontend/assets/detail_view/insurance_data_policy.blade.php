@if(isset($assets['insurance_data_policy']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Insurance Data Policy</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets,'insurance_data_policy','insurer_name',$template_id))
                <li>
                    <span>Name of the Insurer</span>{{ assetdetail_value($assets,'insurance_data_policy','insurer_name',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','policy_no',$template_id))
                <li>
                    <span>Policy No.</span>{{ assetdetail_value($assets,'insurance_data_policy','policy_no',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','policy_type',$template_id))
                <li>
                    <span>Policy Type</span>{{ assetdetail_value($assets,'insurance_data_policy','policy_type',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','sum_assured',$template_id))
                <li>
                    <span>Sum Assured</span>{{ assetdetail_value($assets,'insurance_data_policy','sum_assured',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','premium_amount',$template_id))
                <li>
                    <span>Premium Amount</span>{{ assetdetail_value($assets,'insurance_data_policy','premium_amount',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','insurance_start_date',$template_id))
                <li>
                    <span>Insurance Effective From Start Date</span>{{ assetdetail_value($assets,'insurance_data_policy','insurance_start_date',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'insurance_data_policy','insurance_end_date',$template_id))
                <li>
                    <span>Insurance Effective To End Date</span>{{ assetdetail_value($assets,'insurance_data_policy','insurance_end_date',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif