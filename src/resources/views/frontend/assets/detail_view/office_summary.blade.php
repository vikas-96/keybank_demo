@if(isset($assets['office_summary']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>>Summary of Flats and Shops</h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'office_summary','unit_total_no',$template_id))
                <li>
                    <span>Total Number of Units</span>{{ assetdetail_value($assets,'office_summary','unit_total_no',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'office_summary','area_type',$template_id))
                <li>
                    <span>Type of Area</span>{{ config('assets.area_type.'.assetdetail_value($assets,'office_summary','area_type',$template_id))}}
                </li>
            @endif
            @if(validate_assetdetail($assets,'office_summary','total_area',$template_id))
                <li>
                    <span>Total Area</span>{{ assetdetail_value($assets,'office_summary','total_area',$template_id) }}
                </li>
            @endif
            @if(validate_assetdetail($assets,'office_summary','unit',$template_id))
                <li>
                    <span>Unit</span>{{ assetdetail_value($assets,'office_summary','unit',$template_id) }}
                </li>
            @endif
        </ul>
    </div>
</div>
@endif