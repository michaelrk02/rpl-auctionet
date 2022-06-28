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

    <script>
    @if ($errors->any())
    $(document).ready(function() {
        (new bootstrap.Modal(document.getElementById('errors-modal'))).show();
    });
    @endif
    @if (!empty(session('success')))
    $(document).ready(function() {
        (new bootstrap.Modal(document.getElementById('success-modal'))).show();
    });
    @endif
    </script>

    @stack('scripts')
  </head>
  <body>
    @if (!empty(session('success')))
        <div class="modal fade" id="success-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Success</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div class="modal fade" id="errors-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Error</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            <div class="py-2">{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @yield('body')
  </body>
</html>
