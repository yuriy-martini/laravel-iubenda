<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

if (!function_exists('iubenda_privacy_policy_url')) {
    /**
     * Generate the URL to Iubenda Privacy Policy page.
     */
    function iubenda_privacy_policy_url(): ?string
    {
        if (!Config::get('iubenda.enabled')) {
            return null;
        }

        $locale = App::getLocale();

        return ($id = Config::get("iubenda.privacy_policy.$locale.id"))
            ? "https://www.iubenda.com/privacy-policy/$id"
            : null;
    }
}

if (!function_exists('iubenda_cookie_policy_url')) {
    /**
     * Generate the URL to Iubenda Cookie Policy page.
     */
    function iubenda_cookie_policy_url(): ?string
    {
        return ($url = iubenda_privacy_policy_url()) ? $url . '/cookie-policy' : null;
    }
}
