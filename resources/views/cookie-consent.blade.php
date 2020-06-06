@php
    use Illuminate\Support\Facades\App;
    use Illuminate\Support\Facades\Config;

    $enabled = $enabled ?? Config::get("iubenda.cookie_consent.enabled");
    $locale = $locale ?? App::getLocale();
    $siteId = $siteId ?? Config::get("iubenda.site_id");
    $policyId = $policyId ?? Config::get("iubenda.privacy_policy.$locale.id");
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
            "banner": {
                "acceptButtonDisplay":true,
                "customizeButtonDisplay":true,
                "position":"bottom",
                "acceptButtonColor":"#0073CE",
                "acceptButtonCaptionColor":"white",
                "customizeButtonColor":"#DADADA",
                "customizeButtonCaptionColor":"#4D4D4D",
                "rejectButtonColor":"#0073CE",
                "rejectButtonCaptionColor":"white",
                "textColor":"black",
                "backgroundColor":"white"
            }
        };
    </script>
    <script type="text/javascript" src="//cdn.iubenda.com/cs/iubenda_cs.js" charset="UTF-8" async></script>

@endif
