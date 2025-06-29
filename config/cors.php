<?php
// config/cors.php
return [
    'supports_credentials' => true,
    'allowed_origins' => [
        'http://localhost:3000', // ← これを追加
        'http://localhost:3001', // ← 必要に応じて残す
        'https://dev-kuu.vercel.app',   // 本番ドメイン
    ],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['Authorization'],
    'allowed_methods' => ['*'],
];
