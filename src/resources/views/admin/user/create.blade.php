@extends('admin.layouts.auth')

@section('title', 'User')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('users.store')}}" method="POST" id="user-form">
		@csrf
		@include('admin.user.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#user-form").validate({
	rules: {
		firstname: "required",
		lastname: "required",
		contact_number: "required",
		email: {
			required:true,
			email:true,
		},
		password: "required",
		role:"required",
		is_active:"required",
	},
	submitHandler : function(e) {
		e.preventDefault();
		$('#user-form').submit();
	}
});


</script>
@endpush
