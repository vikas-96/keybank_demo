    <div class="col-md-24 section-heading">
        <h5>Upcoming Auction Details</h5>
    </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="auction_type" class="required">Is Auction Planned?</label>
                    <select name="upcoming_auction[is_auction_planned]" id="is_auction_planned" class="cs-select" required="">
                        <option value=""></option>
                        @foreach (config('assets.yes_no_options') as $k=>$v )
                        <option value={{$k}} {{(old('upcoming_auction.is_auction_planned',($assets['upcoming_auction']['is_auction_planned'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="input-group form-group date upcoming_date col-md-6" data-provide="datepicker" data-date-format="yyyy/mm/dd"> 
                <div class="form-group">
                    <label for="sale_notice_date" class="">Sale Notice date</label>
                    <div class="date-picker">
                        <input type="text" class="upcoming_date" name="upcoming_auction[sale_notice_date]" id="sale_notice_date" value="{{old('upcoming_auction.sale_notice_date',($assets['upcoming_auction']['sale_notice_date'] ?? null))}}">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group form-group date upcoming_date col-md-6" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                <div class="form-group">
                    <label for="publication_date" class="">Publication date</label>
                    <div class="date-picker">
                        <input type="text" name="upcoming_auction[publication_date]" id="publication_date" value="{{old('upcoming_auction.publication_date',($assets['upcoming_auction']['publication_date'] ?? null))}}">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-group form-group date upcoming_date col-md-6" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                <div class="form-group">
                    <label for="e_auction_date" class="">E-auction date</label>
                        <div class="date-picker">
                        <input type="text" name="upcoming_auction[e_auction_date]" id="e_auction_date" value="{{old('upcoming_auction.e_auction_date',($assets['upcoming_auction']['e_auction_date'] ?? null))}}">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bank_officer_name" class="">Name of bank officer</label>
                    <input type="text" name="upcoming_auction[bank_officer_name]" id="bank_officer_name" value="{{old('upcoming_auction.bank_officer_name',($assets['upcoming_auction']['bank_officer_name'] ?? null))}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bank_officer_contact_number" class="">Contact details of bank officer</label>
                    <input type="text" name="upcoming_auction[bank_officer_contact_number]" id="bank_officer_contact_number" value="{{old('upcoming_auction.bank_officer_contact_number',($assets['upcoming_auction']['bank_officer_contact_number'] ?? null))}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="auction_type" class="">Auction type</label>
                <select name="upcoming_auction[auction_type]" id="auction_type" class="cs-select">
                    <option value=""></option>
                    @foreach (config('assets.auction_type') as $k=>$v )
                    <option value={{$k}} {{(old('upcoming_auction.auction_type',($assets['upcoming_auction']['auction_type'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach

                </select>
            </div>
        </div>
            <div class="input-group form-group date col-md-6">
                <div class="form-group">
                    <label for="inspection_datetime" class="">Inspection Date and Time</label>
                    <div class="date-picker">
                    <div class="controls input-append date  form_datetime" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                    <input name="upcoming_auction[inspection_datetime]" id="inspection_datetime" value="{{old('upcoming_auction.inspection_datetime',($assets['upcoming_auction']['inspection_datetime'] ?? null))}}" type="text">
                    <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>
        </div>
            <div class="input-group form-group date upcoming_date col-md-6" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                <div class="form-group">
                <label for="publication_notice_date">Publication Notice Date</label>
                <div class="date-picker">
                <input type="text" name="upcoming_auction[publication_notice_date]" id="publication_notice_date" value="{{old('upcoming_auction.publication_notice_date',($assets['upcoming_auction']['publication_notice_date'] ?? null))}}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            </div>
            </div>
            <div class="input-group form-group date upcoming_date col-md-6" data-provide="datepicker" data-date-format="yyyy/mm/dd">
                <div class="form-group">
                <label for="application_submission_deadline">Application Submission Deadline</label>
                <div class="date-picker">
                <input type="text" name="upcoming_auction[application_submission_deadline]" id="application_submission_deadline" value="{{old('upcoming_auction.application_submission_deadline',($assets['upcoming_auction']['application_submission_deadline'] ?? null))}}">
                <div class="input-group-addon">
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="eauction_provider" class="">eAuction Provider</label>
                <input type="text" name="upcoming_auction[eauction_provider]" id="eauction_provider" value="{{old('upcoming_auction.eauction_provider',($assets['upcoming_auction']['eauction_provider'] ?? null))}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="eauction_url" class="">eAuction URL</label>
                <input type="text" name="upcoming_auction[eauction_url]" id="eauction_url" value="{{old('upcoming_auction.eauction_url',($assets['upcoming_auction']['eauction_url'] ?? null))}}">
            </div>
            </div>
            <div class="input-group form-group date col-md-6">
                <div class="form-group">
                <label for="auction_start_datetime">Auction Start Date and Time</label>
                <div class="date-picker">
                <div class="controls input-append date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input name="upcoming_auction[auction_start_datetime]" id="auction_start_datetime" value="{{old('upcoming_auction.auction_start_datetime',($assets['upcoming_auction']['auction_start_datetime'] ?? null))}}" type="text">
                <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
            </div>
            </div>
            <div class="input-group form-group date col-md-6">
                <div class="form-group">
                <label for="auction_end_datetime">Auction End Date and Time</label>
                <div class="date-picker">

                <div class="controls input-append date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                <input name="upcoming_auction[auction_end_datetime]" id="auction_end_datetime" value="{{old('upcoming_auction.auction_end_datetime',($assets['upcoming_auction']['auction_end_datetime'] ?? null))}}" type="text">
                <span class="add-on"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                </div>
            </div>
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="reserve_price" class="">Reserve Price</label>
                <input type="text" name="upcoming_auction[reserve_price]" id="reserve_price" value="{{old('upcoming_auction.reserve_price',($assets['upcoming_auction']['reserve_price'] ?? null))}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="time_extention" class="">Time Extention</label>
                <input type="number" name="upcoming_auction[time_extention]" id="time_extention" value="{{old('upcoming_auction.time_extention',($assets['upcoming_auction']['time_extention'] ?? null))}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="emd_amount" class="">EMD Amount</label>
                <input type="number" name="upcoming_auction[emd_amount]" id="emd_amount" value="{{old('upcoming_auction.emd_amount',($assets['upcoming_auction']['emd_amount'] ?? null))}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="emd_account_details" class="">EMD Account Details</label>
                <input type="number" name="upcoming_auction[emd_account_details]" id="emd_account_details" value="{{old('upcoming_auction.emd_account_details',($assets['upcoming_auction']['emd_account_details'] ?? null))}}">
            </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="emd_payment_method" class="">EMD Payment Method</label>
                <select name="upcoming_auction[emd_payment_method]" id="emd_payment_method" class="cs-select">
                    <option value=""></option>
                    @foreach(config('assets.emd_payment_method') as $k=>$v )
                    <option value={{$k}} {{(old('upcoming_auction.emd_payment_method',($assets['upcoming_auction']['emd_payment_method'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="tender_fee" class="">Tender Fee</label>
                <input type="text" name="upcoming_auction[tender_fee]" id="tender_fee" value="{{old('upcoming_auction.tender_fee',($assets['upcoming_auction']['tender_fee'] ?? null))}}">
            </div>
            </div>

@push('js')
<script type="text/javascript">
    $('.cs-select').select2({
        dropdownAutoWidth: true,
        width: '100%',
        placeholder: 'Select an option',
    });
    $("#last_auction_sucessful").change(function() {
        if ($("#last_auction_sucessful").val() == 'yes') {

        }
    })
</script>
@endpush