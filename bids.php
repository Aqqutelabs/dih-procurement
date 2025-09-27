<?php include_once __DIR__ . '/includes/admin/start.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-dashboard-content">
        <div class="vertiqal-bid-header">
            <div>
                <h1 class="vertiqal-bid-title">Bid Management</h1>
                <p class="vertiqal-bid-subtitle">Monitor your bid submissions and track their progress</p>
            </div>
            <a href="add_bid.php" class="btn btn-primary vertiqal-add-btn">
                <i class="fas fa-plus mr-2"></i>Add New Bids
            </a>
        </div>

        <ul class="nav nav-tabs vertiqal-nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#all-bids" data-toggle="tab">All Bids</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#submitted" data-toggle="tab">Submitted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#under-review" data-toggle="tab">Under Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#accepted" data-toggle="tab">Accepted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#rejected" data-toggle="tab">Rejected</a>
            </li>
        </ul>

        <div class="vertiqal-filters-row">
            <div class="row">
                <div class="col-md-3">
                    <div class="vertiqal-search-wrapper">
                        <i class="fas fa-search vertiqal-search-icon"></i>
                        <input type="text" class="form-control vertiqal-search-input" placeholder="Search the tender title and buyer's name...">
                    </div>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
                        <option>Status</option>
                        <option>Under Review</option>
                        <option>Accepted</option>
                        <option>Rejected</option>
                        <option>Submitted</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
                        <option>Category</option>
                        <option>Grains</option>
                        <option>Livestock</option>
                        <option>Vegetables</option>
                        <option>Fruits</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select class="form-control">
                        <option>Location</option>
                        <option>Kano</option>
                        <option>Lagos</option>
                        <option>Abuja</option>
                        <option>Kaduna</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-control">
                        <option>Date Range</option>
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 3 months</option>
                        <option>Last 6 months</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="vertiqal-table-wrapper">
            <table class="table vertiqal-table">
                <thead>
                    <tr>
                        <th>Tender Title</th>
                        <th>Buyer</th>
                        <th>Category</th>
                        <th>Bid Amount</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Submitted On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                        <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                        <td><span class="vertiqal-category-badge">Grains</span></td>
                        <td class="vertiqal-amount">₦3,500,000</td>
                        <td class="vertiqal-location">Kano</td>
                        <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                        <td class="vertiqal-date">15 Jul 2025</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu vertiqal-actions-menu">
                                    <a class="dropdown-item vertiqal-edit-action" href="#">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-upload-action" href="#">
                                        <i class="fas fa-upload"></i> Upload Docs
                                    </a>
                                    <a class="dropdown-item vertiqal-delete-action" href="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                        <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                        <td><span class="vertiqal-category-badge">Grains</span></td>
                        <td class="vertiqal-amount">₦3,500,000</td>
                        <td class="vertiqal-location">Kano</td>
                        <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                        <td class="vertiqal-date">15 Jul 2025</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu vertiqal-actions-menu">
                                    <a class="dropdown-item vertiqal-edit-action" href="#">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-upload-action" href="#">
                                        <i class="fas fa-upload"></i> Upload Docs
                                    </a>
                                    <a class="dropdown-item vertiqal-delete-action" href="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                        <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                        <td><span class="vertiqal-category-badge">Grains</span></td>
                        <td class="vertiqal-amount">₦3,500,000</td>
                        <td class="vertiqal-location">Kano</td>
                        <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                        <td class="vertiqal-date">15 Jul 2025</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu vertiqal-actions-menu">
                                    <a class="dropdown-item vertiqal-edit-action" href="#">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-upload-action" href="#">
                                        <i class="fas fa-upload"></i> Upload Docs
                                    </a>
                                    <a class="dropdown-item vertiqal-delete-action" href="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                        <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                        <td><span class="vertiqal-category-badge">Grains</span></td>
                        <td class="vertiqal-amount">₦3,500,000</td>
                        <td class="vertiqal-location">Kano</td>
                        <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                        <td class="vertiqal-date">15 Jul 2025</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu vertiqal-actions-menu">
                                    <a class="dropdown-item vertiqal-edit-action" href="#">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-upload-action" href="#">
                                        <i class="fas fa-upload"></i> Upload Docs
                                    </a>
                                    <a class="dropdown-item vertiqal-delete-action" href="#">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/includes/admin/end.php'; ?>