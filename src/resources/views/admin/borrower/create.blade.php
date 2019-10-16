@extends('admin.layouts.auth')

@section('title', 'Borrower')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{route('borrower.store')}}" method="POST" id="borrower-form">
		@csrf
		@include('admin.borrower.partials.form')
	</form>
	</div>
</div>
@endsection

@push('js')
<script>
	
$("#borrower-form").validate({
	rules: {
		name: "required",
		cif: "required",
		is_active:"required",
	},
	submitHandler : function(e) {
		e.preventDefault();
		$('#borrower-form').submit();
	}
});


</script>
@endpush
