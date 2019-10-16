@if(isset($assets['oc']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>OC</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'oc','oc_status',$template_id))
                <li>
                    <span>OC Status</span>{{ config('assets.yes_no_options.'.assetdetail_value($assets,'oc','oc_status',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'oc','oc_date',$template_id))
                <li>
                    <span>Date of OC</span>{{ assetdetail_value($assets,'oc','oc_date',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif