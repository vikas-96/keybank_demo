@if(isset($assets['size']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Size / Area </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets, 'size', 'plot_length', $template_id))
            <li>
                <span>Length of Plot</span> {{ assetdetail_value($assets, 'size', 'plot_length', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'plot_length_unit', $template_id))
            <li>
                <span>Unit of Length</span>
                {{ config('assets.unit_length.'.assetdetail_value($assets,'size','plot_length_unit', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'plot_breadth', $template_id))
            <li>
                <span>Breadth of Plot</span> {{ assetdetail_value($assets, 'size', 'plot_breadth', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'plot_breadth_unit', $template_id))
            <li>
                <span>Unit of Breadth</span>
                {{ config('assets.unit_length.'.assetdetail_value($assets,'size','plot_breadth_unit', $template_id)) }}
            </li>
            @endif

            {{-- @if(validate_assetdetail($assets, 'size', 'area_type', $template_id))
            <li>
                <span>Type of Area</span>
                {{ config('assets.area_type.'.assetdetail_value($assets,'size','area_type', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'area', $template_id))
            <li>
                <span>Area</span> {{ assetdetail_value($assets, 'size', 'area', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'unit', $template_id))
            <li>
                <span>Unit</span> {{ config('assets.unit.'.assetdetail_value($assets,'size','unit', $template_id)) }}
            </li>
            @endif --}}

            <li>
                @if(validate_assetdetail($assets, 'size', 'area_type', $template_id))
                    <span>{{ config('assets.area_type.'.$value['size']['area_type']) }}</span>
                @endif
                @if(validate_assetdetail($assets, 'size', 'area', $template_id))
                    {{ ($value['size']['area']) ?? null }}
                @endif
                @if(validate_assetdetail($assets, 'size', 'unit', $template_id))
                    {{ config('assets.unit.'.$value['size']['unit']) }}
                @endif
            </li>

            @if(validate_assetdetail($assets, 'size', 'loft_area', $template_id))
            <li>
                <span>Mezzanine / Loft Area</span> {{ assetdetail_value($assets, 'size', 'loft_area', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'loft_height', $template_id))
            <li>
                <span>Height of Mezzanine / Loft</span>
                {{ config('assets.height.'.assetdetail_value($assets,'size','loft_height', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'loft_area_type', $template_id))
            <li>
                <span>Type of Area (Loft)</span>
                {{ config('assets.area_type.'.assetdetail_value($assets,'size','loft_area_type', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'loft_unit', $template_id))
            <li>
                <span>Unit (Loft)</span>
                {{ config('assets.unit.'.assetdetail_value($assets,'size','loft_unit', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'terrace_area', $template_id))
            <li>
                <span>Total Terrace / Balcony area</span>
                {{ assetdetail_value($assets, 'size', 'terrace_area', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'terrace_unit', $template_id))
            <li>
                <span>Unit of area (Terrace)</span>
                {{ config('assets.unit.'.assetdetail_value($assets,'size','terrace_unit', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'basement_construction', $template_id))
            <li>
                <span>Basement Construction</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'size','basement_construction', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'basement_construction_area', $template_id))
            <li>
                <span>Basement Construction Area</span>
                {{ assetdetail_value($assets, 'size', 'basement_construction_area', $template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'basement_area_type', $template_id))
            <li>
                <span>Type of Area (Basement)</span>
                {{ config('assets.area_type.'.assetdetail_value($assets,'size','basement_area_type', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'basement_unit', $template_id))
            <li>
                <span>Unit (Basement)</span>
                {{ config('assets.unit.'.assetdetail_value($assets,'size','basement_unit', $template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets, 'size', 'basement_usage', $template_id))
            <li>
                <span>Basement - Usage</span>
                {{ config('assets.usage.'.assetdetail_value($assets,'size','basement_usage', $template_id)) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif