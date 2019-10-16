@if(isset($value['plot']))
<div class="property-highlights row">
    @if(in_array($template_id,config('list.plot.plot_amenities')) && isset($value['plot']['plot_amenities']))
    <div class="col-md-12">
        <span>Plot amenities :</span>
        <strong>
            @php $plot_amenities_value = ''; @endphp
            @foreach($value['plot']['plot_amenities'] as $plot_amenities)
                @php
                    $plot_amenities_value .= config('assets.plot_amenities.'.$plot_amenities).', ';
                @endphp
            @endforeach
            {{trim($plot_amenities_value,', ')}}
        </strong>
    </div>
    @endif

    {{-- @if(in_array($template_id,config('list.plot.approved_land_use')))
    <div class="col-md-6">
        <span>Approved land use :</span>
        <strong>{{ ($value['plot']['approved_land_use']) ?? null }}</strong>
    </div>
    @endif --}}
</div>
@endif