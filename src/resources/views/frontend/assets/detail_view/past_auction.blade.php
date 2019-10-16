
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Past Auction Details</h4>
        <ul class="property-detail">
            @if(isset($assets['past_auction']))
            	@if(validate_assetdetail($assets, 'past_auction', 'last_auction_successfull', $template_id))
                    <li>
                        <span>Last Auction Successful?</span> {{ config('assets.yes_no.'.assetdetail_value($assets,'past_auction','last_auction_successfull', $template_id)) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'mark_sold', $template_id))
                    <li>
                        <span>Mark as Sold</span> {{ assetdetail_value($assets, 'past_auction', 'mark_sold', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'no_of_bidders_in_last_auction', $template_id))
                    <li>
                        <span>Number of Bidders in Last Auction</span> {{ assetdetail_value($assets, 'past_auction', 'no_of_bidders_in_last_auction', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'bidder_name_address', $template_id))
                    <li>
                        <span>Successful Bidder Name and Address</span> {{ assetdetail_value($assets, 'past_auction', 'bidder_name_address', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'successful_bid_amount', $template_id))
                    <li>
                        <span>Successful Bid Amount</span> {{ assetdetail_value($assets, 'past_auction', 'successful_bid_amount', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'final_recovery_amount', $template_id))
                    <li>
                        <span>Final Recovery Amount</span> {{ assetdetail_value($assets, 'past_auction', 'final_recovery_amount', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'auction_gst', $template_id))
                    <li>
                        <span>GST</span> {{ assetdetail_value($assets, 'past_auction', 'auction_gst', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'auction_tds', $template_id))
                    <li>
                        <span>TDS</span> {{ assetdetail_value($assets, 'past_auction', 'auction_tds', $template_id) }}
                    </li>
                @endif
                @if(validate_assetdetail($assets, 'past_auction', 'no_of_auction_held', $template_id))
                    <li>
                        <span>Number of Auctions held</span> {{ assetdetail_value($assets, 'past_auction', 'no_of_auction_held', $template_id) }}
                    </li>
                @endif
                @if(isset($assets['past_auction']['auction']))
                    @for($i = 0; $i < count($assets['past_auction']['auction']) ; $i++)
                        @if(isset($assets['past_auction']['auction'][$i]['past_auction_date']))
                            <li>
                                <span>Date of Auction</span> {{ $assets['past_auction']['auction'][$i]['past_auction_date'] }}
                            </li>
                        @endif
                        @if(isset($assets['past_auction']['auction'][$i]['reserve_price']))
                            <li>
                                <span>Reserve Price in Auction</span>
                                @if(is_numeric($assets['past_auction']['auction'][$i]['reserve_price']))
                                    {{money_format("%.0n", $assets['past_auction']['auction'][$i]['reserve_price']) }}
                                @else
                                    {{ $assets['past_auction']['auction'][$i]['reserve_price'] }}
                                @endif
                                
                            </li>
                        @endif
                        @if(isset($assets['past_auction']['auction'][$i]['no_of_emd_received']))
                            <li>
                                <span>Number of EMDs Received in Auction</span> {{ $assets['past_auction']['auction'][$i]['no_of_emd_received'] }}
                            </li>
                        @endif
                        @if($i < count($assets['past_auction']['auction'])-1)
                            <hr>
                        @endif
                    @endfor
                @endif
            @endif
        </ul>
    </div>
</div>

