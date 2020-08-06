@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $locale = $locale ?? App::getLocale();
    $id = $id ?? Config::get("iubenda.privacy_policy.$locale.id");
    $urlPath = $urlPath ?? '';

    $url = "https://www.iubenda.com/privacy-policy/$id" . $urlPath;
@endphp

@if ($enabled)
    <a href="{{ $url }}" class="iubenda-white no-brand iubenda-embed" title="{{ $title }}" target="_blank">{{ $title }}</a>
@endif
