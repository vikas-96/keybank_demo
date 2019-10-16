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
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="/admin/css/normalize.css">
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/select2.css">
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/admin/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/admin/css/style.css">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    @stack('css')

</head>

<body>

    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="/"> AID </a>
                <a class="navbar-brand hidden" href="/"> AID </a>
            </div>

            @include('admin.layouts.partials.side-menu')
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        @include('admin.layouts.partials.header')

        @include('admin.layouts.partials.page-head')

        <div class="content mt-3">
            {{--  @if ($errors->any())
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
    @endif --}}

    @if ($message = session('success'))
    <div class="alert alert-success fade show" data-auto-dismiss="3000">
        <div>{{ $message }}</div>
    </div>
    @endif

    @if ($message = session('error'))
    <div class="alert alert-danger fade show" data-auto-dismiss="3000">
        <div>{{ $message }}</div>
    </div>
    @endif

    <div class="animated fadeIn">
        @yield('content')
    </div><!-- .animated -->

    </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="/admin/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="/admin/js/popper.min.js"></script>
    <script src="/admin/js/bootstrap.min.js"></script>
    <script src="/admin/js/select2.js"></script>
    <script src="/admin/js/dashboard.js"></script>
    <script src="/admin/js/main.js"></script>


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