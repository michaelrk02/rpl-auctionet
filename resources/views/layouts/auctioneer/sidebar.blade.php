@guest('auctioneer')
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.auth.login') active @endif" href="{{ route('auctioneer.auth.login') }}"><i class="bi bi-box-arrow-in-right me-2"></i> Login</a></li>    
@endguest
@auth('auctioneer')
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.dashboard') active @endif" href="{{ route('auctioneer.dashboard') }}"><i class="bi bi-grid me-2"></i> Dashboard</a></li>
    <li class="nav-item"><span class="nav-link disabled">PRODUCT</span></li>
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.produk.tambah') active @endif" href="{{ route('auctioneer.produk.tambah') }}"><i class="bi bi-plus-lg me-2"></i> New Product</a></li>
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.produk.semua') active @endif" href="{{ route('auctioneer.produk.semua') }}"><i class="bi bi-boxes me-2"></i> Products List</a></li>
    <li class="nav-item"><span class="nav-link disabled">SHIPMENT</span></li>
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.pengiriman.kirim') active @endif" href="{{ route('auctioneer.pengiriman.kirim') }}"><i class="bi bi-send me-2"></i> Dispatch</a></li>
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.pengiriman.semua') active @endif" href="{{ route('auctioneer.pengiriman.semua') }}"><i class="bi bi-truck me-2"></i> Shipments List</a></li>
    <li class="nav-item"><span class="nav-link disabled">BALANCE</span></li>
    <li class="nav-item"><a class="nav-link link-light @if (Route::currentRouteName() === 'auctioneer.saldo.semua') active @endif" href="{{ route('auctioneer.saldo.semua') }}"><i class="bi bi-cash me-2"></i> Balance Requests</a></li>
    <li class="nav-item"><span class="nav-link disabled">SESSION</span></li>
    <li class="nav-item"><a class="nav-link link-light" href="{{ route('auctioneer.auth.logout') }}"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
@endauth

