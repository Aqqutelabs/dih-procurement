<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-form-container" id="forgot-section">
        
        <h1 class="vertiqal-form-title">Forgot Password</h1>
        <p class="vertiqal-form-subtitle">To reset your password, Enter the email address linked with your account</p>

        <div class="vertiqal-form-group">
            <label class="vertiqal-form-label" for="fullName">Email</label>
            <input
                type="text" 
                id="forgot-email" 
                class="vertiqal-form-input" 
                placeholder="Segunmodasola@gmail.com"
                required
            >
        </div>
        
        <!-- Login Link -->
        <div class="quipdeck-login-link">
            Remember Password? <a href="login.php"><b>Sign In</b></a>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/includes/js.php'; ?>