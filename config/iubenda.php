<?php

return [
    'site_id' => env('IUBENDA_SITE_ID'),

    'cookie_consent' => [
        'enabled' => env('IUBENDA_COOKIE_CONSENT_ENABLED', true)
    ],

    'privacy_policy' => [
        'en' => [
            'id' => env('IUBENDA_PRIVACY_POLICY_ID'),
            'title' => env('IUBENDA_PRIVACY_POLICY_TITLE', 'Privacy Policy'),
        ],
    ],

    'cookie_policy' => [
        'en' => [
            'title' => env('IUBENDA_COOKIE_POLICY_TITLE', 'Cookie Policy'),
        ],

        'banner_options' => [
            "acceptButtonDisplay" => true,
            "customizeButtonDisplay" => true,
            "position" => "bottom",
            "acceptButtonColor" => "#0073CE",
            "acceptButtonCaptionColor" => "white",
            "customizeButtonColor" => "#DADADA",
            "customizeButtonCaptionColor" => "#4D4D4D",
            "rejectButtonColor" => "#0073CE",
            "rejectButtonCaptionColor" => "white",
            "textColor" => "black",
            "backgroundColor" => "white",
        ],
    ],
];
