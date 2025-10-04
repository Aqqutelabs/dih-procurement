<?php
return [
    'db_host' => getenv('DB_HOST') ?: '127.0.0.1',
    'db_name' => getenv('DB_NAME') ?: 'vertiqal_db',
    'db_user' => getenv('DB_USER') ?: 'root',
    'db_pass' => getenv('DB_PASS') ?: '',
    'db_charset' => 'utf8mb4',
    'base_url' => getenv('BASE_URL') ?: 'https://yourdomain.example',
    'password_reset_ttl' => 60 * 60,
];
