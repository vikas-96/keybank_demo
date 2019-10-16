<div class="card">
	<div class="card-header">
		<strong>Add New User</strong>
	</div>
	<div class="card-body card-block">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="firstname" class="required">Firstname:</label>
				<input type="text" name="firstname" class="form-control" value="{{old('firstname', $user['firstname'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="lastname" class="required">Lastname:</label>
				<input type="text" name="lastname" class="form-control" value="{{old('lastname', $user['lastname'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="contact_number" class="required">Contact number:</label>
				<input type="tel" maxlength="15" minlength="7" name="contact_number" class="form-control" value="{{old('contact_number', $user['contact_number'])}}">
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<label for="email" class="required">Email:</label>
				<input type="email" name="email" class="form-control" value="{{old('email', $user['email'])}}">
			</div>
			</div>
			@if(empty($user['id']))
			<div class="col-md-6">
				<div class="form-group">
				<label for="password" class="required">Password:</label>
				<input type="password" name="password" class="form-control" value="{{old('password')}}">
			</div>
			</div>
			@endif
			<div class="col-md-6">
				<div class="form-group">
				<label for="role" class="required">Role:</label>
				<select name="role" id="user_role">
					@foreach($roles as $role => $value)
						<option value="{{$value->name}}" 
							{{ (($value->name == old("role")) || ($value->name == $user['role'])) ? 'selected' : '' }}>{{$value->display_name}}</option>
					@endforeach
				</select>
			</div>
			</div>
			@if(\Auth::user()->_id != $user['id'])
			<div class="col-md-6">
				<div class="form-group">
					<label for="is_active" class="required">Status:</label>
					<select name="is_active" id="user_is_active">
						<option value=1 {{ ((old('is_active') == '1') || ($user['is_active'] == '1'))?'selected':'' }}>Active</option>
						<option value=0 {{ ((old('is_active') == '0') || ($user['is_active'] == '0'))?'selected':'' }}>Deactive</option>
					</select>
				</div>
			</div>
			@endif
		</div>
	</div>
	<div class="card-footer">
		<input type="submit" value="Save" class="addbtn btn btn-primary btn-sm">
	</div>
</div>

@push('js')
<script type="text/javascript">
	$('#user_is_active,#user_role').select2({
		dropdownAutoWidth : true,
		width: '100%',
	});
</script>
@endpush