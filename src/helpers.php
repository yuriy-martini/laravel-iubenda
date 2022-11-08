<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

if (!function_exists('iubenda_url')) {
    /**
     * Generate the URL to Iubenda.
     */
    function iubenda_url(string $url = '/'): string
    {
        return "https://www.iubenda.com$url";
    }
}

if (!function_exists('iubenda_terms_and_conditions_url')) {
    /**
     * Generate the URL to Iubenda Terms and Conditions page.
     */
    function iubenda_terms_and_conditions_url(): ?string
    {
        if (!Config::get('iubenda.enabled')) {
            return null;
        }

        $locale = App::getLocale();

        $path = $locale === 'it' ? '/termini-e-condizioni' : '/terms-and-conditions';

        return ($id = Config::get("iubenda.terms_and_conditions.$locale.id"))
            ? iubenda_url("$path/$id")
            : null;
    }
}

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
            ? iubenda_url("/privacy-policy/$id")
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
