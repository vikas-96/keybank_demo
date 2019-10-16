@if(isset($assets['inspection_data_logs']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Inspection Data Logs</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets,'inspection_data_logs','inspection_date',$template_id))
                <li>
                    <span>Date of Inspection</span>{{ assetdetail_value($assets,'inspection_data_logs','inspection_date',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'inspection_data_logs','officer_name',$template_id))
                <li>
                    <span>Name of Officer</span>{{ assetdetail_value($assets,'inspection_data_logs','officer_name',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif