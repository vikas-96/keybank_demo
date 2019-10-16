@extends('admin.layouts.auth')

@section('title', 'Case lead officer')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('caseleadofficer.store')}}" method="POST" id="caseleadofficer-form">
		@csrf
		@include('admin.caseleadofficer.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#caseleadofficer-form").validate({
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
		$('#caseleadofficer-form').submit();
	}
});


</script>
@endpush
