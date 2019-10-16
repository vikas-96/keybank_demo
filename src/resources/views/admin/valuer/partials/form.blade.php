<div class="card">
	<div class="card-header">
		<strong>Add New Valuer</strong>
	</div>
	<div class="card-body card-block">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="name" class="required">Name:</label>
				<input type="text" name="name" class="form-control" value="{{old('name', $valuer['name'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="tel" class="required">Contact:</label>
				<input type="tel" name="contact" maxlength="15" minlength="7" class="form-control" value="{{old('contact', $valuer['contact'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="email" class="required">Email:</label>
				<input type="email" name="email" class="form-control" value="{{old('email', $valuer['email'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="is_active">Status:</label>
				<select name="is_active" id="valuer_is_active">
					<option value=1 {{ ((old('is_active') == '1') || ($valuer['is_active'] == '1'))?'selected':'' }}>Active</option>
					<option value=0 {{ ((old('is_active') == '0') || ($valuer['is_active'] == '0'))?'selected':'' }}>Deactive</option>
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
	$('#valuer_is_active').select2({
		dropdownAutoWidth : true,
		width: '100%',
	});
</script>
@endpush