    <div class="col-md-24 section-heading">
        <h5>Past Auction Details</h5>
    </div>
    <?php //$past_auction_count = old('past_auction.auction',($assets['past_auction']['auction'] ?? null ))!==null?count(old('past_auction.auction',($assets['past_auction']['auction'] ?? null))):1; 
        $past_auction_count = (!empty(old('past_auction.auction',($assets['past_auction']['auction'])))) ? old('past_auction.auction',($assets['past_auction']['auction'] ?? null ))!==null?count(old('past_auction.auction',($assets['past_auction']['auction'] ?? null))):1 : 1;
    ?>

            <div class="col-md-6">
                <div class="form-group">
                <label for="last_auction_successful" class="">Last Auction Successful ?</label>
                <select name="past_auction[last_auction_successfull]" id="last_auction_successful" class="cs-select">
                    <option value=""></option>
                    @foreach(config('assets.yes_no') as $k=>$v )
                    <option value={{$k}} {{(old('past_auction.last_auction_successfull',($assets['past_auction']['last_auction_successfull'] ?? null)) == $k)?'selected':''}}>{{$v}}</option>
                    @endforeach
                </select>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <input type="checkbox" name="past_auction[mark_sold]" id="mark_sold" value="yes" @if(isset($assets['past_auction']['mark_sold']) && $assets['past_auction']['mark_sold'] == 'yes') checked="true" @endif>
                <label for="mark_sold" class="mark_sold">Mark as Sold</label>
            </div>
            </div>
        <div id="div_successful" class="col-md-24" @if( isset($assets['past_auction']['last_auction_successfull']) && $assets['past_auction']['last_auction_successfull'] == 'yes') style="display: block" @else style="display: none" @endif>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                <label for="no_of_bidders_in_last_auction" class="">Number of bidders in Last Auction</label>
                <input type="number" name="past_auction[no_of_bidders_in_last_auction]" id="no_of_bidders_in_last_auction" value="{{old('past_auction.no_of_bidders_in_last_auction',($assets['past_auction']['no_of_bidders_in_last_auction'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="successful_bid_amount" class="">Successful Bid Amount</label>
                <input type="text" name="past_auction[successful_bid_amount]" id="successful_bid_amount" value="{{old('past_auction.successful_bid_amount',($assets['past_auction']['successful_bid_amount'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="final_recovery_amount" class="">Final Recovery Amount</label>
                <input type="text" name="past_auction[final_recovery_amount]" id="final_recovery_amount" value="{{old('past_auction.final_recovery_amount',($assets['past_auction']['final_recovery_amount'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="auction_gst" class="">GST</label>
                <input type="text" name="past_auction[auction_gst]" id="auction_gst" value="{{old('past_auction.auction_gst',($assets['past_auction']['auction_gst'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="auction_gst" class="">TDS</label>
                <input type="text" name="past_auction[auction_tds]" id="auction_tds" value="{{old('past_auction.auction_tds',($assets['past_auction']['auction_tds'] ?? null))}}">
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="bidder_name_address" class="">Successful Bidder Name and Address</label>
                <textarea name="past_auction[bidder_name_address]" id="bidder_name_address">{{old('past_auction.bidder_name_address',($assets['past_auction']['bidder_name_address'] ?? null))}}</textarea>
            </div>
        </div>
            <div class="col-md-6">
                <div class="form-group">
                <label for="no_of_auction_held" class="">Number of Auctions held</label>
                <input type="number" name="past_auction[no_of_auction_held]" id="no_of_auction_held" value="{{old('past_auction.no_of_auction_held',($assets['past_auction']['no_of_auction_held'] ?? null))}}">
            </div>
        </div>
        </div>
    </div>

    <div class="form-group col-md-24">
        <table class="table table-bordered" id="past_auction_table">
            <tr>
                <th>Date of Auction</th>
                <th>Reserve Price in Auction</th>
                <th>Number of EMDs received in Auction</th>
                <th>Action</th>
            </tr>

            @for($k = 0; $k < $past_auction_count; $k++) 
                <tr id="past_auction_section_{{$k}}">
                    <td>
                        <div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd/mm/yyyy">
                            <div class="form-group">
                                <div class="date-picker">
                                    <input type="text" name="past_auction[auction][{{$k}}][past_auction_date]" 
                                        id="past_auction_date_{{$k}}" value="{{old('past_auction.auction.$k.past_auction_date',($assets['past_auction']['auction'][$k]['past_auction_date'] ?? null))}}">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <input type="text" name="past_auction[auction][{{$k}}][reserve_price]" id="auction_reserve_price_{{$k}}" value="{{old('past_auction.auction.$k.reserve_price',($assets['past_auction']['auction'][$k]['reserve_price'] ?? null))}}">
                    </td>
                    <td>
                        <input type="number" name="past_auction[auction][{{$k}}][no_of_emd_received]"
                            id="no_of_emd_received_{{$k}}" value="{{old('past_auction.auction.$k.no_of_emd_received',($assets['past_auction']['auction'][$k]['no_of_emd_received'] ?? null))}}">
                    </td>
                    @if($k == 0)
                        <td><button type="button" id="past_auction_add" class="btn btn-success">Add More</button></td>
                    @else
                        <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
                    @endif
                </tr>
            @endfor
        </table>
    </div>

    @push('js')
    <script>
        var i = {{$past_auction_count}};

        $(document).ready(function(){

        $("#last_auction_successful").change(function(){
            if($(this).val()==="yes"){
                $("#div_successful").css('display','block');
            }else{
                $("#div_successful").css('display','none'); 
            }            
        });    

        $("#past_auction_add").click(function(){	
        
        $("#past_auction_table").append(
            '<tr>'+
            '<td><div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd/mm/yyyy">'+
                    '<div class="form-group">'+
                        '<div class="date-picker">'+
                            '<input type="text" name="past_auction[auction]['+i+'][past_auction_date]" id="past_auction_date_'+i+'">'+
                            '<div class="input-group-addon">'+
                                '<i class="fa fa-calendar" aria-hidden="true"></i>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</td><td><input id=auction_reserve_price_'+i+' type="text" name="past_auction[auction]['+i+'][reserve_price]"  />'+
            ' </td><td><input id=no_of_emd_received_'+i+' type="number" name="past_auction[auction]['+i+'][no_of_emd_received]"   />'+
            '</td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>'+
            '</tr>'
        );
        i++;
        $('.past_date').datepicker({
            endDate: new Date(),
            todayHighlight: true,
            //startDate: '+1d',
            format: 'dd/mm/yyyy',
            autoclose: true,
        });  
    });

    $(document).on('click', '.remove-tr', function(){  
         $(this).parents('tr').remove();
    });

    });

    </script>

    @endpush