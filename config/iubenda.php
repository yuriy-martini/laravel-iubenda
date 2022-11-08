<?php

return [
    'enabled' => env('IUBENDA_ENABLED', true),

    'site_id' => env('IUBENDA_SITE_ID'),

    'terms_and_conditions' => [
        'en' => [
            'id' => env('IUBENDA_TERMS_AND_CONDITIONS_ID'),
        ],
    ],

    'privacy_policy' => [
        'en' => [
            'id' => env('IUBENDA_PRIVACY_POLICY_ID'),
        ],
    ],

    'cookie_policy' => [
        'enabled' => env('IUBENDA_COOKIE_POLICY_ENABLED', true),

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

    'consent_solution' => [
        'api_key' => env('IUBENDA_CONSENT_SOLUTION_API_KEY'),
    ],
];
