<?php

return [
    'bonus_rate' => 0.1,
    // FIXME 设置 official_user_id
    'official_user_id' => 2,
    // FIXME 设置 official_media_key
    'official_media_key' => '8wz0u8ekgoi23333',

    'scheme' => [
        'max_quantity' => 16,
    ],

    'media' => [
        'key_length' => 16,
        'secret_length' => 16,
        'verification_key_length' => 32,
        'default_preview_quantity' => 16,
    ],

    'verification_code_expires' => '30 minutes',

    'article' => [
        // FIXME
        'document_category' => 1,
    ],

    'view' => [
        'storage_placeholder' => '{#STORAGE#}',
    ],

    // FIXME utm_source
    'league_utm' => 'utm_source=malllian.com&utm_medium=cpc&utm_campaign=swap_league',


];
