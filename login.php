<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<!-- paste your code in between -->
    <div class="vertiqal-main-content">
        <!-- sign in section -->
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
                <a href="">Forgot password?</a>
            </div>
            
            <!-- Login Link -->
            <div class="quipdeck-login-link">
                Don't have an account? <a href="#"><b>Sign Up</b></a>
            </div>
        </div>
    </div>
<?php include_once __DIR__ . '/includes/js.php'; ?>