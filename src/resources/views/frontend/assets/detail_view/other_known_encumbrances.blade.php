@if(isset($assets['encumbrances']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Other Known Encumbrances</h4>
        <ul class="property-detail">
            @if(isset($assets['encumbrances']))
                @for($i = 0; $i < count($assets['encumbrances']) ; $i++)
                    @if(isset($assets['encumbrances'][$i]['other_known_encumbrances']))
                        <li>
                            <span>Other Known Encumbrances</span> {{ config('assets.yes_no_options.'.$assets['encumbrances'][$i]['other_known_encumbrances']) }}
                        </li>
                    @endif
                    @if(isset($assets['encumbrances'][$i]['authority_name']))
                        <li>
                            <span>Name of Authority</span> {{ $assets['encumbrances'][$i]['authority_name'] }}
                        </li>
                    @endif
                    @if(isset($assets['encumbrances'][$i]['notice_date']))
                        <li>
                            <span>Date of Notice</span> {{ $assets['encumbrances'][$i]['notice_date'] }}
                        </li>
                    @endif
                    @if(isset($assets['encumbrances'][$i]['amount']))
                        <li>
                            <span>Amount</span> {{ $assets['encumbrances'][$i]['amount'] }}
                        </li>
                    @endif
                    @if(isset($assets['encumbrances'][$i]['priority_over_bank_dues']))
                        <li>
                            <span>Priority over Bank Dues</span> {{ config('assets.yes_no_options.'.$assets['encumbrances'][$i]['priority_over_bank_dues']) }}
                        </li>
                    @endif
                @endfor
            @endif
        </ul>
    </div>
</div>
@endif