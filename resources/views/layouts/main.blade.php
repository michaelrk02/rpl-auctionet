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
    <!-- Icons -->
    <link href="/assets/bootstrap/bootstrap-icons.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/assets/jquery/jquery-3.6.0.min.js"></script>

    <!-- Marked -->
    <script src="/assets/marked/marked.min.js"></script>

    <!-- Auctionet -->
    <script src="/assets/auctionet/main.js"></script>

    <title>@yield('title') | AUCTIONET</title>

    @stack('styles')
    @stack('scripts')
  </head>
  <body>
    @yield('body')
  </body>
</html>
