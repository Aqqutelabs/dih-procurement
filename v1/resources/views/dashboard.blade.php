
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
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    
</head>
<body class="vertiqal-body">
    <!-- Sidebar -->
    <div class="vertiqal-sidebar">
        <div class="vertiqal-logo">
            <div class="d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" height="40" alt="Logo">
            </div>
        </div>

        <div class="vertiqal-nav-section">MAIN</div>
        <ul class="vertiqal-nav">
            <li class="vertiqal-nav-item">
                <a href="dashboard.php" class="vertiqal-nav-link active">
                    <i class="fas fa-th-large vertiqal-nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="tenders.php" class="vertiqal-nav-link ">
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
                <h1 class="vertiqal-welcome-title">Welcome back, You're approved to bid and supply</h1>
                <p class="vertiqal-welcome-subtitle">You have 3 active bids and 5 tenders closing soon</p>
            </div>
            <div class="vertiqal-header-actions">
                <button class="vertiqal-notification-btn">
                    <i class="fas fa-bell"></i>
                    <div class="vertiqal-notification-badge"></div>
                </button>
                <div class="vertiqal-user-menu"></div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="vertiqal-dashboard-content">
            <!-- Stats Cards -->
            <div class="vertiqal-stats-grid">
                <div class="vertiqal-stat-card">
                    <div class="vertiqal-stat-header">
                        <h3 class="vertiqal-stat-title">Open Tenders</h3>
                        <i class="fas fa-eye vertiqal-stat-icon"></i>
                    </div>
                    <h2 class="vertiqal-stat-value">8</h2>
                    <p class="vertiqal-stat-description">Available for bidding</p>
                    <span class="vertiqal-stat-change positive">+12%</span>
                </div>

                <div class="vertiqal-stat-card">
                    <div class="vertiqal-stat-header">
                        <h3 class="vertiqal-stat-title">Submitted Bids</h3>
                        <i class="fas fa-file-contract vertiqal-stat-icon"></i>
                    </div>
                    <h2 class="vertiqal-stat-value">12</h2>
                    <p class="vertiqal-stat-description">Total Bids Submitted</p>
                    <span class="vertiqal-stat-change positive">+8%</span>
                </div>

                <div class="vertiqal-stat-card">
                    <div class="vertiqal-stat-header">
                        <h3 class="vertiqal-stat-title">Approved POs</h3>
                        <i class="fas fa-check-circle vertiqal-stat-icon"></i>
                    </div>
                    <h2 class="vertiqal-stat-value">3</h2>
                    <p class="vertiqal-stat-description">Awarded Contracts</p>
                    <span class="vertiqal-stat-change positive">+25%</span>
                </div>

                <div class="vertiqal-stat-card">
                    <div class="vertiqal-stat-header">
                        <h3 class="vertiqal-stat-title">Deliveries Completed</h3>
                        <i class="fas fa-truck vertiqal-stat-icon"></i>
                    </div>
                    <h2 class="vertiqal-stat-value">7</h2>
                    <p class="vertiqal-stat-description">Successful delivery</p>
                    <span class="vertiqal-stat-change positive">+15%</span>
                </div>
            </div>

            <!-- Navigation Tabs -->
            <div class="vertiqal-nav-tabs">
                <button class="vertiqal-nav-tab active">Overview</button>
                <button class="vertiqal-nav-tab">Orders</button>
                <button class="vertiqal-nav-tab">Revenue</button>
                <button class="vertiqal-nav-tab">Customer</button>
                <button class="vertiqal-nav-tab">Bidding</button>
                <button class="vertiqal-nav-tab">Inventory</button>
                <button class="vertiqal-nav-tab">Payment</button>
            </div>

            <!-- Open Tenders Section -->
            <div class="vertiqal-tenders-section">
                <div class="vertiqal-tenders-header">
                    <h2 class="vertiqal-tenders-title">Open Tenders</h2>
                    <a href="#" class="vertiqal-view-all-btn">
                        <i class="fas fa-external-link-alt" style="margin-right: 5px;"></i>
                        View All
                    </a>
                </div>

                <div class="vertiqal-tender-item">
                    <div class="vertiqal-tender-header">
                        <div>
                            <h3 class="vertiqal-tender-title">Agricultural Tractors</h3>
                            <p class="vertiqal-tender-company">
                                <i class="fas fa-building vertiqal-company-icon"></i>
                                AgroTech Solutions
                            </p>
                        </div>
                        <div class="vertiqal-tender-deadline">8 days left</div>
                    </div>
                    <div class="vertiqal-tender-details">
                        <div class="vertiqal-tender-meta">
                            Quantity: 10,000kg • <i class="fas fa-calendar" style="margin: 0 4px;"></i> Deadline: Aug 5, 2024
                        </div>
                        <div class="vertiqal-tender-actions">
                            <a href="#" class="vertiqal-btn-view">View</a>
                            <button class="vertiqal-btn-bid">Bid Now</button>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-tender-item">
                    <div class="vertiqal-tender-header">
                        <div>
                            <h3 class="vertiqal-tender-title">Agricultural Tractors</h3>
                            <p class="vertiqal-tender-company">
                                <i class="fas fa-building vertiqal-company-icon"></i>
                                AgroTech Solutions
                            </p>
                        </div>
                        <div class="vertiqal-tender-deadline">8 days left</div>
                    </div>
                    <div class="vertiqal-tender-details">
                        <div class="vertiqal-tender-meta">
                            Quantity: 10,000kg • <i class="fas fa-calendar" style="margin: 0 4px;"></i> Deadline: Aug 5, 2024
                        </div>
                        <div class="vertiqal-tender-actions">
                            <a href="#" class="vertiqal-btn-view">View</a>
                            <button class="vertiqal-btn-bid">Bid Now</button>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-tender-item">
                    <div class="vertiqal-tender-header">
                        <div>
                            <h3 class="vertiqal-tender-title">Agricultural Tractors</h3>
                            <p class="vertiqal-tender-company">
                                <i class="fas fa-building vertiqal-company-icon"></i>
                                AgroTech Solutions
                            </p>
                        </div>
                        <div class="vertiqal-tender-deadline">8 days left</div>
                    </div>
                    <div class="vertiqal-tender-details">
                        <div class="vertiqal-tender-meta">
                            Quantity: 10,000kg • <i class="fas fa-calendar" style="margin: 0 4px;"></i> Deadline: Aug 5, 2024
                        </div>
                        <div class="vertiqal-tender-actions">
                            <a href="#" class="vertiqal-btn-view">View</a>
                            <button class="vertiqal-btn-bid">Bid Now</button>
                        </div>
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