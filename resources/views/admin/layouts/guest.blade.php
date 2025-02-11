<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} Admin</title>
    <link rel="shortcut icon" href="{{ asset('images/facivon.png') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/core.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/icon-font.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />

    @yield('styles')
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href={!! route('admin.dashboard') !!}>
                    <img src="{!! asset('images/logo.png') !!}" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{!! asset('js/core.js') !!}"></script>
    <script src="{!! asset('js/script.min.js') !!}"></script>
    <script src="{!! asset('js/process.js') !!}"></script>
    <script src="{!! asset('js/layout-settings.js') !!}"></script>

    <!-- jQuery (if not included in core.js) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @yield('scripts')
</body>

</html>
