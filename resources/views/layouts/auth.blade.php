<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="https://cdn.tailwindcss.com"></script>
        <title>WG - @yield('title')</title>

        @yield('style')
    </head>
    <body @yield('body_style')>
        @yield('content')

        @yield('script')
    </body>
</html>
