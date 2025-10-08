
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vertiqal Dashboard</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/dashboard.css?v=2.3">

</head>
<body class="vertiqal-body">
    <!-- Sidebar -->
    <div class="vertiqal-sidebar">
        <div class="vertiqal-logo">
            <div class="d-flex align-items-center">
                <img src="assets/img/logo.png" height="40" alt="Logo">
            </div>
        </div>

        <div class="vertiqal-nav-section">MAIN</div>
        <ul class="vertiqal-nav">
            <li class="vertiqal-nav-item">
                <a href="dashboard.php" class="vertiqal-nav-link ">
                    <i class="fas fa-th-large vertiqal-nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="tenders.php" class="vertiqal-nav-link active">
                    <i class="fas fa-file-alt vertiqal-nav-icon"></i>
                    Tenders
                </a>
            </li>
            <li class="vertiqal-nav-item" >
                <a href="bids.php" class="vertiqal-nav-link ">
                    <i class="fas fa-chart-line vertiqal-nav-icon"></i>
                    Bids
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="purchase.php" class="vertiqal-nav-link ">
                    <i class="fas fa-handshake vertiqal-nav-icon"></i>
                    Contracts & POs
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="#" class="vertiqal-nav-link">
                    <i class="fas fa-shield-alt vertiqal-nav-icon"></i>
                    Compliance
                    <button class="vertiqal-compliance-toggle">
                        <i class="fas fa-chevron-down"></i>
                    </button>
                </a>
                <div class="vertiqal-compliance-submenu" style="display: none">
                    <a href="#">AFCTA</a>
                    <a href="#">EU</a>
                    <a href="#">US</a>
                    <a href="#">China</a>
                    <a href="#">LATAM</a>
                    <a href="#">MENA</a>
                </div>
            </li>
        </ul>

        <div class="vertiqal-user-section">
            <div class="vertiqal-user-info">
                <div class="vertiqal-user-avatar"></div>
                <div class="vertiqal-user-details">
                    <h6>John Doe</h6>
                    <p>johndoe12@gmail.com</p>
                </div>
            </div>
            <a href="#" class="vertiqal-logout-btn">
                <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>
                Log Out
            </a>
        </div>
    </div>
<!-- Main Content -->
<div class="vertiqal-main-content">
    <!-- Header -->
    <div class="vertiqal-header">
        <div>
            <h1 class="vertiqal-welcome-title">Tenders</h1>
            <p class="vertiqal-welcome-subtitle">Discover and bid on available tenders</p>
        </div>
        <div class="vertiqal-header-actions">
            <button class="vertiqal-notification-btn">
                <i class="fas fa-bell"></i>
                <div class="vertiqal-notification-badge"></div>
            </button>
            <div class="vertiqal-user-menu"></div>
        </div>
    </div>

    <div class="vertiqal-dashboard-content">
        <!-- Header Tabs -->
        <div class="vertiqal-header-tabs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="d-flex flex-wrap">
                            <a href="#" class="vertiqal-tab active">All Tenders</a>
                            <a href="#" class="vertiqal-tab">Open</a>
                            <a href="#" class="vertiqal-tab">Closed</a>
                            <a href="#" class="vertiqal-tab">My Bids</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Search Bar -->
            <div class="row">
                <div class="col-12">
                    <div class="vertiqal-search-bar">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-left-0" placeholder="Search by product name, buyers and location..." style="border-left: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="row">
                <div class="col-12">
                    <div class="vertiqal-filters">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Category</label>
                                <select class="form-control vertiqal-select">
                                    <option>All Commodity</option>
                                    <option>Equipment</option>
                                    <option>Services</option>
                                    <option>Materials</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Location</label>
                                <select class="form-control vertiqal-select">
                                    <option>All Market</option>
                                    <option>Kaduna</option>
                                    <option>Lagos</option>
                                    <option>Abuja</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Status</label>
                                <select class="form-control vertiqal-select">
                                    <option>Name</option>
                                    <option>Open</option>
                                    <option>Closed</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label class="font-weight-bold mb-2 text-muted">Sort by</label>
                                <select class="form-control vertiqal-select">
                                    <option>Name</option>
                                    <option>Date</option>
                                    <option>Status</option>
                                    <option>Location</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tender Cards -->
            <div class="row">
                <div class="col-12">
                    <!-- Card 1 -->
                    @foreach ($tenders as $tender)
                    <div class="vertiqal-card">
                        <div class="vertiqal-card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="vertiqal-avatar">
                                        <i class="fas fa-tractor"></i>
                                    </div>
                                </div>

                                <div class="col">
                                    <h3 class="vertiqal-title">{{ $tender->title }}</h3>
                                    <p class="vertiqal-description">{{ $tender->description }}.</p>
                                    <div class="vertiqal-meta">
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-building"></i>
                                            <span>Northern Agro Cooperative</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Kaduna</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-boxes"></i>
                                            <span>{{ $tender->unit }}</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>{{ $tender->bip_deadline }}</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="vertiqal-tag">Equipment</div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <a href="view_tender.php" class="vertiqal-btn-open">Open</a>
                                    <div class="d-flex">
                                        <button class="vertiqal-btn-details mt-5">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <!-- Card 2 -->
                    {{-- <div class="vertiqal-card">
                        <div class="vertiqal-card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="vertiqal-avatar">
                                        <i class="fas fa-tractor"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="vertiqal-title">Farm Equipment Lease</h3>
                                    <p class="vertiqal-description">Tractors and harvesting equipment for seasonal lease.</p>
                                    <div class="vertiqal-meta">
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-building"></i>
                                            <span>Northern Agro Cooperative</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Kaduna</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-boxes"></i>
                                            <span>5 units</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>30 June 2025</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="vertiqal-tag">Equipment</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="vertiqal-btn-open">Open</button>
                                    <div class="d-flex">
                                        <button class="vertiqal-btn-details mt-5">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <!-- Card 3 -->
                    {{-- <div class="vertiqal-card">
                        <div class="vertiqal-card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <div class="vertiqal-avatar">
                                        <i class="fas fa-tractor"></i>
                                    </div>
                                </div>
                                <div class="col">
                                    <h3 class="vertiqal-title">Farm Equipment Lease</h3>
                                    <p class="vertiqal-description">Tractors and harvesting equipment for seasonal lease.</p>
                                    <div class="vertiqal-meta">
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-building"></i>
                                            <span>Northern Agro Cooperative</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Kaduna</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-boxes"></i>
                                            <span>5 units</span>
                                        </div>
                                        <div class="vertiqal-meta-item">
                                            <i class="fas fa-calendar-alt"></i>
                                            <span>30 June 2025</span>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="vertiqal-tag">Equipment</div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="vertiqal-btn-open">Open</button>
                                    <div class="d-flex">
                                        <button class="vertiqal-btn-details mt-5">View Details</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/dashboard.js"></script>


    </body>
</html>
