<div class="card">
	<div class="card-header">
		<strong>Add New Borrower</strong>
	</div>
	<div class="card-body card-block">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="name" class="required">Name:</label>
				<input type="text" name="name" class="form-control" value="{{old('name', $borrower['name'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="cif" class="required">CIF:</label>
				<input type="text" name="cif" class="form-control" value="{{old('cif', $borrower['cif'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="is_active" class="required">Status:</label>
				<select name="is_active" id="borrower_is_active">
					<option value=1 {{ ((old('is_active') == '1') || ($borrower['is_active'] == '1'))?'selected':'' }}>Active</option>
					<option value=0 {{ ((old('is_active') == '0') || ($borrower['is_active'] == '0'))?'selected':'' }}>Deactive</option>
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
<script type="text/javascript">
	$('#borrower_is_active').select2({
		dropdownAutoWidth : true,
		width: '100%',
	});
</script>
@endpush