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
{!! Analytics::render() !!}

<div class="wrapper">

    <!-- Header -->
    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">

                <!-- Navbar Header -->
                <div class="navbar-header">
                    <a href="{{ url('admin') }}" class="navbar-brand">PoGo050</a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Navbar Left Menu -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        @if (Auth()->check())
                            <li class="{{ Request::is('admin/dashboard') ? 'active' : null }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="{{ Request::is('admin/registrations*') ? 'active' : null }}"><a href="{{ route('admin.registrations.index') }}">Registraties</a></li>
                            <li class="{{ Request::is('admin/accounts*') ? 'active' : null }}"><a href="{{ route('admin.accounts.index') }}">Gebruikers</a></li>
                            @if (Auth()->user()->is_dev)
                                <li class="{{ Request::is('admin/users*') ? 'active' : null }}"><a href="{{ route('admin.users.index') }}">Admins</a></li>
                            @endif
                        @endif
                    </ul>
                </div>

                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @if (Auth()->check())

                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="{{ Gravatar::src(Auth::user()->email, 160) }}" class="user-image" alt="{{ Auth::user()->name}}">
                                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="{{ Gravatar::src(Auth::user()->email, 160) }}" class="img-circle" alt="{{ Auth::user()->display_name }}">
                                        <p>
                                            {{ Auth::user()->display_name }}
                                            <small>Admin sinds {{ Auth::user()->created_at->toFormattedDateString() }}</small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-right">
                                            <form action="{{ route('admin.auth.logout') }}" method="post">
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-sign-out fa-fw"></i> Uitloggen
                                                </button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        @else
                            <li class="{{ Request::is('admin/login') ? 'active' : null }}"><a href="#">Login</a></li>
                        @endif
                    </ul>
                </div>

            </div>
        </nav>
    </header>

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

<a href="https://github.com/WaveHack/pogomap-inschrijf" class="github-corner" aria-label="View source on Github" target="_blank"><svg width="80" height="80" viewBox="0 0 250 250" style="fill:#151513; color:#fff; position: absolute; top: 50px; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>

@include('partials.scripts')

</body>
</html>
