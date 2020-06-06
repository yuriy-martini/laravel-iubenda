@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $locale = $locale ?? App::getLocale();
    $id = $id ?? Config::get("iubenda.privacy_policy.$locale.id");
    $urlPath = $urlPath ?? '';

    $url = "https://www.iubenda.com/privacy-policy/$id" . $urlPath;
@endphp

<a href="{{ $url }}" class="iubenda-white no-brand iubenda-embed" title="{{ $title }}">{{ $title }}</a>
<script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script>
