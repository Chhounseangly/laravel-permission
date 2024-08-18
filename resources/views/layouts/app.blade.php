<!-- Stored in resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    <style>
        html,
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body class="px-32 py-5">
    @include('includes.nav_bar')
    <main>
        @yield('content')
    </main>
</body>

</html>
