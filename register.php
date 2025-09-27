<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<!-- Main Content -->
<div class="vertiqal-main-content">
    <!-- create container -->
    <div class="vertiqal-form-container" id="create-account">
        <h1 class="vertiqal-form-title">Create an Account</h1>
        
        <form class="vertiqal-form-grid" id="vertiqalRegistrationForm">
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="fullName">Full Name</label>
                <input 
                    type="text" 
                    id="fullName" 
                    class="vertiqal-form-input" 
                    placeholder="Stephen James"
                    required
                >
            </div>
            
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="email">Email</label>
                <input 
                    type="email" 
                    id="email" 
                    class="vertiqal-form-input" 
                    placeholder="stephen12@gmail.com"
                    required
                >
            </div>
            
            <div class="vertiqal-form-row">
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        class="vertiqal-form-input" 
                        placeholder="••••••••••••••••"
                        required
                    >
                </div>
                
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="confirmPassword">Confirm Password</label>
                    <input 
                        type="password" 
                        id="confirmPassword" 
                        class="vertiqal-form-input" 
                        placeholder="••••••••••••••"
                        required
                    >
                </div>
            </div>
            
            <div class="vertiqal-form-row">
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="country">Country</label>
                    <select id="country" class="vertiqal-form-select" required>
                        <option value="nigeria" selected>Nigeria</option>
                        <option value="ghana">Ghana</option>
                        <option value="kenya">Kenya</option>
                        <option value="south-africa">South Africa</option>
                        <option value="egypt">Egypt</option>
                    </select>
                </div>
                
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="phoneNumber">Phone Number</label>
                    <input 
                        type="tel" 
                        id="phoneNumber" 
                        class="vertiqal-form-input" 
                        placeholder="08066340892"
                        required
                    >
                </div>
            </div>
            
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="businessName">Business Name</label>
                <input 
                    type="text" 
                    id="businessName" 
                    class="vertiqal-form-input" 
                    placeholder="FreshFarm Ltd"
                    required
                >
            </div>
            
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label">Select if you want to be</label>
                <div class="vertiqal-radio-group">
                    <div class="vertiqal-radio-option" onclick="selectRole('vendor')">
                        <div class="vertiqal-radio-input checked" id="vendorRadio"></div>
                        <span class="vertiqal-radio-label">Vendor</span>
                    </div>
                    
                    <div class="vertiqal-radio-option" onclick="selectRole('buyer')">
                        <div class="vertiqal-radio-input" id="buyerRadio"></div>
                        <span class="vertiqal-radio-label">Buyer</span>
                    </div>
                </div>
            </div>
            
            <button type="submit" class="vertiqal-submit-btn">
                Continue to Setup
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14m-7-7 7 7-7 7"/>
                </svg>
            </button>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/includes/js.php'; ?>