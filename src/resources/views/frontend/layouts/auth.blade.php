<!doctype html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Listing</title>
	<link rel="stylesheet" href="{{URL::asset('frontend/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{URL::asset('frontend/css/font-awesome.min.css')}}">
	<link href="{{URL::asset('frontend/css/common.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datepicker.min.css') }}">
	<link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/daterangepicker.css') }}" />


	@stack('css')
</head>

<body>
	@include('frontend.layouts.partials.header')
	@if(!in_array(\Request::route()->getName(),['asset.search','reports-search','reports']))
	@include('frontend.layouts.partials.side-menu')
	@elseif(\Request::route()->getName() == 'reports')
	@include('frontend.layouts.partials.reports-side-menu')
	@else
	<div class="nav-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-lg-24">

				</div>
			</div>
		</div>
	</div>
	@endif

	@if ($message = session('error'))
	<div class="alert alert-danger fade show" data-auto-dismiss="3000">
		<div>{{ @$message['message'] }}</div>
	</div>
	@endif
	<section class="container">
		<div class="row">
			<div class="col-lg-24">
				@yield('content')
			</div>
		</div>
	</section>
	@stack('advance-filter')
	<script src="{{URL::asset('frontend/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" href="{{ URL::asset('admin/css/select2.css') }}">
	<script src="{{URL::asset('/admin/js/select2.js')}}"></script>
	<script src="{{URL::asset('/admin/js/bootstrap-datepicker.min.js')}}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
	<script type="text/javascript" src="{{ asset('frontend/js/add_to_compare.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('frontend/js/moment.min.js') }}"></script>

	<script type="text/javascript" src="{{ URL::asset('frontend/js/daterangepicker.min.js') }}"></script>
	<script src="{{URL::asset('frontend/js/highcharts.js')}}"></script>
	<script src="{{URL::asset('frontend/js/highcharts-no-data-to-display.js')}}"></script>
	@stack('js')
</body>
<script type="text/javascript">
	var asseturl = '{{ route("add-to-compare", ":id") }}';
</script>

</html>