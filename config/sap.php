<?php

return [
    'sap' => [
        /*
        |--------------------------------------------------------------------------
        | Base URL
        |--------------------------------------------------------------------------
        | Set the base URL used on the SAP Service Layer.
        |
        */
        'https' => (bool) env('SAP_SECURE_URL', true),

        /*
        |--------------------------------------------------------------------------
        | Base URL
        |--------------------------------------------------------------------------
        | Set the base URL used on the SAP Service Layer.
        |
        */
        'host' => env('SAP_BASE_URL', '192.168.1.1'),

        /*
        |--------------------------------------------------------------------------
        | Base URL
        |--------------------------------------------------------------------------
        | Set the base URL used on the SAP Service Layer.
        |
        */
        'port' => (integer) env('SAP_BASE_PORT', 50000),

        /*
        |--------------------------------------------------------------------------
        | Company DB
        |--------------------------------------------------------------------------
        | Set the company database name that will be choosen on the SAP Service Layer.
        |
        */

        'company_db' => env('SAP_COMPANY_DB'),

        /*
        |--------------------------------------------------------------------------
        | Credentials
        |--------------------------------------------------------------------------
        | Username and password for the authentication purpose when login into SAP Service Layer.
        |
        */

        'username' => env('SAP_USERNAME'),

        'password' => env('SAP_PASSWORD'),


        /*
        |--------------------------------------------------------------------------
        | Base URL
        |--------------------------------------------------------------------------
        | Set the base URL used on the SAP Service Layer.
        |
        */
        'sslOptions' => [
            'cafile' => env('SAP_BASE_SSL_CA_PATH', 'path/to/certificate.crt'),
            'verify_peer' => (bool) env('SAP_BASE_SSL_VERIFY_PEER', true),
            'verify_peer_name' => (bool) env('SAP_BASE_SSL_VERIFY_PEER_NAME', true),
        ],

        /*
        |--------------------------------------------------------------------------
        | Base URL
        |--------------------------------------------------------------------------
        | Set the base URL used on the SAP Service Layer.
        |
        */
        'version' => (integer) env('SAP_BASE_VERSION', 1)
    ]
];
