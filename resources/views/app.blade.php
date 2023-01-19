<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'گردان مالک اشتر') }}</title>

        <!-- Fonts -->
        <style>
            @font-face {
                font-family: 'Vazir';
                src: url({{asset('fonts/Vazir.ttf')}});
            }
            @font-face {
                font-family: 'Ordibehesht';
                src: url("{{asset('fonts/A Ordibehesht shablon.ttf')}}");
            }
            @font-face {
                font-family: 'Sahel';
                src: url("{{asset('fonts/Sahel.ttf')}}");
            }
            @font-face {
                font-family: 'KhodKar';
                src: url("{{asset('fonts/Far_khodkar.ttf')}}");
            }
            @font-face {
                font-family: 'IranSans';
                src: url("{{asset('fonts/Iranian-Sans.ttf')}}");
            }
        </style>
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia


        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{asset('yadvare.js')}}"></script>
    </body>
</html>
