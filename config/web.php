<?php

return [
    'bonus_rate' => 0.1,

    // FIXME config
    'official_user_id' => env('OFFICIAL_USER_ID', 2),
    // FIXME config
    'official_media_key' => env('OFFICIAL_MEDIA_KEY', '8wz0u8ekgoi23333'),

    'scheme' => [
        'max_quantity' => 16,
    ],

    'media' => [
        'key_length' => 16,
        'secret_length' => 16,
        'verification_key_length' => 32,
        'default_preview_quantity' => 16,
    ],

    'verification_code' => [
        'expires_seconds' => 1800,
        'refresh_seconds' => env('VERIFICATION_CODE_REFRESH_SECONDS', 60),
        'ip_overload_seconds' => env('VERIFICATION_CODE_IP_OVERLOAD_SECONDS', 86400),
        'ip_overload_limit' => env('VERIFICATION_CODE_IP_OVERLOAD_LIMIT', 20),
    ],

    'article' => [
        // FIXME
        'document_category' => 1,
        // FIXME
        'custom_template' => 1,
    ],

    'view' => [
        'storage_placeholder' => '{#STORAGE#}',
    ],

    'league' => [
        'refresh_days' => 1,
        'exhausted' => 3
        // 'utm_track' => 'utm_source=wellian.com&utm_medium=cpc&utm_campaign=swap_league',
    ],


    'wallet_log_category' => [
        'league' => 1,
        'system' => 2,
    ],

    'wallet' => [
        'initial_coin' => 1000,
    ],


];
