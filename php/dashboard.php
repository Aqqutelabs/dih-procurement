<?php include_once __DIR__ . '/includes/admin/start.php'; ?>
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
<?php include_once __DIR__ . '/includes/admin/end.php'; ?>