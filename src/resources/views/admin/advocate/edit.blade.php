@extends('admin.layouts.auth')

@section('title', 'Advocate')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('advocate.update',$advocate['_id'])}}" method="POST" id="advocate-form">
        @csrf
        @method('PUT')
		@include('admin.advocate.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#advocate-form").validate({
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
		$('#advocate-form').submit();
	}
});
</script>
@endpush