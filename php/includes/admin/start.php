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
                <a href="dashboard.php" class="vertiqal-nav-link <?= basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
                    <i class="fas fa-th-large vertiqal-nav-icon"></i>
                    Dashboard
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="tenders.php" class="vertiqal-nav-link <?= basename($_SERVER['PHP_SELF']) == 'tenders.php' ? 'active' : ''; ?>">
                    <i class="fas fa-file-alt vertiqal-nav-icon"></i>
                    Tenders
                </a>
            </li>
            <li class="vertiqal-nav-item" >
                <a href="bids.php" class="vertiqal-nav-link <?= basename($_SERVER['PHP_SELF']) == 'bids.php' || basename($_SERVER['PHP_SELF']) == "add_bid.php" ? 'active' : ''; ?>">
                    <i class="fas fa-chart-line vertiqal-nav-icon"></i>
                    Bids
                </a>
            </li>
            <li class="vertiqal-nav-item">
                <a href="purchase.php" class="vertiqal-nav-link <?= basename($_SERVER['PHP_SELF']) == "purchase.php" || basename($_SERVER['PHP_SELF']) == "view_purchase.php" ? 'active' : ''; ?>">
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
