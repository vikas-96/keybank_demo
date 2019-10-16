<div class="col-md-24 section-heading">
    <h5>Legal Issues - Filed by Borrower</h5>
</div>
<?php
        // $legal_issue = old('legal_issue_by_borrower')!==null?count(old('legal_issue_by_borrower')):1; 
        $legal_issue = (old('legal_issue_by_borrower', ($assets['legal_issue_by_borrower'] ?? null)) !== null) && (!empty(old('legal_issue_by_borrower', ($assets['legal_issue_by_borrower'] ?? null)))) ? count(old('legal_issue_by_borrower', ($assets['legal_issue_by_borrower'] ?? null))) : 1;
    ?>
<div class="col-md-24" id="auction_details">
    <table class="table" id="legal_issue_table">
        <tr>
            <th>SA Filed by Borrower?</th>
            <th>SA Filed Date</th>
            <th>Court name</th>
            <th>Names of Parties</th>
            <th>Purpose of SA Filed</th>
            <th>Current Status</th>
            <th>Next Date of hearing</th>
            <th>Action</th>
        </tr>

        @for($k = 0; $k < $legal_issue; $k++) @php
            $selected=old('legal_issue_by_borrower.'.$k.'.suit_filed_purpose',($assets['legal_issue_by_borrower'][$k]['suit_filed_purpose']
            ?? null)); @endphp <tr id="legal_issue_section_{{$k}}">
            <td>
                <div class="form-group">
                    <select name="legal_issue_by_borrower[{{$k}}][suit_filed_by_borrower]" id="suit_filed_by_borrower{{$k}}"
                        class="cs-select">
                        <option value="">Select</option>
                         @foreach (config('assets.yes_no_options') as $key=>$v )
                            <option value={{$key}}
                                {{(old('legal_issue_by_borrower.'.$k.'.suit_filed_by_borrower',($assets['legal_issue_by_borrower'][$k]['suit_filed_by_borrower'] ?? null))==$key)?'selected':''}}>
                                {{$v}}</option>
                        @endforeach
                    </select>
                </div>
            </td>
            <td>
                <div class="input-group form-group date past_date" data-provide="datepicker"
                    data-date-format="dd-mm-yyyy">
                    <div class="form-group">
                        <div class="date-picker">
                            <input type="text" name="legal_issue_by_borrower[{{$k}}][suit_filed_date]"
                                id="suit_filed_date_{{$k}}"
                                value="{{ old('legal_issue_by_borrower.'.$k.'.suit_filed_date',($assets['legal_issue_by_borrower'][$k]['suit_filed_date'] ?? null)) }}"
                                readonly>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" name="legal_issue_by_borrower[{{$k}}][court_name]" id="court_name_{{$k}}"
                        value="{{ old('legal_issue_by_borrower.'.$k.'.court_name',($assets['legal_issue_by_borrower'][$k]['court_name'] ?? null)) }}">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" name="legal_issue_by_borrower[{{$k}}][parties_name]" id="parties_name_{{$k}}"
                        value="{{ old('legal_issue_by_borrower.'.$k.'.parties_name',($assets['legal_issue_by_borrower'][$k]['parties_name'] ?? null)) }}">
                </div>
            </td>
            <td>
                <div class="form-group">
                    <select name="legal_issue_by_borrower[{{$k}}][suit_filed_purpose]" id="suit_filed_purpose_{{$k}}"
                        class="cs-select">
                        <option value="">Select</option>
                        @foreach (config('assets.suit_filed_purpose') as $key=>$v )
                            <option value={{$key}}
                                {{(old('legal_issue_by_borrower.'.$k.'.suit_filed_purpose',($assets['legal_issue_by_borrower'][$k]['suit_filed_purpose'] ?? null))==$key)?'selected':''}}>
                                {{$v}}</option>
                        @endforeach

                    </select>
                </div>
            </td>
            <td>
                <div class="form-group">
                    <input type="text" name="legal_issue_by_borrower[{{$k}}][current_status]" id="current_status_{{$k}}"
                        value="{{ old('legal_issue_by_borrower.'.$k.'.current_status',($assets['legal_issue_by_borrower'][$k]['current_status'] ?? null)) }}">
                </div>
            </td>
            <td>
                <div class="input-group form-group date past_date" data-provide="datepicker"
                    data-date-format="dd-mm-yyyy">
                    <div class="form-group">
                        <div class="date-picker">
                            <input type="text" name="legal_issue_by_borrower[{{$k}}][hearing_next_date]"
                                id="hearing_next_date_{{$k}}"
                                value="{{ old('legal_issue_by_borrower.'.$k.'.hearing_next_date',($assets['legal_issue_by_borrower'][$k]['hearing_next_date'] ?? null)) }}"
                                readonly>
                            <div class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            @if($k == 0)
            <td><button type="button" id="add_leagal_issue_section" class="btn btn-success">Add More</button></td>
            @else
            <td><button type="button" class="btn btn-danger remove-tr">Remove</button></td>
            @endif
            </tr>
            @endfor

    </table>
