<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/custom.css') }}" rel="stylesheet">

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet" />


</head>
<body  class="g-sidenav-show  bg-gray-200">

  @include('layouts.inc.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
    @include('layouts.inc.adminnav')

    <div class="container-fluid py-4">
        
          @yield('content')
        
    </div>
  
  </main>
  
     <!--   Core JS Files   -->
  <!-- 
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  -->

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js')}}"></script>
  
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('admin/js/material-dashboard.min.js?v=3.0.4')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

  @yield('scripts')

  @if (session('status'))
    <script>
      swal("{{session('status')}}");
    </script>
  @endif

</body>
</html>
