<div class="card">
	<div class="card-header">
		<strong>Add New Loan</strong>
	</div>
	<div class="card-body card-block">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="account_no" class="required">Account No.:</label>
					<input type="text" name="account_no" class="form-control" value="{{old('account_no', $loan['account_no'])}}">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="first_sanction_date" class="required">First Sanction Date:</label>
					
					<div class="date-picker">
						<div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
							<input type="text" class="form-control" name="first_sanction_date" id="npa_date" value="{{old('first_sanction_date', $loan['first_sanction_date'])}}" readonly>
							<div class="input-group-addon">
								<i class="fa fa-calendar" aria-hidden="true"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="banking_arrangement" class="required">Banking Arrangement:</label>
				<select name="banking_arrangement" id="banking_arrangement">
					@foreach(config('assets.banking_arrangement') as $k => $v)
						@if(old('banking_arrangement') == $k || $loan['banking_arrangement'] == $k)
							<option value="{{$k}}" selected>{{$v}}</option>
						@else
							<option value="{{$k}}">{{$v}}</option>
						@endif
					@endforeach
				</select>
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="lead_bank" class="required">Lead Bank:</label>
				<select name="lead_bank" class="cs-select" id="lead_bank">
					<option selected>Select Bank</option>
					@foreach($banklist as $k => $v)
						@if(old('lead_bank') == $k || $loan['lead_bank'] == $k)
							<option value="{{$k}}" selected>{{$v}}</option>
						@else
							<option value="{{$k}}">{{$v}}</option>
						@endif
					@endforeach
				</select>
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="sbi_share" class="required">SBI Share:</label>
				<input type="text" name="sbi_share" class="form-control" value="{{old('sbi_share', $loan['sbi_share'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="npa_date" class="required">NPA Date:</label>
				<div class="date-picker">
				<div class="input-group form-group date past_date" data-provide="datepicker" data-date-format="dd-mm-yyyy">
					<input type="text" class="form-control" name="npa_date" id="npa_date" value="{{old('npa_date', $loan['npa_date'])}}" readonly>
					<div class="input-group-addon">
						<i class="fa fa-calendar" aria-hidden="true"></i>
					</div>
				</div>
			</div>
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="borrower_id" class="required">Borrower:</label>
				<select name="borrower_id" class="cs-select" id="borrower_id">
						@if(old('borrower_id'))
							<option value="{{old('borrower_id')}}" selected>{{old('borrowertext')}}</option>
						@elseif($loan['borrower_id'])
							<option value="{{$loan['borrower_id']}}" selected>{{$loan['cif']." (".$loan['borrower_name'].")"}}</option>
						@else
							<option value="" selected>Select Borrower</option>
						@endif
				</select>
				<input type="hidden" name="borrowertext" id="borrowertext">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="is_active" class="required">Status:</label>
				<select name="is_active" id="loan_is_active">
					<option value=1 {{ ((old('is_active') == '1') || ($loan['is_active'] == '1'))?'selected':'' }}>Active</option>
					<option value=0 {{ ((old('is_active') == '0') || ($loan['is_active'] == '0'))?'selected':'' }}>Deactive</option>
				</select>
			</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<input type="submit" value="Save" class="addbtn btn btn-primary btn-sm">
	</div>
</div>

@push('js')
<script>
	
$(document).ready(function(){
	$('#lead_bank,#banking_arrangement,#loan_is_active').select2({
		dropdownAutoWidth : true,
		width: '100%'
	});

	$('#borrower_id').select2({ 
		// placeholder: 'Select an option',
		dropdownAutoWidth : true,
		width: '100%',
		ajax: loanDropdownData('{{route("search-borrower")}}')
	});
	
	$('#borrowertext').val($('#borrower_id').text());

	$('#borrower_id').on("select2:select", function(e) {
		var data = e.params.data;
		$('#borrowertext').val(data.text);
	});
});

</script>
@endpush