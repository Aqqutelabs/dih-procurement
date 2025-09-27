<?php include_once __DIR__ . '/includes/css.php'; ?> 
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<!-- Main Content -->
<div class="vertiqal-main-content">
<!-- Reset password section -->
<div class="vertiqal-form-container" id="reset-password-section">
    <h1 class="vertiqal-form-title">Reset Password</h1>
    <div class="vertiqal-form-group"> 
        <label class="vertiqal-form-label" for="fullName">Current Password</label> 
        <input type="password" id="reset-current-password" class="vertiqal-form-input" placeholder="*******************" required> 
    </div>
    <div class="vertiqal-form-group mt-4">
        <label class="vertiqal-form-label" for="fullName">New Password</label>
        <input type="password" id="reset-new-password" class="vertiqal-form-input" placeholder="*******************" required> 
    </div>
    <button type="button" class="btn btn-primary vertiqal-continue-btn w-100 mt-5" data-dismiss="modal"> Reset Password </button>
</div>
</div> <?php include_once __DIR__ . '/includes/js.php'; ?>