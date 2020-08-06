@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $enabled = $enabled ?? (Config::get("iubenda.cookie_consent.enabled") && Config::get("iubenda.enabled"));
    $locale = $locale ?? App::getLocale();
    $siteId = $siteId ?? Config::get("iubenda.site_id");
    $policyId = $policyId ?? Config::get("iubenda.privacy_policy.$locale.id");
    $bannerOptions = $bannerOptions ?? Config::get("iubenda.cookie_policy.banner_options");
@endphp
@if ($enabled)
    <script type="text/javascript">
        var _iub = _iub || [];
        _iub.csConfiguration = {
            "whitelabel":false,
            "lang": "{{ $locale }}",
            "siteId": {{ $siteId }},
            "perPurposeConsent":true,
            "cookiePolicyId": {{ $policyId }},
            "banner": {!! json_encode($bannerOptions) !!}
        };
    </script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>

@endif
