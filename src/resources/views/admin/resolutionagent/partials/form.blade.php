<div class="card">
	<div class="card-header">
		<strong>Add New Resolution Agent</strong>
	</div>
	<div class="card-body card-block">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="name" class="required">Name:</label>
				<input type="text" name="name" class="form-control" value="{{old('name', $resolutionagent['name'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="contact" class="required">Contact:</label>
				<input type="tel" name="contact" maxlength="15" minlength="7" class="form-control" value="{{old('contact', $resolutionagent['contact'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="email" class="required">Email:</label>
				<input type="email" name="email" class="form-control" value="{{old('email', $resolutionagent['email'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="is_active" class="required">Status:</label>
				<select name="is_active" id="resolutionagent_is_active">
					<option value=1 {{ ((old('is_active') == '1') || ($resolutionagent['is_active'] == '1'))?'selected':'' }}>Active</option>
					<option value=0 {{ ((old('is_active') == '0') || ($resolutionagent['is_active'] == '0'))?'selected':'' }}>Deactive</option>
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
	$('#resolutionagent_is_active').select2({
		dropdownAutoWidth : true,
		width: '100%',
	});
</script>
@endpush