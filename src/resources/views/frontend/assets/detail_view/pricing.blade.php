@if(isset($assets['pricing']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Pricing</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'pricing','rental_amount',$template_id))
            <li>
                <span>Rental Amount</span>{{assetdetail_value($assets,'pricing','rental_amount',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'pricing','based_on_reckoner_rate',$template_id))
            <li>
                <span>Value based on Reckoner Rate</span>{{assetdetail_value($assets,'pricing','based_on_reckoner_rate',$template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif