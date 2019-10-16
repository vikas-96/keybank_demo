<div class="property-highlights row">
    @if( validate_assetdetail($assets, 'building','building_amenities',$template_id))
    <div class="col-md-18">
        <span>Building Amenities</span>
        <strong>
            @php
                $building_amenities = assetdetail_value($assets,'building','building_amenities',$template_id);
                $building_amenities_value = '';
            @endphp
            @if(is_array($building_amenities))
                @if(!empty($building_amenities))
                    @foreach($building_amenities as $amenities)
                        @php
                            $building_amenities_value .= config('assets.building_amenities.'.$amenities).', ';
                        @endphp
                    @endforeach
                    {{trim(ucwords($building_amenities_value),', ')}}
                @endif
            @else
                {{ ucwords($building_amenities) }}
            @endif
        </strong>
    </div>
    @endif

    {{-- @if(in_array($template_id,config('list.building.business_nature')))
    <div class="col-md-12">
        <span>Nature of Business :</span>
        <strong>{{ $value['building']['business_nature'] }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.building.lift_in_building')))
    <div class="col-md-12">
        <span>Lift in the building :</span>
        <strong>{{ $value['building']['lift_in_building'] }}</strong>

    {{ config('assets.yes_no_options.'.$value['building']['lift_in_building']) }}
    </div>
    @endif

    @if(in_array($template_id,config('list.building.building_completion_year')))
    <div class="col-md-12">
        <span>Building Completion Year :</span>
        <strong>{{ $value['building']['building_completion_year'] }}</strong>
    </div>
    @endif

    @if(in_array($template_id,config('list.building.no_of_floors_in_building')))
    <div class="col-md-12">
        <span>No. of floors in the building :</span>
        <strong>{{ $value['building']['no_of_floors_in_building'] }}</strong>
    </div>
    @endif --}}

</div>
