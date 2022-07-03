@extends('layouts.main')

@push('styles')
<link rel="stylesheet" href="/assets/datatables/datatables.min.css">
@endpush

@push('scripts')
<script src="/assets/datatables/datatables.min.js"></script>
<script>
$(document).ready(function() {
    $('.datatable').DataTable();
});
</script>
@endpush

@section('body')
<div class="d-flex flex-row">
    <div class="bg-dark text-light d-none d-lg-block shadow overflow-auto" style="width: 300px; height: 100vh">
        <h3 class="py-4 text-center menu-title">AUCTIONET</h3>
        <ul class="nav nav-pills flex-column nav-content">@include('layouts.auctioneer.sidebar')</ul>
    </div>
    <div class="flex-grow-1 d-flex flex-column overflow-auto" style="height: 100vh">
        <div class="d-block d-lg-none">
            <div class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <span class="navbar-brand menu-title">AUCTIONET</span>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav-container">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="nav-container">
                        <ul class="navbar-nav me-auto nav-content" id="nav">@include('layouts.auctioneer.sidebar')</ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="content" class="flex-grow-1 p-4">@yield('content')</div>
        <div class="p-3 text-center">Copyright &copy; 2022, AUCTIONET</div>
    </div>
</div>
@endsection

