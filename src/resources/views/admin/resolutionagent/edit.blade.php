@extends('admin.layouts.auth')

@section('title', 'Resolution Agent')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('resolutionagent.update',$resolutionagent['_id'])}}" method="POST" id="resolutionagent-form">
        @csrf
        @method('PUT')
		@include('admin.resolutionagent.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#resolutionagent-form").validate({
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
		$('#resolutionagent-form').submit();
	}
});
</script>
@endpush