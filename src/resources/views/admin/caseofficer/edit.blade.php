@extends('admin.layouts.auth')

@section('title', 'Case Officer')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('caseofficer.update',$co['_id'])}}" method="POST" id="caseofficer-form">
        @csrf
        @method('PUT')
		@include('admin.caseofficer.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#caseofficer-form").validate({
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
		$('#caseofficer-form').submit();
	}
});
</script>
@endpush