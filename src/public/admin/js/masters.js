//////////////***************LOAN MASTER***************////////////////////
$("#loan-form").validate({
	rules: {
		borrower_id:"required",
		account_no:"required",
		first_sanction_date:"required",
		banking_arrangement:"required",
		lead_bank:"required",
		sbi_share:{
			required:true,
			number: true
		},
		npa_date:"required",
		is_active:"required",
	},
	submitHandler : function(e) {
		e.preventDefault();
		$('#loan-form').submit();
	}
});

function loanDropdownData(path){
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
						id: value.value,
						text: value.label
					}
				})
			};
		},
		cache: true
	}
}
$(document).ready(function(){
	$('.past_date').datepicker({
        endDate: new Date(),
        todayHighlight: true,
        //startDate: '+1d',
        format: 'dd/mm/yyyy',
        autoclose: true,
    });
});