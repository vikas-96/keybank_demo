@if(isset($assets['entry_status']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Entry Status</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'entry_status','entry_status',$template_id))
                <li>
                    <span>Entry Status</span>{{ config('assets.entry_status.'.assetdetail_value($assets,'entry_status','entry_status',$template_id)) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif