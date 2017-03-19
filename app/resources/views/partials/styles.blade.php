{{-- Vendor styles --}}
<link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css') }}">
<link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/css/AdminLTE.css') }}">

<link rel="stylesheet" href="{{ asset('assets/vendor/admin-lte/css/skins/skin-blue.min.css') }}">

{{-- App styles --}}
<link rel="stylesheet" href="{{ mix('assets/app/css/app.css') }}">

{{-- Page specific styles --}}
@stack('page-styles')

{{-- Page specific inline styles --}}
@stack('inline-styles')
