@extends('admin.layouts.auth')

@section('title', 'Loan')

@section('content')
<div class="row">
	<div class="col-24">
	<form action="{{ route('loan.store') }}" method="POST" id="loan-form">
		@csrf
		@include('admin.loan.partials.form')
	</form>
	</div>
</div>
@endsection
