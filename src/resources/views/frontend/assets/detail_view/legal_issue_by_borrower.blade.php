@if(isset($assets['legal_issue_by_borrower']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Legal issue by Borrower</h4>
        <ul class="property-detail">
            @if(isset($assets['legal_issue_by_borrower']))
                @for($i = 0; $i < count($assets['legal_issue_by_borrower']) ; $i++)
                    @if(isset($assets['legal_issue_by_borrower'][$i]['suit_filed_by_borrower']))
                        <li>
                            <span>SA Filed by Borrower?</span> {{ config('assets.yes_no_options.'.$assets['legal_issue_by_borrower'][$i]['suit_filed_by_borrower']) }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['suit_filed_date']))
                        <li>
                            <span>SA Filed Date</span> {{ $assets['legal_issue_by_borrower'][$i]['suit_filed_date'] }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['court_name']))
                        <li>
                            <span>Court Name</span> {{ $assets['legal_issue_by_borrower'][$i]['court_name'] }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['parties_name']))
                        <li>
                            <span>Names of Parties</span> {{ $assets['legal_issue_by_borrower'][$i]['parties_name'] }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['suit_filed_purpose']))
                        <li>
                            <span>Purpose of SA Filed</span> {{ config('assets.suit_filed_purpose.'.$assets['legal_issue_by_borrower'][$i]['suit_filed_purpose']) }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['current_status']))
                        <li>
                            <span>Current Status</span> {{ $assets['legal_issue_by_borrower'][$i]['current_status'] }}
                        </li>
                    @endif
                    @if(isset($assets['legal_issue_by_borrower'][$i]['hearing_next_date']))
                        <li>
                            <span>Next Date of Hearing</span> {{ $assets['legal_issue_by_borrower'][$i]['hearing_next_date'] }}
                        </li>
                    @endif
                @endfor
            @endif
        </ul>
    </div>
</div>
@endif