<div class="property-highlights row">
    @if(isset($value["borrower_details"]["borrower_name"]))
        <div class="col-md-5">
            <span>Borrower Name</span>
            <strong>{{$value["borrower_details"]["borrower_name"]}}</strong>
        </div>
    @endif
    @if(isset($value['recoverybranch']['branch_name']))
        <div class="col-md-5">
            <span>Recovery Branch</span>
            <strong>{{$value['recoverybranch']['branch_name']}}</strong>
        </div>
    @endif
    @if(isset($value["borrower_details"]["npa_date"]))
        <div class="col-md-4">
            <span>NPA Date</span>
            <strong>{{$value["borrower_details"]["npa_date"]}}</strong>
        </div>
    @endif
    @if(isset($value["past_auction"]["no_of_auction_held"]))
        <div class="col-md-5">
            <span>Past Auctions</span>
            <strong>{{$value["past_auction"]["no_of_auction_held"]}}</strong>
        </div>
    @endif
</div>