</div>
@push('js')
<script>
    var i = {{$legal_issue}};

    $(document).ready(function(){

        let options = <?php echo json_encode(config('assets.suit_filed_purpose')); ?>;
        let suit_filed_by_borrower = <?php echo json_encode(config('assets.yes_no_options')); ?>;

        $("#add_leagal_issue_section").click(function(){
            let appnd = 
                '<tr>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<select name="legal_issue_by_borrower['+i+'][suit_filed_by_borrower]" id="suit_filed_by_borrower'+i+'" class="cs-select">'+
                                    '<option value="">Select</option>';
                                    $.map(suit_filed_by_borrower,function(v,k){
                                        appnd += '<option value='+k+'>'+v+'</option>';
                                    });
                appnd +=    '</select>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">'+
                            '<div class="form-group">'+
                                '<div class="date-picker">'+
                                    '<input type="text" name="legal_issue_by_borrower['+i+'][suit_filed_date]" id="suit_filed_date_'+i+'" readonly>'+
                                    '<div class="input-group-addon">'+
                                        '<i class="fa fa-calendar" aria-hidden="true"></i>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<input type="text" name="legal_issue_by_borrower['+i+'][court_name]" id="court_name_'+i+'">'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<input type="text" name="legal_issue_by_borrower['+i+'][parties_name]" id="parties_name_'+i+'">'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<select name="legal_issue_by_borrower['+i+'][suit_filed_purpose]" id="suit_filed_purpose_'+i+'" class="cs-select">'+
                                    '<option value="">Select</option>';
                                    $.map(options,function(v,k){
                                        appnd += '<option value='+k+'>'+v+'</option>';
                                    });
                appnd +=    '</select>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<div class="form-group">'+
                            '<input type="text" name="legal_issue_by_borrower['+i+'][current_status]" id="current_status_'+i+'">'+
                        '</div>'+
                    '<td>'+
                        '<div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">'+
                            '<div class="form-group">'+
                                '<div class="date-picker">'+
                                    '<input type="text" name="legal_issue_by_borrower['+i+'][hearing_next_date]" id="hearing_next_date_'+i+'" readonly>'+
                                    '<div class="input-group-addon">'+
                                        '<i class="fa fa-calendar" aria-hidden="true"></i>'+
                                    '</div>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</td>'+
                    '<td>'+
                        '<button type="button" class="btn btn-danger remove-tr">Remove</button>'+
                    '</td>'+
                '</tr>';

            $("#legal_issue_table").append(appnd);

            $('#suit_filed_purpose_'+i).select2({
                allowClear: true,
                dropdownAutoWidth : true,
                width: '100%',
                placeholder: 'Select an option',
            });
            $('#suit_filed_by_borrower'+i).select2({
                dropdownAutoWidth : true,
                width: '100%',
                placeholder: 'Select an option',
            });
            $('.past_date').datepicker({
                endDate: new Date(),
                todayHighlight: true,
                //startDate: '+1d',
                format: 'dd/mm/yyyy',
                autoclose: true,
            }); 
            i++;
        });

    });

</script>

@endpush