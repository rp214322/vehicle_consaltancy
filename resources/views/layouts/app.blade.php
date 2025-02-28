<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/facivon.png') }}">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{!! asset('front/css/bootstrap.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/font-awesome.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/elegant-icons.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/nice-select.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/magnific-popup.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/jquery-ui.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/owl.carousel.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/slicknav.min.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('css/star-rating-svg.css') !!}" type="text/css">
    <link rel="stylesheet" href="{!! asset('front/css/style.css') !!}" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"
        rel="stylesheet" />
    @yield('styles')
</head>
<body>
    @include('shared.loader')

    @include('shared.header')

    @yield('content')

    @include('shared.footer')
    <!-- Js Plugins -->
    <script src="{!! asset('front/js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('front/js/bootstrap.bundle.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery.nice-select.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('front/js/mixitup.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery.slicknav.js') !!}"></script>
    <script src="{!! asset('front/js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('front/js/main.js') !!}"></script>
    <script src="{!! asset('js/jquery.star-rating-svg.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function() {
            jQuery(document).on("click", "[data-confirm]", function(e) {
                e.preventDefault();
                var message = jQuery(this).data('confirm') ? jQuery(this).data('confirm') : 'Are you sure?';
                if (confirm(message)) {
                    var form = jQuery('<form />').attr('method', 'post').attr('action', jQuery(this).attr('href'));
                    message != "Are you sure want to logout?" ? jQuery('<input />').attr('type', 'hidden').attr('name', '_method').attr('value', 'delete').appendTo(form) : "";
                    jQuery('<input />').attr('type', 'hidden').attr('name', '_token').attr('value', jQuery('meta[name="csrf-token"]').attr('content')).appendTo(form);
                    jQuery('body').append(form);
                    form.submit();
                }
            });
        })
    </script>
    @yield('scripts')
</body>
</html>
