@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $locale = $locale ?? App::getLocale();
    $title = $title ?? Config::get("iubenda.cookie_policy.$locale.title");
@endphp

@extends('iubenda::policy', [
    'locale' => $locale,
    'title' => $title,
    'urlPath' => '/cookie-policy'
])
