<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
</head> 
<body>
    @include('partials.clienteheader')
    @yield('header')
    @include('partials.clientenav')
    @yield('main')
    @yield('footer')
    @include('partials.clientefooter')
</body>
</html>