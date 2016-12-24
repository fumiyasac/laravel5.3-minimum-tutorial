<?php

    /**
     * Configuration for the "HTTP Very Basic Auth"-middleware
     */
    return [
        // Username
        'user' => 'admin',

        // Password
        'password' => 'test_ha_kanpeki',

        // Environments where the middleware is active
        'envs' => [
            'local',
            'development',
            'testing'
        ],

        // Message to display if the user "opts out"/clicks "cancel"
        'error_message' => 'こちらのページは管理者のみアクセスができます。正しいID/PASSWORDを入力した上で再度アクセスをお願い致します。',

        // If you prefer to use a view with your error message you can uncomment "error_view".
        // This will superseed your default response message
        // 'error_view'        => 'very_basic_auth::default'
    ];
