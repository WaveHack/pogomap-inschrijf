<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Inschrijf</title>

    <link rel="stylesheet" href="{{ mix('assets/app/css/app.css') }}">
</head>
<body>

<div class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('register') }}">Inschrijf</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('register') }}">Inschrijven</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="container">
    @yield('content')
</div>

<script src="{{ mix('assets/app/js/app.js') }}"></script>

</body>
</html>
