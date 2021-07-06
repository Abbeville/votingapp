<!DOCTYPE html>

<html lang="en" class="light">
 <meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="utf-8" />
    <link href="#" rel="shortcut icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="ABBEVILLE" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard - Vote App </title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}" />
    <!-- END: CSS Assets-->
  </head>
  <!-- END: Head -->
  <body class="app">
    <!-- BEGIN: Mobile Menu -->
    @include('layouts.partials._mobile-menu')
    <!-- END: Mobile Menu -->
    <div class="flex">
      <!-- BEGIN: Side Menu -->
      @include('layouts.partials._side-nav')
      <!-- END: Side Menu -->
      <!-- BEGIN: Content -->
      <div class="content">
        <!-- BEGIN: Top Bar -->
        @include('layouts.partials._top-bar')
        <!-- END: Top Bar -->
        @include('layouts.partials._flash')
        @yield('content')
      </div>
      <!-- END: Content -->
    </div>
    
    <!-- BEGIN: JS Assets-->
    <script src="{{ asset('dist/js/app.js') }}"></script>
    @include('layouts.partials.scripts')
    <!-- END: JS Assets-->
  </body>

</html>
