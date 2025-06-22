<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpeg') }}">

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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{!! asset('front/js/jquery.nice-select.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery-ui.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery.magnific-popup.min.js') !!}"></script>
    <script src="{!! asset('front/js/mixitup.min.js') !!}"></script>
    <script src="{!! asset('front/js/jquery.slicknav.js') !!}"></script>
    <script src="{!! asset('front/js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('front/js/main.js') !!}"></script>
    <script src="{!! asset('js/jquery.star-rating-svg.js') !!}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        (function(c,l,a,r,i,t,y){
            c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
            t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
            y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
        })(window, document, "clarity", "script", "s21cn6u47q");
    </script>
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
    <script type="text/javascript">
        var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
        (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/68406d154ab1f1190f854a0b/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
        })();
    </script>
        <script async src='https://d2mpatx37cqexb.cloudfront.net/delightchat-whatsapp-widget/embeds/embed.min.js'></script>
        <script>
            var wa_btnSetting = {
                "btnColor": "#16BE45",
                "cornerRadius": 40,
                "marginBottom": 20,
                "marginLeft": 20,
                "marginRight": 20,
                "btnPosition": "left",
                "whatsAppNumber": "917016590780",
                "welcomeMessage": "Hello",
                "zIndex": 999999,
                "btnColorScheme": "light"
            };
    
            var wa_widgetSetting = {
                "title": "BikeRider HVAC",
                "subTitle": "Business Account",
                "headerBackgroundColor": "#075e54",
                "headerColorScheme": "light",
                "greetingText": "Hi there, How may I help you?",
                "ctaText": "Chat Now",
                "btnColor": "#25d366",
                "cornerRadius": 40,
                "welcomeMessage": "Hello",
                "btnColorScheme": "light",
                "brandImage": "https://bikerider.infy.uk/front/img/logo.png",
                "darkHeaderColorScheme": {
                    "title": "#333333",
                    "subTitle": "#4F4F4F"
                }
            };
    
            window.onload = () => {
                // Embed the WhatsApp button
                _waEmbed(wa_btnSetting, wa_widgetSetting);
    
                // Show the label once the widget is loaded
                document.getElementById('whatsapp-label').style.display = 'block';
            };
        </script>
    </div>
    @yield('scripts')
</body>
</html>
