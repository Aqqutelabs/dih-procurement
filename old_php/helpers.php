<?php

function csrf_token(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function csrf_field_html(): string {
    return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars(csrf_token(), ENT_QUOTES, 'UTF-8') . '">';
}

function verify_csrf($token): bool {
    if (empty($token) || empty($_SESSION['csrf_token'])) return false;
    return hash_equals($_SESSION['csrf_token'], $token);
}

function flash($key, $value) {
    $_SESSION['flash'][$key] = $value;
}

function get_flash($key) {
    $v = $_SESSION['flash'][$key] ?? null;
    if (isset($_SESSION['flash'][$key])) unset($_SESSION['flash'][$key]);
    return $v;
}

function respond($data, $statusCode = 200) {
    $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'
    ) || (strpos($_SERVER['HTTP_ACCEPT'] ?? '', 'application/json') !== false);
    http_response_code($statusCode);
    if ($isAjax) {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        exit;
    } else {
        if (isset($data['message'])) flash('message', $data['message']);
        if (isset($data['errors'])) flash('errors', $data['errors']);
        $redirect = $data['redirect'] ?? ($_SERVER['HTTP_REFERER'] ?? '/');
        header('Location: ' . $redirect);
        exit;
    }
}

function throttle($key, $limit = 5, $interval = 60) {
    $now = time();
    if (!isset($_SESSION['throttle'][$key])) {
        $_SESSION['throttle'][$key] = [];
    }
    $_SESSION['throttle'][$key] = array_filter($_SESSION['throttle'][$key], function($ts) use ($now, $interval) {
        return ($ts + $interval) >= $now;
    });
    if (count($_SESSION['throttle'][$key]) >= $limit) {
        return false;
    }
    $_SESSION['throttle'][$key][] = $now;
    return true;
}

function send_email($to, $subject, $body) {
    error_log("send_email to={$to} subject={$subject} body={$body}");
    return true;
}

function sanitize_string($s, $max=255) {
    $s = trim((string)$s);
    return mb_substr($s, 0, $max);
}

function validate_password_policy($pwd): array {
    $errs = [];
    if (strlen($pwd) < 8) $errs[] = 'Password must be at least 8 characters.';
    if (!preg_match('/[A-Z]/', $pwd)) $errs[] = 'Password must include an uppercase letter.';
    if (!preg_match('/[a-z]/', $pwd)) $errs[] = 'Password must include a lowercase letter.';
    if (!preg_match('/[0-9]/', $pwd)) $errs[] = 'Password must include a number.';
    return $errs;
}

function e($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}

function old($key, $default = '') {
    $v = $_SESSION['old'][$key] ?? $default;
    return is_scalar($v) ? e($v) : e(json_encode($v));
}

function render_flash_errors() {
    $errors = $_SESSION['errors'] ?? null;
    $message = $_SESSION['message'] ?? null;

    unset($_SESSION['errors'], $_SESSION['message']);

    if (!$errors && !$message) return '';

    $html = '<div aria-live="polite">';
    if ($message) {
        $html .= '<div class="flash flash-info">' . e($message) . '</div>';
    }

    if ($errors) {
        $isAssoc = array_keys($errors) !== range(0, count($errors) - 1);
        if ($isAssoc) {
            if (!empty($errors['_global'])) {
                foreach ((array)$errors['_global'] as $g) {
                    $html .= '<div class="flash flash-error">' . e($g) . '</div>';
                }
            }
            $html .= '<div class="flash flash-error"><ul class="flash-list">';
            foreach ($errors as $field => $msgs) {
                if ($field === '_global') continue;
                foreach ((array)$msgs as $m) {
                    $html .= '<li>' . e($m) . '</li>';
                }
            }
            $html .= '</ul></div>';
        } else {
            $html .= '<div class="flash flash-error"><ul>';
            foreach ((array)$errors as $err) {
                $html .= '<li>' . e($err) . '</li>';
            }
            $html .= '</ul></div>';
        }
    }

    $html .= '</div>';
    return $html;
}

function render_field_error($field) {
    $errors = $_SESSION['errors'] ?? null;
    if (!$errors) return '';
    $msgs = [];
    if (isset($errors[$field])) {
        $msgs = (array)$errors[$field];
    } else {
        return '';
    }
    if (empty($msgs)) return '';
    $out = '<div id="error-' . e($field) . '" class="field-error" aria-live="polite">';
    $out .= e(implode(' ', $msgs));
    $out .= '</div>';
    return $out;
}