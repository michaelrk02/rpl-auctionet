<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/assets/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="/assets/bootstrap/bootstrap.bundle.min.js"></script>

    <title>@yield('title') | AUCTIONET</title>

    @stack('styles')
    @stack('scripts')
  </head>
  <body>
    @yield('body')
  </body>
</html>
