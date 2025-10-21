<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertiqal | @yield('bartitle')</title>

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    @yield('local_css')
</head>

<body class="vertiqal-body">
    <!-- Sidebar -->
    <div class="vertiqal-sidebar">
        <div class="vertiqal-logo">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/logo/transparent.png') }}" style="height: 60px">
            </div>
        </div>

        <div class="vertiqal-nav-section">MAIN</div>
        @if(auth()->user()->role == 'buyer')
        <ul class="vertiqal-nav">
            <li class="vertiqal-nav-item">
                <a href="{{ url('dashboard') }}"
                    class="vertiqal-nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large vertiqal-nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ route('buyer.tenders') }}" class="vertiqal-nav-link {{ Route::is('buyer.tenders') ? 'active' : '' }}">
                    <i class="fas fa-file-alt vertiqal-nav-icon"></i>
                    Tenders
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ url('bids') }}" class="vertiqal-nav-link {{ Request::is('bids') || Request::is('bids/create') ? 'active' : '' }}">
                    <i class="fas fa-chart-line vertiqal-nav-icon"></i>
                    Bids
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ url('contracts') }}"
                    class="vertiqal-nav-link {{ Request::is('contracts') ? 'active' : '' }}">
                    <i class="fas fa-handshake vertiqal-nav-icon"></i>
                    Contracts & POs
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="#" class="vertiqal-nav-link">
                    <i class="fas fa-shield-alt vertiqal-nav-icon"></i>
                    Compliance
                    <button type="button" class="vertiqal-compliance-toggle">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </a>
                <div class="vertiqal-compliance-submenu" style="display: none">
                    <a href="#" class="{{ Request::is('compliance/afcta') ? 'active' : '' }}">AFCTA</a>
                    <a href="#" class="{{ Request::is('compliance/eu') ? 'active' : '' }}">EU</a>
                    <a href="#" class="{{ Request::is('compliance/us') ? 'active' : '' }}">US</a>
                    <a href="#" class="{{ Request::is('compliance/china') ? 'active' : '' }}">China</a>
                    <a href="#" class="{{ Request::is('compliance/latam') ? 'active' : '' }}">LATAM</a>
                    <a href="#" class="{{ Request::is('compliance/mena') ? 'active' : '' }}">MENA</a>
                </div>
            </li>
        </ul>
        @else
        <ul class="vertiqal-nav">
            <li class="vertiqal-nav-item">
                <a href="{{ url('dashboard') }}"
                    class="vertiqal-nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large vertiqal-nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ url('tenders') }}" class="vertiqal-nav-link {{ Request::is('tenders') || Request::is('view_tender') ? 'active' : '' }}">
                    <i class="fas fa-file-alt vertiqal-nav-icon"></i>
                    Tenders
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ url('bids') }}" class="vertiqal-nav-link {{ Request::is('bids') || Request::is('bids/create') ? 'active' : '' }}">
                    <i class="fas fa-chart-line vertiqal-nav-icon"></i>
                    Bids
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="{{ url('contracts') }}"
                    class="vertiqal-nav-link {{ Request::is('contracts') ? 'active' : '' }}">
                    <i class="fas fa-handshake vertiqal-nav-icon"></i>
                    Contracts & POs
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="#" class="vertiqal-nav-link">
                    <i class="fas fa-shield-alt vertiqal-nav-icon"></i>
                    Compliance
                    <button type="button" class="vertiqal-compliance-toggle">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </a>
                <div class="vertiqal-compliance-submenu" style="display: none">
                    <a href="#" class="{{ Request::is('compliance/afcta') ? 'active' : '' }}">AFCTA</a>
                    <a href="#" class="{{ Request::is('compliance/eu') ? 'active' : '' }}">EU</a>
                    <a href="#" class="{{ Request::is('compliance/us') ? 'active' : '' }}">US</a>
                    <a href="#" class="{{ Request::is('compliance/china') ? 'active' : '' }}">China</a>
                    <a href="#" class="{{ Request::is('compliance/latam') ? 'active' : '' }}">LATAM</a>
                    <a href="#" class="{{ Request::is('compliance/mena') ? 'active' : '' }}">MENA</a>
                </div>
            </li>
        </ul>
        @endif

        <div class="vertiqal-user-section">
            <div class="vertiqal-user-info">
                <div class="vertiqal-user-avatar"></div>
                <div class="vertiqal-user-details">
                    <h6>{{ auth()->user()->name }}</h6>
                    <p>{{ auth()->user()->email }}</p>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#" class="vertiqal-logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>
                Log Out
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="vertiqal-main-content">

        @if (!Request::is('view_tender') && !Route::is('bids.create') && !Request::is('bids') && !Route::is('buyer.tenders'))
        <!-- Header -->
        <div class="vertiqal-header">
            <div>
                <h1 class="vertiqal-welcome-title">@yield('title')</h1>
                <p class="vertiqal-welcome-subtitle">@yield('subtitle')</p>
            </div>
            <div class="vertiqal-header-actions">
                <button class="vertiqal-notification-btn">
                    <i class="fas fa-bell"></i>
                    <div class="vertiqal-notification-badge"></div>
                </button>
                <div class="vertiqal-user-menu"></div>
            </div>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @yield('local_js')
</body>

</html>
