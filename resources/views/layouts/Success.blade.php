<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>

    <!-- BOOTSRAP -->
    @stack('before-style')
    @include('includes.style')
    @stack('after-style')
    {{-- <link rel="stylesheet" href="./src/main.css" /> --}}
</head>

<body>
    <!-- Navigasi -->
    @include('includes.navbar-alternatif')

    @yield('content')



    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
</body>

</html>
