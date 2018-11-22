
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{$settings->title}}</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body {
  padding-top: 54px;
}

@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}
    </style>

  </head>

  <body>

@include('includes.frontend.nav');

    <!-- Page Content -->
    <div class="container">

      <div class="row">




        @yield('content')



        <!-- Sidebar Widgets Column -->
        @include('includes.frontend.sideBar');

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    @include('includes.frontend.footer');

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('css/app.css')}}"></script>

  </body>

</html>
