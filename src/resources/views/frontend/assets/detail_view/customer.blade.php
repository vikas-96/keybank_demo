@if(isset($assets['customer']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Account Information </h4>
        <ul class="property-detail">
            <li>
                <span>Property Id</span> {{ $assets['property_id'] }}
            </li>
            @if(validate_assetdetail($assets,'customer','description',$template_id))
                <li>
                    <span>Description</span> {{ assetdetail_value($assets,'customer','description',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'customer','property_type',$template_id))
                <li>
                    <span>Property Type</span> {{ ucfirst($assets['customer']['property_type']) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'customer','property_sub_type',$template_id))
                <li>
                    <span>Property Sub Type</span> {{ config('assets.property_sub_type.'.assetdetail_value($assets,'customer','property_sub_type',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'customer','is_nclt',$template_id))
                <li>
                    <span>Has Account Been Referred to NCLT</span> {{ config('assets.yes_no_options.'.assetdetail_value($assets,'customer','is_nclt',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'customer','migrating_branch',$template_id))
                <li>
                    <span>Migrating Branch</span> 
                    {{ $assets['migratingbranch']['name'] }}
                </li>
            @endif
                <li>
                    <span>Recovery Branch</span> {{ $assets['recoverybranch']['branch_name'] }}
                </li>
            @if(validate_assetdetail($assets,'customer','recall_date',$template_id))
                <li>
                    <span>Recall Date</span> {{ assetdetail_value($assets,'customer','recall_date',$template_id) }}
                </li>
            @endif
                <li>
                    <span>Case Lead Officer Name</span> {{ $assets['caseleadofficer']['name'] }}
                </li>
                <li>
                    <span>Case Officer Name</span> {{ $assets['caseofficer']['name'] }}
                </li>
            @if(validate_assetdetail($assets,'customer','cersai_number',$template_id))
                <li>
                    <span>CERSAI Number</span> {{ assetdetail_value($assets,'customer','cersai_number',$template_id) }}
                </li>
            @endif
                <li>
                    <span>Name of Lender</span> {{ $assets['banklist']['bank_name'] }}
                </li>
            @if(validate_assetdetail($assets,'customer','owner_name',$template_id))
                <li>
                    <span>Name of Owner:</span> {{ assetdetail_value($assets,'customer','owner_name',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'customer','referral_date',$template_id))
                <li>
                    <span>Date of Referral</span> {{ assetdetail_value($assets,'customer','referral_date',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif