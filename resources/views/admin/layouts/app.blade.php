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
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/datatables/css/dataTables.bootstrap4.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/datatables/css/responsive.bootstrap4.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('vendor/styles/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/dev.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('src/plugins/jquery-steps/jquery.steps.css') !!}">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

    @yield('styles')
</head>

<body>
    <!-- Loader -->
    <!-- @include('admin.shared.loader') -->

    <!-- Header -->
    @include('admin.shared.header')

    @include('admin.shared.sidebar')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @stack('modals')

    <!-- Scripts -->
    <script src="{!! asset('js/core.js') !!}"></script>
    <script src="{!! asset('js/script.min.js') !!}"></script>
    <script src="{!! asset('js/process.js') !!}"></script>
    <script src="{!! asset('js/layout-settings.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/jquery.dataTables.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/dataTables.bootstrap4.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/dataTables.responsive.min.js') !!}"></script>
    <script src="{!! asset('src/plugins/datatables/js/responsive.bootstrap4.min.js') !!}"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="{!! asset('src/plugins/jquery-steps/jquery.steps.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    {{-- <script src="{!! asset('vendors/scripts/steps-setting.js') !!}"></script> --}}

    <script>
        jQuery(document).ready(function() {
            jQuery(document).on("click", "[data-confirm]", function(e) {
                e.preventDefault();
                var message = jQuery(this).data('confirm') ? jQuery(this).data('confirm') : 'Are you sure?';
                if (confirm(message)) {
                    var form = jQuery('<form />').attr('method', 'post').attr('action', jQuery(this).attr(
                        'href'));
                    message != "Are you sure want to logout?" ? jQuery('<input />').attr('type', 'hidden')
                        .attr('name', '_method').attr('value', 'delete').appendTo(form) : "";
                    jQuery('<input />').attr('type', 'hidden').attr('name', '_token').attr('value', jQuery(
                        'meta[name="csrf-token"]').attr('content')).appendTo(form);
                    jQuery('body').append(form);
                    form.submit();
                }
            });
        })
    </script>
    @yield('scripts')
</body>

</html>
