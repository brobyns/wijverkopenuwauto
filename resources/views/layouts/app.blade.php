<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
    </head>
    <body>
        @include('partials.navigation')
        <div id="app">
            @yield('content')
        </div>

        @include('modals.vehicleProperties.create')
        <!-- Scripts -->
        <script>
            window.addEventListener('scroll', function (e) {
                var nav = document.getElementById('nav');
                if (document.documentElement.scrollTop || document.body.scrollTop >= 200) {
                    nav.classList.add('nav-colored');
                    nav.classList.remove('nav-transparent');
                } else {
                    nav.classList.add('nav-transparent');
                    nav.classList.remove('nav-colored');
                }
            });
        </script>
    </body>
</html>
