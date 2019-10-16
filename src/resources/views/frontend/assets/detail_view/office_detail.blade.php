@if(isset($assets['office_detail']))
<div class="col-lg-12">
    <div class="card-detail">
        @if($template_id == 'T7')
        <h4>Details of Individual Units, Offices and Shops</h4>
        @else
        <h4>Details of Flats and Shops</h4>
        @endif
        <ul class="property-detail">
            @if(isset($assets['office_detail']))
                @for($i = 0; $i < count($assets['office_detail']) ; $i++)
                    @if(isset($assets['office_detail'][$i]['office_no']))
                        <li>
                            <span>Flat No. / Shop No. / Office No.</span> {{ $assets['office_detail'][$i]['office_no'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['description']))
                        <li>
                            <span>Description</span> {{ $assets['office_detail'][$i]['description'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['area_type']))
                        <li>
                            <span>Type of Area</span> {{ $assets['office_detail'][$i]['area_type'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['area']))
                        <li>
                            <span>Area</span> {{ $assets['office_detail'][$i]['area'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['unit']))
                        <li>
                            <span>Unit</span> {{ $assets['office_detail'][$i]['unit'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['unit_sold']))
                        <li>
                            <span>Has Unit been Sold?</span> {{ $assets['office_detail'][$i]['unit_sold'] }}
                        </li>
                    @endif
                    @if(isset($assets['office_detail'][$i]['market_value']))
                        <li>
                            <span>Market Value</span> {{ $assets['office_detail'][$i]['market_value'] }}
                        </li>
                    @endif
                @endfor
            @endif
        </ul>
    </div>
</div>
@endif