<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-form-container" id="signin-section">
        
        <h1 class="vertiqal-form-title">Sign In</h1>

        <div class="vertiqal-form-group">
            <label class="vertiqal-form-label" for="fullName">Email</label>
            <input 
                type="text" 
                id="email-login" 
                class="vertiqal-form-input" 
                placeholder="Enter Email Address"
                required
            >
        </div>
        
        <div class="vertiqal-form-group mt-4">
            <label class="vertiqal-form-label" for="fullName">Password</label>
            <input 
                type="password" 
                id="password-login" 
                class="vertiqal-form-input" 
                placeholder="Enter Password"
                required
            >
        </div>
        <div class="d-flex justify-content-end mt-2">
            <a href="forgot.php">Forgot password?</a>
        </div>
        
        <div class="quipdeck-login-link">
            Don't have an account? <a href="register.php"><b>Sign Up</b></a>
        </div>
    </div>
</div>
<?php include_once __DIR__ . '/includes/js.php'; ?>