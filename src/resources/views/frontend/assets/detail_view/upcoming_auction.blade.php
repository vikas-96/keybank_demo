
<div class="col-lg-12">
    <div class="card-detail">
        <h4>Upcoming Auction Details</h4>
        <ul class="property-detail">
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'is_auction_planned', $template_id))--}}
            <li>
                <span>Is Auction Planned?</span> {{ config('assets.yes_no_options.'.assetdetail_value($assets, 'upcoming_auction', 'is_auction_planned', $template_id)) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{-- @if(validate_assetdetail($assets, 'upcoming_auction', 'sale_notice_date', $template_id)) --}}
            <li>
                
                <span>Sale Notice Date</span> {{ assetdetail_value($assets, 'upcoming_auction', 'sale_notice_date', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'publication_date', $template_id))--}}
            <li>
                <span>Publication Date</span> {{ assetdetail_value($assets, 'upcoming_auction', 'publication_date', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'e_auction_date', $template_id))--}}
            <li>
                <span>E-auction Date</span> {{ assetdetail_value($assets, 'upcoming_auction', 'e_auction_date', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'bank_officer_name', $template_id))--}}
            <li>
                <span>Name of Bank Officer</span> {{ assetdetail_value($assets, 'upcoming_auction', 'bank_officer_name', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'bank_officer_contact_number', $template_id))--}}
            <li>
                <span>Contact Details of Bank Officer</span> {{ assetdetail_value($assets, 'upcoming_auction', 'bank_officer_contact_number', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'auction_type', $template_id))--}}
            <li>
                <span>Auction Type</span> {{ config('assets.auction_type.'.assetdetail_value($assets,'upcoming_auction','auction_type', $template_id)) ?? '--' }}
            </li>
            {{-- @endif --}}
            {{--@if(validate_assetdetail($assets, 'upcoming_auction', 'inspection_datetime', $template_id))--}}
            <li>
                <span>Inspection Date and Time</span> {{ assetdetail_value($assets, 'upcoming_auction', 'inspection_datetime', $template_id) ?? '--' }}
            </li>
            {{-- @endif --}}
            <li>
                <span>Publication Notice Date</span> {{ assetdetail_value($assets, 'upcoming_auction', 'publication_notice_date', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Application Submission Deadline</span> {{ assetdetail_value($assets, 'upcoming_auction', 'application_submission_deadline', $template_id) ?? '--' }}
            </li>
            <li>
                <span>eAuction Provider</span> {{ assetdetail_value($assets, 'upcoming_auction', 'eauction_provider', $template_id) ?? '--' }}
            </li>
            <li>
                <span>eAuction URL</span> {{ assetdetail_value($assets, 'upcoming_auction', 'eauction_url', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Auction Start Date and Time</span> {{ assetdetail_value($assets, 'upcoming_auction', 'auction_start_datetime', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Auction End Date and Time</span> {{ assetdetail_value($assets, 'upcoming_auction', 'auction_end_datetime', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Reserve Price</span> {{ assetdetail_value($assets, 'upcoming_auction', 'reserve_price', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Time Extention</span> {{ assetdetail_value($assets, 'upcoming_auction', 'time_extention', $template_id) ?? '--' }}
            </li>
            <li>
                <span>EMD Amount</span> {{ assetdetail_value($assets, 'upcoming_auction', 'emd_amount', $template_id) ?? '--' }}
            </li>
            <li>
                <span>EMD Account Details</span> {{ assetdetail_value($assets, 'upcoming_auction', 'emd_account_details', $template_id) ?? '--' }}
            </li>
            <li>
                <span>EMD Payment Method</span> {{ assetdetail_value($assets, 'upcoming_auction', 'emd_payment_method', $template_id) ?? '--' }}
            </li>
            <li>
                <span>Tender Fee</span> {{ assetdetail_value($assets, 'upcoming_auction', 'tender_fee', $template_id) ?? '--' }}
            </li>
        </ul>
    </div>
</div>
