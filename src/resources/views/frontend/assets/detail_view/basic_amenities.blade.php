@if(isset($assets['amenities']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Basic Amenities </h4>
        <ul class="property-detail">
            @if( validate_assetdetail($assets, 'amenities','no_of_covered_parkings',$template_id))
            <li>
                <span>Number of Covered Parkings</span>
                {{ assetdetail_value($assets, 'amenities', 'no_of_covered_parkings', $template_id) }}
            </li>
            @endif
            @if( validate_assetdetail($assets, 'amenities','no_of_open_parkings',$template_id))
            <li>
                <span>Number of Open Parkings</span>
                {{ assetdetail_value($assets, 'amenities', 'no_of_open_parkings', $template_id) }}
            </li>
            @endif
            @if( validate_assetdetail($assets, 'amenities','total_no_of_parkings',$template_id))
            <li>
                <span>Total Number of Parkings</span>
                {{ assetdetail_value($assets, 'amenities', 'total_no_of_parkings', $template_id) }}
            </li>
            @endif
            @if( validate_assetdetail($assets, 'amenities','electricity_availability',$template_id))
            <li>
                <span>Power Backup</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'amenities','electricity_availability', $template_id)) }}
            </li>
            @endif
            @if( validate_assetdetail($assets, 'amenities','water_availability',$template_id))
            <li>
                <span>Water Availability - 24/7</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'amenities','water_availability', $template_id)) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif