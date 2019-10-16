<?php
    $acc_count =  old('account_no',($assets['loan'] ?? null));
    $count = (old('account_no',($assets['loan'] ?? null))!==null) && (!empty(old('account_no',($assets['loan'] ?? null))))?count(old('account_no',($assets['loan'] ?? null))):1;
?>
<div class="col-md-24 section-heading">
    <h5>Loan
        <!-- <button>+ Add More</button> -->
    </h5>
</div>
<div class="container" id="dynamicTable">
    @for($k = 0; $k < $count; $k++) <div class="row" id="loan_section{{$k}}">
        <div class="col-md-6 ">
            <div class="form-group">
                <label class="required">Account No.</label>
                <select id="account_no_{{$k}}" name="account_no[]" class="form-control loan_account_no"
                    {{($k == 0)?'required':''}}>
                    @if(old('account_no.'.$k,($assets['loan'][$k]['_id'] ?? null)))
                    <option value="{{ old('account_no.'.$k,($assets['loan'][$k]['_id'] ?? null)) }}" selected>
                        {{ old('loan.'.$k.'.account_text',($assets['loan'][$k]['account_no'] ?? null)) }}</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>First Sanction Date</label>
                <input type="text" id="first_sanction_date_{{$k}}" name="loan[{{$k}}][first_sanction_date]"
                    class="form-control"
                    value="{{ old('loan.'.$k.'.first_sanction_date',($assets['loan'][$k]['first_sanction_date'] ?? null)) }}"
                    readonly />
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>Banking Arrangement</label>
                <input type="text" id="banking_arrangement_{{$k}}" name="loan[{{$k}}][banking_arrangement]"
                    class="form-control"
                    value="{{ old('loan.'.$k.'.banking_arrangement',($assets['loan'][$k]['banking_arrangement'] ?? null)) }}"
                    readonly />
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>Lead Bank</label>
                <input type="text" id="lead_bank_{{$k}}" name="loan[{{$k}}][lead_bank]" class="form-control"
                    value="{{ old('loan.'.$k.'.lead_bank',($assets['loan'][$k]['lead_bank']['bank_name'] ?? null)) }}"
                    readonly />
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>SBI Share[%]</label>
                <input type="text" id="sbi_share_{{$k}}" name="loan[{{$k}}][sbi_share]"
                    value="{{ old('loan.'.$k.'.sbi_share',($assets['loan'][$k]['sbi_share'] ?? null)) }}"
                    class="form-control" readonly />
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>NPA Date</label>
                <input type="text" id="npa_date_{{$k}}" name="loan[{{$k}}][npa_date]"
                    value="{{ old('loan.'.$k.'.npa_date',($assets['loan'][$k]['npa_date'] ?? null)) }}"
                    class="form-control" readonly />
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <label>Borrower Name</label>
                <input type="text" id="borrower_name_{{$k}}" name="loan[{{$k}}][borrower_name]"
                    value="{{ old('loan.'.$k.'.borrower_name',($assets['loan'][$k]['borrower_id']['name'] ?? null)) }}"
                    class="form-control" readonly />
            </div>
        </div>

        <div class="col-md-3 ">
            <div class="form-group">
                <label>CIF</label>
                <input type="text" id="cif_{{$k}}" name="loan[{{$k}}][cif]"
                    value="{{ old('loan.'.$k.'.cif',($assets['loan'][$k]['borrower_id']['cif'] ?? null)) }}"
                    class="form-control" readonly />
                <input type="hidden" id="account_text_{{$k}}" name="loan[{{$k}}][account_text]"
                    value="{{ old('loan.'.$k.'.account_text',($assets['loan'][$k]['account_no'] ?? null)) }}" />
            </div>
        </div>
        @if($k == 0)
        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" id="add" class="btn btn-success">Add More</button>
            </div>
        </div>
        @else
        <div class="col-md-3">
            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="btn btn-danger remove-loan">Remove</button>
            </div>
        </div>
        @endif
</div>
@endfor
</div>
@push('js')
<script type="text/javascript">
    var i = {{$count}}
    @php
    $old_loan = isset($assets['loan'])?array_column($assets['loan'], '_id'):[];
    @endphp

    let selectedDataArray = [];
    selectedDataArray = <?php echo json_encode(old('account_no', $old_loan)); ?>;
    selectedDataArray =  selectedDataArray==null?[]:selectedDataArray;
    $("#add").click(function(){	
   
        let j = i-1;
        let account_count = $('.loan_account_no').length;
        let check_acc = account_count-1 ;
        if($("#account_no_"+check_acc).val() == null){
            alert("Please fill in the previous section");
            return false;
        }
        
        let appnd = '<div class="row addmore-loan" id="loan_section'+i+'">'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label class="required">Account No.</label>'+
                                '<select data-id='+i+' id=account_no_'+i+' name="account_no[]" class="form-control loan_account_no"></select>'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>First Sanction Date</label>'+
                                '<input id=first_sanction_date_'+i+' type="text" name="loan['+i+'][first_sanction_date]" class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Banking Arrangement</label>'+
                                '<input id=banking_arrangement_'+i+' type="text" name="loan['+i+'][banking_arrangement]" class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Lead Bank</label>'+
                                '<input id=lead_bank_'+i+'  type="text" name="loan['+i+'][lead_bank]"  class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>SBI Share[%]</label>'+
                                '<input id=sbi_share_'+i+'  type="text" name="loan['+i+'][sbi_share]"  class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>NPA Date</label>'+
                                '<input id=npa_date_'+i+'  type="text" name="loan['+i+'][npa_date]"  class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-6">'+
                            '<div class="form-group">'+
                                '<label>Borrower Name</label>'+
                                '<input id=borrower_name_'+i+'  type="text" name="loan['+i+'][borrower_name]"  class="form-control" readonly />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<div class="form-group">'+
                                '<label>CIF</label>'+
                                '<input id=cif_'+i+'  type="text" name="loan['+i+'][cif]"  class="form-control" readonly />'+
                                '<input type="hidden" id="account_text_'+i+'" name="loan['+i+'][account_text]" />'+
                            '</div>'+
                        '</div>'+
                        '<div class="col-md-3">'+
                            '<div class="form-group">'+
                                '<label>&nbsp;</label>'+
                                '<button type="button" class="btn btn-danger remove-loan">Remove</button>'+
                            '</div>'+
                        '</div>'+
                    '</div>';

        $("#dynamicTable").append(appnd);
    
        $('#account_no_'+i).select2({
            dropdownAutoWidth : true,
            width: '100%',
            placeholder: 'Enter keywords to search..',
            ajax: assetsLoanData('{{route("search-loan")}}')
        }).on('select2:selecting', function (e) {
            let acc =e.target.value;
            if(acc != "" || acc != null){
                var index = selectedDataArray.indexOf(acc);
                if(index!=-1){
                    selectedDataArray.splice(index, 1);
                }
            }
        }).on('select2:select', function (e) {
            let i = $(this).attr('data-id');
            
            var data = e.params.data;
            if(selectedDataArray.indexOf(data.id) !== -1){
                alert("Account no. is already selected.")
                $(this).val('').text('');
                return false;
            }
            selectedDataArray.push(data.id);
            $('#first_sanction_date_'+i).val(data.first_sanction_date);
            $('#banking_arrangement_'+i).val(data.banking_arrangement);
            $('#lead_bank_'+i).val(data.lead_bank);
            $('#sbi_share_'+i).val(data.sbi_share);
            $('#npa_date_'+i).val(data.npa_date);
            $('#borrower_name_'+i).val(data.borrower_name);
            $('#cif_'+i).val(data.cif);
            $('#account_text_'+i).val(data.text);
        });
        i++;
    });
$(document).ready(function(){

    for(let j=0;j<=i;j++){
    $('#account_no_'+j).select2({
        dropdownAutoWidth : true,
        width: '100%',
        placeholder: 'Enter keywords to search..',
        ajax: assetsLoanData('{{route("search-loan")}}')
    }).on('select2:selecting', function (e) {
        let acc =e.target.value;
        if(acc != "" || acc != null){
            var index = selectedDataArray.indexOf(acc);
            if(index!=-1){
                selectedDataArray.splice(index, 1);
            }
        }
    }).on('select2:select', function (e) {
        var data = e.params.data;
        if(selectedDataArray.indexOf(data.id) !== -1){
            alert("Account no. is already selected.")
            $(this).val('').text('');
            return false;
        }
        selectedDataArray.push(data.id);
        $('#first_sanction_date_'+j).val(data.first_sanction_date);
        $('#banking_arrangement_'+j).val(data.banking_arrangement);
        $('#lead_bank_'+j).val(data.lead_bank);
        $('#sbi_share_'+j).val(data.sbi_share);
        $('#npa_date_'+j).val(data.npa_date);
        $('#borrower_name_'+j).val(data.borrower_name);
        $('#cif_'+j).val(data.cif);
        $('#account_text_'+j).val(data.text);
    });
    }
});


    function assetsLoanData(path){
        return {
            url: path,
            quietMillis: 100,
            data: function (params) {
                var query = {
                    q: params.term
                }
            // Query parameters will be ?search=[term]&type=public
            return query;
            },
            processResults: function (data) {
                let response = data.data;
                return {
                        results: $.map(response, function(value) {
                        return {
                            id: value.id,
                            text: value.account_no,
                            account_no: value.account_no,
                            banking_arrangement: value.banking_arrangement,
                            borrower_name: value.borrower_name,
                            cif: value.cif,
                            first_sanction_date: value.first_sanction_date,
                            id: value.id,
                            lead_bank: value.lead_bank,
                            npa_date: value.npa_date,
                            sbi_share: value.sbi_share
                        }
                    })
                };
            },
            cache: true
        }
    }
    var current_id = 0;

    $(document).on('click', '.remove-loan', function(e){  
        e.preventDefault();
        
        //let removeid = $(this).parents('.addmore-loan:first').find('.loan_account_no').val();
        let removeid = $(this).parent().parent().parent().find('.loan_account_no').val();
        var index = selectedDataArray.indexOf(removeid);
        
        if(index!=-1){
            selectedDataArray.splice(index, 1);
        }
        $(this).parent().parent().parent().remove();
        i--;
    });
   
</script>
@endpush