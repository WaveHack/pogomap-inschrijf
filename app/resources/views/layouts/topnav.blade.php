<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title>@yield('page-header', config('app.name'))</title>

    @include('partials.styles')

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue layout-top-nav">
{{--{!! Analytics::render() !!}--}}

@include('partials.scripts')

<div class="wrapper">

    <!-- Content -->
    <div class="content-wrapper">
        <div class="container">

            @hasSection('page-header')
                <div class="content-header">
                    <h1>
                        @yield('page-header')

                        @hasSection('page-subheader')
                            <small>
                                @yield('page-subheader')
                            </small>
                        @endif
                    </h1>
                </div>
            @endif

            <div class="content">

                @include('partials.alerts')

                @yield('content')

            </div>

        </div>
    </div>

</div>

</body>
</html>
