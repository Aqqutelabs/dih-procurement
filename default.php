<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Vertiqal - Vendor Registration</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div class="vertiqal-container">
        <!-- Sidebar -->
        <div class="vertiqal-sidebar">
            <div class="w-100 pl-3">
                <a href="#" class="vertiqal-logo">
                    <img src="assets/img/logo.png">
                </a>
            </div>
            
            <div class="vertiqal-progress-title mt-4">Vendor Registration</div>
            
            <div class="vertiqal-progress-steps">
                <div class="vertiqal-progress-step">
                    <div class="vertiqal-step-indicator active">✓</div>
                    <span class="vertiqal-step-text">Account Creation</span>
                    <div class="vertiqal-step-connector"></div>
                </div>
                
                <div class="vertiqal-progress-step">
                    <div class="vertiqal-step-indicator inactive">2</div>
                    <span class="vertiqal-step-text">Business Profile Setup</span>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="vertiqal-main-content">
            <!-- create container -->
            <div class="vertiqal-form-container" hidden id="create-account">
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
            <!-- role selection -->
            <div class="vertiqal-form-container" hidden id="role-selection">
                <h2 class="quipdeck-form-title">Role Selection</h2>
        
                <form>
                    <!-- User Type Selection -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">What type of user are you registering as?</label>
                        <div class="row">
                            <div class="col-md-6 col-12 mb-3 mb-md-0">
                                <select class="form-control quipdeck-form-control">
                                    <option>Vendor</option>
                                    <option>Customer</option>
                                    <option>Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 col-12">
                                <select class="form-control quipdeck-form-control">
                                    <option>Product categories offered</option>
                                    <option>Electronics</option>
                                    <option>Clothing</option>
                                    <option>Home & Garden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Company Type -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">Company type</label>
                        <div class="quipdeck-checkbox-group">
                            <div class="quipdeck-checkbox-item">
                                <input type="checkbox" name="company_type" class="quipdeck-checkbox" id="aggregator" checked>
                                <label class="quipdeck-checkbox-label" for="aggregator">Aggregator</label>
                            </div>
                            <div class="quipdeck-checkbox-item">
                                <input type="checkbox" name="company_type" class="quipdeck-checkbox" id="cooperative">
                                <label class="quipdeck-checkbox-label" for="cooperative">Cooperative</label>
                            </div>
                            <div class="quipdeck-checkbox-item">
                                <input type="checkbox" name="company_type" class="quipdeck-checkbox" id="sme">
                                <label class="quipdeck-checkbox-label" for="sme">SME</label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Business Registration Cert -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">Business Registration Cert</label>
                        <div class="quipdeck-file-upload">
                            <input type="file" class="d-none" id="business-cert">
                            <label for="business-cert" class="d-block" style="cursor: pointer;">
                                <div class="quipdeck-file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="quipdeck-file-upload-text">Choose a file or drag and drop it here</div>
                                <div class="quipdeck-file-upload-subtext">JPEG, PNG, PDF and WORD formats, up to 50MB</div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Tax ID -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">Tax ID (Optional)</label>
                        <div class="quipdeck-file-upload">
                            <input type="file" class="d-none" id="tax-id">
                            <label for="tax-id" class="d-block" style="cursor: pointer;">
                                <div class="quipdeck-file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="quipdeck-file-upload-text">Choose a file or drag and drop it here</div>
                                <div class="quipdeck-file-upload-subtext">JPEG, PNG, PDF and WORD formats, up to 50MB</div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Utility Bill -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">Utility bill for address verification</label>
                        <div class="quipdeck-file-upload">
                            <input type="file" class="d-none" id="utility-bill">
                            <label for="utility-bill" class="d-block" style="cursor: pointer;">
                                <div class="quipdeck-file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="quipdeck-file-upload-text">Choose a file or drag and drop it here</div>
                                <div class="quipdeck-file-upload-subtext">JPEG, PNG, PDF and WORD formats, up to 50MB</div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Directors name / CV -->
                    <div class="quipdeck-form-group">
                        <label class="quipdeck-form-label">Directors name / CV</label>
                        <div class="quipdeck-file-upload">
                            <input type="file" class="d-none" id="directors-cv">
                            <label for="directors-cv" class="d-block" style="cursor: pointer;">
                                <div class="quipdeck-file-upload-icon">
                                    <i class="fas fa-cloud-upload-alt"></i>
                                </div>
                                <div class="quipdeck-file-upload-text">Choose a file or drag and drop it here</div>
                                <div class="quipdeck-file-upload-subtext">JPEG, PNG, PDF and WORD formats, up to 50MB</div>
                            </label>
                        </div>
                    </div>
                    
                    <!-- Terms and Conditions -->
                    <div class="quipdeck-terms-checkbox">
                        <div class="quipdeck-checkbox-item">
                            <input type="checkbox" class="quipdeck-checkbox" id="terms" checked>
                            <label class="quipdeck-terms-text" for="terms">Accept platform terms and procurement guidelines</label>
                        </div>
                    </div>
                    
                    <!-- Register Button -->
                    <button type="button" class="btn quipdeck-btn-primary btn-primary" data-toggle="modal" data-target="#exampleModal">Register</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="vertiqal-success-icon">
                                        <i class="fa fa-check fa-2x"></i>
                                    </div>
                                    <h2 class="vertiqal-success-title">Account Created Successfully!</h2>
                                    <p class="vertiqal-success-description">
                                        Welcome to the platform! Your account has been set up and you can continue to your dashboard
                                    </p>
                                    <button type="button" class="btn btn-primary vertiqal-continue-btn w-100" data-dismiss="modal">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Login Link -->
                    <div class="quipdeck-login-link">
                        Already have an account? <a href="#">Sign In</a>
                    </div>
                </form>
            </div>

            <!-- sign in section -->
            <div class="vertiqal-form-container" hidden id="signin-section">
                
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

            
            <!-- forgot password section -->
            <div class="vertiqal-form-container" hidden id="forgot-section">
                
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
                    Remember Password? <a href="#"><b>Sign In</b></a>
                </div>
            </div>
            
            <!-- Verification code section -->
            <div class="vertiqal-form-container" hidden id="verification-section">
                
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

            
            <!-- Reset password section -->
            <div class="vertiqal-form-container" id="reset-password-section">
                
                <h1 class="vertiqal-form-title">Reset Password</h1>

                
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="fullName">Current Password</label>
                    <input
                        type="password" 
                        id="reset-current-password" 
                        class="vertiqal-form-input" 
                        placeholder="*******************"
                        required
                    >
                </div>
                
                <div class="vertiqal-form-group mt-4">
                    <label class="vertiqal-form-label" for="fullName">New Password</label>
                    <input
                        type="password" 
                        id="reset-new-password" 
                        class="vertiqal-form-input" 
                        placeholder="*******************"
                        required
                    >
                </div>
                
                <button type="button" class="btn btn-primary vertiqal-continue-btn w-100 mt-5" data-dismiss="modal">
                    Reset Password
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script>
        // File upload functionality
        document.querySelectorAll('.quipdeck-file-upload input[type="file"]').forEach(input => {
            input.addEventListener('change', function(e) {
                const fileName = e.target.files[0]?.name;
                const label = e.target.parentElement.querySelector('.quipdeck-file-upload-text');
                if (fileName) {
                    label.textContent = fileName;
                    e.target.parentElement.parentElement.style.borderColor = '#28a745';
                    e.target.parentElement.parentElement.style.backgroundColor = '#f8fff9';
                }
            });
        });

        // Drag and drop functionality
        document.querySelectorAll('.quipdeck-file-upload').forEach(upload => {
            upload.addEventListener('dragover', function(e) {
                e.preventDefault();
                this.style.borderColor = '#007bff';
                this.style.backgroundColor = '#f8f9fa';
            });

            upload.addEventListener('dragleave', function(e) {
                e.preventDefault();
                this.style.borderColor = '#dee2e6';
                this.style.backgroundColor = '#fff';
            });

            upload.addEventListener('drop', function(e) {
                e.preventDefault();
                this.style.borderColor = '#28a745';
                this.style.backgroundColor = '#f8fff9';
                
                const files = e.dataTransfer.files;
                const input = this.querySelector('input[type="file"]');
                const label = this.querySelector('.quipdeck-file-upload-text');
                
                if (files.length > 0) {
                    input.files = files;
                    label.textContent = files[0].name;
                }
            });
        });
    </script>
</body>
</html>