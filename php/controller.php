<?php
require __DIR__ . '/config.php';
require __DIR__ . '/db_connect.php';
require __DIR__ . '/helpers.php';
session_start();

$config = require __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(['message'=>'Method not allowed'], 405);
}


$csrf = $_POST['csrf_token'] ?? '';

if (!verify_csrf($csrf)) {
    respond(['message'=>'Invalid request (CSRF)'], 400);
}

// identify action
$action = $_POST['action'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$throttleKey = $action . ':' . $ip;

if($action == 'register') {
    $fullName = sanitize_string($_POST['fullName'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL) ? trim($_POST['email']) : '';
    $password = $_POST['password'] ?? '';
    $confirm = $_POST['confirmPassword'] ?? '';
    $country = sanitize_string($_POST['country'] ?? '');
    $phone = sanitize_string($_POST['phoneNumber'] ?? '', 50);
    $business = sanitize_string($_POST['businessName'] ?? '');
    $role = in_array($_POST['role'] ?? 'vendor', ['vendor','buyer'], true) ? $_POST['role'] : 'vendor';

    $errors = [];
    if ($fullName === '') $errors[] = 'Full name required.';
    if (!$email) $errors[] = 'Valid email required.';
    $pwdErrs = validate_password_policy($password);
    if ($pwdErrs) $errors = array_merge($errors, $pwdErrs);
    if ($password !== $confirm) $errors[] = 'Passwords do not match.';
    if ($country === '') $errors[] = 'Country required.';
    if ($phone === '' || !preg_match('/^[0-9+\-\s()]{7,20}$/', $phone)) $errors[] = 'Valid phone required.';


    if ($errors) {
        die($errors);
        respond(['message'=>'Validation failed','errors'=>$errors], 400);
    }

    die($errors);

    try {
        $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            respond(['message'=>'Email already registered'], 409);
        }
        $stmt = $pdo->prepare('SELECT id FROM users WHERE phone = ? LIMIT 1');
        $stmt->execute([$phone]);
        if ($stmt->fetch()) {
            respond(['message'=>'Phone already registered'], 409);
        }

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        if ($passwordHash === false) throw new RuntimeException('Password hashing failed');

        $verificationToken = bin2hex(random_bytes(32));
        $insert = $pdo->prepare('INSERT INTO users (full_name, email, password_hash, country, phone, business_name, role, verification_token) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        $insert->execute([$fullName, $email, $passwordHash, $country, $phone, $business, $role, $verificationToken]);

        // option: send verification email
        // $verifyUrl = rtrim($config['base_url'], '/') . '/verify_email.php?token=' . $verificationToken;
        // $body = "Hi {$fullName},\n\nPlease verify your email: {$verifyUrl}\n\nThanks.";
        // send_email($email, 'Verify your account', $body);

        respond(['message'=>'Registration successful. Check your email to verify your account.']);
    } catch (PDOException $e) {
        error_log('Register DB error: ' . $e->getMessage());
        respond(['message'=>'Server error'], 500);
    }
}
