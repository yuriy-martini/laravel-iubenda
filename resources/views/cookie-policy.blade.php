@php
    $enabled = $enabled ?? Illuminate\Support\Facades\Config::get("iubenda.enabled");
    $locale = $locale ?? Illuminate\Support\Facades\App::getLocale();
    $title = $title ?? Illuminate\Support\Facades\Lang::get('iubenda::views.cookie_policy.title')
@endphp

@extends('iubenda::policy', [
    'enabled' => $enabled,
    'locale' => $locale,
    'title' => $title,
    'urlPath' => '/cookie-policy'
])
