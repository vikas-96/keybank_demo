<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | AID</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/lib/datatable/dataTables.bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-datepicker.min.css') }}">
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">

    @stack('css')

</head>

<body>

    <!-- Top Panel -->
    <header id="left-panel" class="left-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 main-logo"><a href="{{route('assets.index')}}"><img
                            src="{{ asset('admin/images/login-page-logo.png') }}"></a></div>
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-sm navbar-default pull-right">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        @include('admin.layouts.partials.side-menu')
                    </nav>
                </div>
            </div>
        </div>
    </header><!-- /#top-panel -->
    <!-- Top Panel -->
    @stack('progress-bar')


    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <div class="container">
            <div class="row-wrapper">
                @include('admin.layouts.partials.page-head')
                @if ($errors->any())
                <div class="col">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                @endif
                @if ($message = session('success'))
                <div class="alert alert-success fade show" data-auto-dismiss="3000">
                    <div>{{ $message['message'] }}</div>
                </div>
                @endif

                @if ($message = session('error'))
                <div class="alert alert-danger fade show" data-auto-dismiss="3000">
                    <div>{{ $message['message'] }}</div>
                </div>
                @endif

                <div class="animated fadeIn">
                    @yield('content')
                </div><!-- .animated -->
            </div>
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <div class="loading">Loading&#8230;</div>

    <script src="/admin/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="/admin/js/popper.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/main.js"></script>
    <script src="/admin/js/dashboard.js"></script>
    <script src="/admin/js/lib/data-table/datatables.min.js"></script>
    <!-- <script src="/admin/js/lib/data-table/dataTables.bootstrap.min.js"></script> -->
    <script src="/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="/admin/js/lib/data-table/datatables-init.js"></script>
    <script src="/admin/js/bootstrap-datepicker.min.js"></script>
    <script src="/admin/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
    <script src="/admin/js/jquery.validate.min.js"></script>

    <script src="/admin/js/select2.js"></script>

    <script src="/admin/js/masters.js"></script>

    <script type="text/javascript">
        (function ($) {
            $('.alert[data-auto-dismiss]').each(function (index, element) {
                var $element = $(element),
                timeout  = $element.data('auto-dismiss') || 5000;

                setTimeout(function () {
                    $element.alert('close');
                }, timeout);
            });
        })(jQuery);
    </script>
    @stack('js')
</body>

</html>