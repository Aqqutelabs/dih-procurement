<?php include_once __DIR__ . '/includes/admin/start.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-dashboard-content">

        <div class="vertiqal-main-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="vertiqal-header-title">Contracts & Purchase Orders</h1>
                    <p class="vertiqal-header-subtitle mb-0">Manage and track your contracts and purchase orders</p>
                </div>
                <a class="btn btn-primary vertiqal-export-btn">
                    <i class="fas fa-download me-2 mr-2"></i>Export Data
                </a>
            </div>
        </div>

        <div class="row mb-4 mt-4">
            <div class="col-lg-3 col-md-6">
                <div class="vertiqal-stats-card">
                    <div class="vertiqal-stat-label">Active Contracts</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="vertiqal-stat-value">12</div>
                        <div class="vertiqal-stat-icon vertiqal-icon-green">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="vertiqal-stats-card">
                    <div class="vertiqal-stat-label">Total Contract Value</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="vertiqal-stat-value">₦2.1M</div>
                        <div class="vertiqal-stat-icon vertiqal-icon-blue">
                            <i class="fas fa-naira-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="vertiqal-stats-card">
                    <div class="vertiqal-stat-label">Pending Actions</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="vertiqal-stat-value">3</div>
                        <div class="vertiqal-stat-icon vertiqal-icon-orange">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="vertiqal-stats-card">
                    <div class="vertiqal-stat-label">Delivered Orders</div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="vertiqal-stat-value">2</div>
                        <div class="vertiqal-stat-icon vertiqal-icon-purple">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation Tabs -->
        <ul class="nav nav-tabs vertiqal-nav-tabs">
            <li class="nav-item">
                <a class="nav-link vertiqal-nav-link active" href="#contracts" data-toggle="tab">Contract Overviews</a>
            </li>
            <li class="nav-item">
                <a class="nav-link vertiqal-nav-link" href="#purchase-orders" data-toggle="tab">Purchase Orders</a>
            </li>
        </ul>

        <!-- Search and Filter Bar -->
        <div class="vertiqal-search-filter-bar">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-7 mb-3 mb-md-0">
                    <div class="position-relative">
                        <i class="fas fa-search vertiqal-search-icon"></i>
                        <input type="text" class="form-control vertiqal-search-input" placeholder="Search contracts, POs or buyers...">
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <select class="form-control">
                        <option>Status</option>
                        <option>Signed</option>
                        <option>Pending</option>
                        <option>Draft</option>
                        <option>Invalid</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Data Table -->
        <div class="vertiqal-table-container">
            <table class="table vertiqal-data-table">
                <thead class="vertiqal-table-header">
                    <tr>
                        <th>Contract ID</th>
                        <th>Vendor's Name</th>
                        <th>Commodity</th>
                        <th>Amount</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="vertiqal-table-row">
                        <td class="vertiqal-contract-id">CNT-2025-001</td>
                        <td class="vertiqal-vendor-name">Office Supplies P.</td>
                        <td>Maize</td>
                        <td class="vertiqal-amount">₦500,000</td>
                        <td>15-09-2025</td>
                        <td>20-09-2025</td>
                        <td><span class="vertiqal-status-badge vertiqal-status-signed">Signed</span></td>
                    </tr>
                    <tr class="vertiqal-table-row">
                        <td class="vertiqal-contract-id">CNT-2025-001</td>
                        <td class="vertiqal-vendor-name">Office Supplies P.</td>
                        <td>Maize</td>
                        <td class="vertiqal-amount">₦500,000</td>
                        <td>15-09-2025</td>
                        <td>20-09-2025</td>
                        <td><span class="vertiqal-status-badge vertiqal-status-pending">Pending</span></td>
                    </tr>
                    <tr class="vertiqal-table-row">
                        <td class="vertiqal-contract-id">CNT-2025-001</td>
                        <td class="vertiqal-vendor-name">Office Supplies P.</td>
                        <td>Maize</td>
                        <td class="vertiqal-amount">₦500,000</td>
                        <td>15-09-2025</td>
                        <td>20-09-2025</td>
                        <td><span class="vertiqal-status-badge vertiqal-status-signed">Signed</span></td>
                    </tr>
                    <tr class="vertiqal-table-row">
                        <td class="vertiqal-contract-id">CNT-2025-001</td>
                        <td class="vertiqal-vendor-name">Office Supplies P.</td>
                        <td>Maize</td>
                        <td class="vertiqal-amount">₦500,000</td>
                        <td>15-09-2025</td>
                        <td>20-09-2025</td>
                        <td><span class="vertiqal-status-badge vertiqal-status-invalid">Invalid</span></td>
                    </tr>
                    <tr class="vertiqal-table-row">
                        <td class="vertiqal-contract-id">CNT-2025-001</td>
                        <td class="vertiqal-vendor-name">Office Supplies P.</td>
                        <td>Maize</td>
                        <td class="vertiqal-amount">₦500,000</td>
                        <td>15-09-2025</td>
                        <td>20-09-2025</td>
                        <td><span class="vertiqal-status-badge vertiqal-status-draft">Draft</span></td>
                    </tr>
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="vertiqal-pagination-container">
                <div class="vertiqal-pagination-info">
                    Showing 5 of 5 users
                </div>
                <div class="vertiqal-pagination-nav">
                    <button class="btn" disabled>Previous</button>
                    <button class="btn" disabled>Next</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/includes/admin/end.php'; ?>