@if(isset($assets['plot']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Plot Information </h4>
        <ul class="property-detail">
            @if(validate_assetdetail($assets,'plot','matching_of_boundaries',$template_id))
            <li>
                <span>Matching of Boundaries?</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','matching_of_boundaries',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','plot_demarcated',$template_id))
            <li>
                <span>Plot Demarcated</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','plot_demarcated',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','land_type',$template_id))
            <li>
                <span>Type of Land</span>
                {{ config('assets.land_type.'.assetdetail_value($assets,'plot','land_type',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','independent_access',$template_id))
            <li>
                <span>Independent Access to the Property</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','independent_access',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','corner_plot',$template_id))
            <li>
                <span>Corner Plot</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','corner_plot',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','boundary_wall',$template_id))
            <li>
                <span>Boundary Wall / Fencing Constructed</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','boundary_wall',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','boundary_wall_type',$template_id))
            <li>
                <span>Boundary Wall Type</span>
                {{ config('assets.boundary_wall_type.'.assetdetail_value($assets,'plot','boundary_wall_type',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','agriculture_land',$template_id))
            <li>
                <span>Non - Agricultural Land</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','agriculture_land',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','ownership_type',$template_id))
            <li>
                <span>Ownership Type</span>
                {{ config('assets.ownership_type.'.assetdetail_value($assets,'plot','ownership_type',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','plot_amenities',$template_id) && isset($assets['plot']['plot_amenities']))
            <li>
                <span>Plot Amenities</span>
                    @php $plot_amenities_value = ''; @endphp
                    @foreach($assets['plot']['plot_amenities'] as $plot_amenities)
                        @php
                            $plot_amenities_value .= config('assets.plot_amenities.'.$plot_amenities).', ';
                        @endphp
                    @endforeach
                    {{trim($plot_amenities_value,', ')}}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','allowed_construction_floors',$template_id))
            <li>
                <span>Floors Allowed for Construction</span>
                {{assetdetail_value($assets,'plot','allowed_construction_floors',$template_id)}}
            </li>
            @endif


            {{--multiselect--}}
            @if(validate_assetdetail($assets,'plot','plot_overlooking',$template_id) && isset($assets['plot']['plot_overlooking']))
            <li>
                <span>Plot Overlooking</span> 
                @php $plot_overlooking_value = ''; @endphp
                @foreach($assets['plot']['plot_overlooking'] as $plot_overlooking)
                    @php
                        $plot_overlooking_value .= config('assets.facing.'.$plot_overlooking).', ';
                    @endphp
                @endforeach
                {{trim($plot_overlooking_value,', ')}}
            </li>
            @endif

            @if(validate_assetdetail($assets,'plot','gated_plot',$template_id))
            <li>
                <span>Gated Plot</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','gated_plot',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','plot_facing',$template_id))
            <li>
                <span>Plot Facing</span>
                {{ config('assets.directions.'.assetdetail_value($assets,'plot','plot_facing',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','tube_well',$template_id))
            <li>
                <span>Tube Well in Premises</span>
                {{ config('assets.yes_no_options.'.assetdetail_value($assets,'plot','tube_well',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','approved_land_use',$template_id))
            <li>
                <span>Approved Land Use</span>
                {{ config('assets.approved_land_use.'.assetdetail_value($assets,'plot','approved_land_use',$template_id)) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','plot_usp',$template_id))
            <li>
                <span>Plot USP</span> {{assetdetail_value($assets,'plot','plot_usp',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','any_dumping_on_plot',$template_id))
            <li>
                <span>Any Dumping on the Plot </span>
                {{assetdetail_value($assets,'plot','any_dumping_on_plot',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','any_construction_on_plot',$template_id))
            <li>
                <span>Details of any Construction on the Plot</span>
                {{assetdetail_value($assets,'plot','any_construction_on_plot',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','plot_composition',$template_id))
            <li>
                <span>Plot Composition</span> {{assetdetail_value($assets,'plot','plot_composition',$template_id) }}
            </li>
            @endif



            @if(validate_assetdetail($assets,'plot','unauthorized_construction_comment',$template_id))
            <li>
                <span>Comment on Unauthorized Construction</span>
                {{assetdetail_value($assets,'plot','unauthorized_construction_comment',$template_id) }}
            </li>
            @endif
            @if(validate_assetdetail($assets,'plot','other_construction',$template_id))
            <li>
                <span>Other Construction?</span> {{assetdetail_value($assets,'plot','other_construction',$template_id) }}
            </li>
            @endif
        </ul>
    </div>
</div>
@endif