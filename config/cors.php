<?php

return [

    'paths' => ['api/*', 'admin/*', '*'], // adjust paths as needed

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:5173'], // your Vite frontend

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => true,

];
