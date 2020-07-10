@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $enabled = $enabled ?? Config::get("iubenda.cookie_policy.enabled");
    $locale = $locale ?? App::getLocale();
    $title = $title ?? Config::get("iubenda.cookie_policy.$locale.title");
@endphp

@extends('iubenda::policy', [
    'enabled' => $enabled,
    'locale' => $locale,
    'title' => $title,
    'urlPath' => '/cookie-policy'
])
