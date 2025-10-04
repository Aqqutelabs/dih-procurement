<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<!-- Main Content -->
<div class="vertiqal-main-content">
            
    <!-- Verification code section -->
    <div class="vertiqal-form-container" id="verification-section">
        
        <h1 class="vertiqal-form-title">Verification</h1>
        <p class="vertiqal-form-subtitle">Enter the verification code, we just sent to your email address</p>

        <div class="verification-code">
            <input type="text" maxlength="1" name="verify" id="box_verify_one">
            <input type="text" maxlength="1" name="verify" id="box_verify_two">
            <input type="text" maxlength="1" name="verify" id="box_verify_three">
            <input type="text" maxlength="1" name="verify" id="box_verify_four">
        </div>
        
        <!-- Login Link -->
        <div class="quipdeck-login-link text-center col-lg-6 col-sm-12 pl-2">
            Remember Password? <a href="#"><b>Sign In</b></a>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/includes/js.php'; ?>