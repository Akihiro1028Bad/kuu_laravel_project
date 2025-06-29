<?php
// config/cors.php
return [
'supports_credentials' => true,
'allowed_origins' => ['http://localhost:3001'],
'allowed_headers' => ['*'],
'exposed_headers' => ['Authorization'],
'allowed_methods' => ['*'],
];

