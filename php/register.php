<?php include_once __DIR__ . '/includes/css.php'; ?>
<?php include_once __DIR__ . '/includes/sidebar.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-form-container" id="create-account">
        <h1 class="vertiqal-form-title">Create an Account</h1>
        <form class="vertiqal-form-grid" id="vertiqalRegistrationForm" action="#" method="POST">
            <input type="hidden" name="action" value="register">

            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="fullName">Full Name</label>
                <input
                    type="text"
                    id="fullName"
                    name="fullname"
                    class="vertiqal-form-input"
                    placeholder="Stephen James"
                    required
                >
            </div>

            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="email">Email</label>
                <input
                    name="email"
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
                        name="password"
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
                        name="confirmPassword"
                        type="password"
                        id="confirmPassword"
                        class="vertiqal-form-input"
                        placeholder="••••••••••••••"
                        required
                    >
                    <?= render_field_error('confirmPassword') ?>
                </div>
            </div>

            <div class="vertiqal-form-row">
                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="country">Country</label>
                    <select id="country" class="vertiqal-form-select" name="country" required>
                        <option value="nigeria" <?= old('country') === 'nigeria' ? 'selected' : '' ?>>Nigeria</option>
                        <option value="ghana" <?= old('country') === 'ghana' ? 'selected' : '' ?>>Ghana</option>
                        <option value="kenya" <?= old('country') === 'kenya' ? 'selected' : '' ?>>Kenya</option>
                        <option value="south-africa" <?= old('country') === 'south-africa' ? 'selected' : '' ?>>South Africa</option>
                        <option value="egypt" <?= old('country') === 'egypt' ? 'selected' : '' ?>>Egypt</option>
                    </select>
                    <?= render_field_error('country') ?>
                </div>

                <div class="vertiqal-form-group">
                    <label class="vertiqal-form-label" for="phoneNumber">Phone Number</label>
                    <input
                        name="phoneNo"
                        type="tel"
                        id="phoneNumber"
                        class="vertiqal-form-input"
                        placeholder="08066340892"
                        required
                        value="<?= old('phoneNo') ?>"
                    >
                    <?= render_field_error('phoneNo') ?>
                </div>
            </div>

            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label" for="businessName">Business Name</label>
                <input
                    name="businessName"
                    type="text"
                    id="businessName"
                    class="vertiqal-form-input"
                    placeholder="FreshFarm Ltd"
                    required
                    value="<?= old('businessName') ?>"
                >
                <?= render_field_error('businessName') ?>
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
                Continue to Setup
                <!-- svg -->
            </button>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/includes/js.php'; ?>
