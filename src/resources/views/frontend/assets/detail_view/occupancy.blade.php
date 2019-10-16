@if(isset($assets['occupancy']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Occupancy</h4>
        <ul class="property-detail">
        	@if(validate_assetdetail($assets,'occupancy','occupied_by',$template_id))
                <li>
                    <span>Occupied by</span>{{ config('assets.occupied_by.'.assetdetail_value($assets,'occupancy','occupied_by',$template_id)) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'occupancy','no_of_unit_sold',$template_id))
                <li>
                    <span>Number of Units Sold</span>{{ assetdetail_value($assets,'occupancy','no_of_unit_sold',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'occupancy','no_of_tenants',$template_id))
                <li>
                    <span>Number of Tenants</span>{{ assetdetail_value($assets,'occupancy','no_of_tenants',$template_id) }}
                </li>
            @endif
            @if(isset($assets['occupancy']['tenant']))
                @for($i = 0; $i < count($assets['occupancy']['tenant']) ; $i++)
                    @if(isset($assets['occupancy']['tenant'][$i]['tenant_since']))
                        <li>
                            <span>Tenant Since</span> {{ $assets['occupancy']['tenant'][$i]['tenant_since'] }}
                        </li>
                    @endif
                    @if(isset($assets['occupancy']['tenant'][$i]['tenant_rent_per_month']))
                        <li>
                            <span>Rent Received per month from Tenants</span> {{ $assets['occupancy']['tenant'][$i]['tenant_rent_per_month'] }}
                        </li>
                    @endif
                @endfor
            @endif
        </ul>
    </div>
</div>
@endif