<?php

return [
    'default' => 'wordpress',
    
    'connections' => [
        'wordpress' => [
            'driver' => 'mysql',
            'host' => DB_HOST,
            'database' => DB_NAME,
            'username' => DB_USER,
            'password' => DB_PASSWORD,
            'charset' => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix' => 'wp_',
            'strict' => true,
            'engine' => null,
        ],
    ],
]; 