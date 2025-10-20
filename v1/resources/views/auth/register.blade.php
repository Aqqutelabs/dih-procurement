<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Vertiqal - Vendor Registration</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<body>
    <div class="vertiqal-container">
        <!-- Sidebar -->
        <div class="vertiqal-sidebar">
            <div class="w-100 pl-3">
                <a href="#" class="vertiqal-logo">
                    <img src="{{ asset('assets/img/logo/transparent.png') }}" style="height: 60px">
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
        <div class="vertiqal-main-content">
            <div class="vertiqal-form-container" id="create-account">
                <h1 class="vertiqal-form-title">Create an Account</h1>
                <form class="vertiqal-form-grid" id="vertiqalRegistrationForm" action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="vertiqal-form-group">
                        <label class="vertiqal-form-label" for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="name" value="{{ old('name') }}" class="vertiqal-form-input"
                            placeholder="Stephen James" required>
                    </div>

                    <div class="vertiqal-form-group">
                        <label class="vertiqal-form-label" for="email">Email</label>
                        <input name="email" type="email" id="email"  value="{{ old('email') }}" class="vertiqal-form-input"
                            placeholder="stephen12@gmail.com" required>
                    </div>

                    <div class="vertiqal-form-row">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label" for="password">Password</label>
                            <input name="password" type="password" value="{{ old('password') }}" id="password" class="vertiqal-form-input"
                                placeholder="••••••••••••••••" required>
                        </div>

                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label" for="password_confirmation">Confirm Password</label>
                            <input name="password_confirmation" type="password" id="password_confirmation"
                                class="vertiqal-form-input" placeholder="••••••••••••••" required>
                        </div>
                    </div>

                    <div class="vertiqal-form-row">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label" for="country">Country</label>
                            <select id="country" class="vertiqal-form-select" name="country" required>
                                <option value="nigeria">Nigeria</option>
                                <option value="ghana">Ghana</option>
                                <option value="kenya">Kenya</option>
                                <option value="south-africa">South Africa</option>
                                <option value="egypt">Egypt</option>
                            </select>
                        </div>

                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label" for="phoneNumber">Phone Number</label>
                            <input name="phoneNo" type="tel" id="phoneNumber" class="vertiqal-form-input"
                                placeholder="08066340892" required value="">
                        </div>
                    </div>

                    <div class="vertiqal-form-group">
                        <label class="vertiqal-form-label" for="businessName">Business Name</label>
                        <input name="businessName" type="text" id="businessName" class="vertiqal-form-input"
                            placeholder="FreshFarm Ltd" required value="">
                    </div>

                    <div class="d-flex">
                        <div class="form-group">
                            <input type="radio" value="vendor" id="vendor_role" name="role">
                            <label for="vendor_role">Vendor</label>
                        </div>

                        <div class="form-group ml-4">
                            <input type="radio" value="buyer" id="buyer_role" name="role">
                            <label for="buyer_role">Buyer</label>
                        </div>
                    </div>

                    <button type="submit" class="vertiqal-submit-btn">
                        {{ __('Continue to Setup') }}
                        <!-- svg -->
                    </button>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.quipdeck-file-upload input[type="file"]').forEach(input => {
            input.addEventListener('change', function (e) {
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
            upload.addEventListener('dragover', function (e) {
                e.preventDefault();
                this.style.borderColor = '#007bff';
                this.style.backgroundColor = '#f8f9fa';
            });

            upload.addEventListener('dragleave', function (e) {
                e.preventDefault();
                this.style.borderColor = '#dee2e6';
                this.style.backgroundColor = '#fff';
            });

            upload.addEventListener('drop', function (e) {
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