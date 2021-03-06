<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Laravel Blog | Starter</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('css')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">


        @include('includes.dashboard.navbar')

        @include('includes.dashboard.sidebar')

        @yield('content')

        @include('includes.dashboard.controlSidebar')


        @include('includes.dashboard.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{asset('js/app.js')}}"></script>
    @yield('js')
</body>

</html>
