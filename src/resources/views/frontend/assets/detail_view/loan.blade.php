@if(isset($assets['loan']))
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Loan</h4>
        <ul class="property-detail">
            @for($i = 0; $i < count($assets['loan']); $i++) 
                <li>
                <span>Account Number</span> {{ $assets['loan'][$i]['account_no'] }}
                </li>
                <li>
                    <span>First Sanction Date</span> {{ $assets['loan'][$i]['first_sanction_date'] }}
                </li>
                <li>
                    <span>NPA Date</span> {{ $assets['loan'][$i]['npa_date'] }}
                </li>
                <li>
                    <span>Name of Borrower</span> {{ $assets['loan'][$i]['borrower_id']['name'] }}
                </li>
                <li>
                    <span>CIF</span> {{ $assets['loan'][$i]['borrower_id']['cif'] }}
                </li>
                <li>
                    <span>Banking Arrangement</span> {{ config('assets.banking_arrangement.'.$assets['loan'][$i]['banking_arrangement']) }}
                </li>
                <li>
                    <span>Lead Bank</span> {{ $assets['loan'][$i]['lead_bank']['bank_name'] }}
                </li>
                <li>
                    <span>SBI Share[%]</span> {{ $assets['loan'][$i]['sbi_share'] }}
                </li>
                @if($i < count($assets['loan'])-1)
                    <hr>
                @endif
                @endfor
        </ul>
    </div>
</div>
@endif