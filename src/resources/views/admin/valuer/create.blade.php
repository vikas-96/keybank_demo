@extends('admin.layouts.auth')

@section('title', 'Valuer')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('valuer.store')}}" method="POST" id="valuer-form">
		@csrf
		@include('admin.valuer.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#valuer-form").validate({
	rules: {
		name: "required",
		contact: "required",
		email: {
			required:true,
			email:true,
		},
		is_active:"required",
	},
	submitHandler : function(e) {
		e.preventDefault();
		$('#valuer-form').submit();
	}
});


</script>
@endpush
