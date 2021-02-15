<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no viewport-fit=cover, shrink-to-fit=no">

@if (isset($title))
  <title>{{$title}} - Computerun 2020: INSIGHT</title>
  <meta name="title" content="{{$title}} - Computerun 2020: INSIGHT">
  <meta property="og:title" content="{{$title}} - Computerun 2020: INSIGHT">
  <meta property="twitter:title" content="{{$title}} - Computerun 2020: INSIGHT">
@else
  <title>Computerun 2020: INSIGHT</title>
  <meta name="title" content="Computerun 2020: INSIGHT">
  <meta property="og:title" content="Computerun 2020: INSIGHT">
  <meta property="twitter:title" content="Computerun 2020: INSIGHT">
@endif

<!-- Primary Meta Tags -->
<meta name="description" content="Organized by HIMTI and HIMSISFO BINUS UNIVERSITY">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="http://computerun.id/">
<meta property="og:description" content="Organized by HIMTI and HIMSISFO BINUS UNIVERSITY">
<meta property="og:image" content="">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="http://computerun.id/">
<meta property="twitter:description" content="Organized by HIMTI and HIMSISFO BINUS UNIVERSITY">
<meta property="twitter:image" content="">

<!-- CSS -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@400;700&display=swap" rel="stylesheet">
<link href="/css/index.css" type="text/css" rel="stylesheet"/>
<link href="/fonts/fonts.css" type="text/css" rel="stylesheet"/>

<!-- Web Manifest, Icons, and PWA -->
<link rel="manifest" href="/manifest.json">

<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="COMPUTERUN">
<meta name="apple-mobile-web-app-title" content="COMPUTERUN">
<meta name="theme-color" content="#0c1631">
<meta name="msapplication-navbutton-color" content="#0c1631">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="/">

<link rel="icon" type="image/png" sizes="512x512" href="/img/main-512.png">
<link rel="apple-touch-icon" type="image/png" sizes="512x512" href="/img/main-512.png">
<link rel="icon" type="image/png" sizes="192x192" href="/img/main-192.png">
<link rel="apple-touch-icon" type="image/png" sizes="192x192" href="/img/main-192.png">

<!-- Prevent phone number linking in iOS -->
<meta name="format-detection" content="telephone=no">

<!-- Add support for custom external CSS files -->
@if (isset($custom_css) && is_array($custom_css))
    @foreach ($custom_css as $stylesheet)
        <link href="{{$stylesheet->url}}" type="text/css" rel="stylesheet"
            @if (isset($stylesheet->integrity))
                integrity="{{$stylesheet->integrity}}"
            @endif
            @if (isset($stylesheet->media))
                media="{{$stylesheet->media}}"
            @endif
        >
    @endforeach
@endif

<!-- Add support for custom external JS files -->
@if (isset($custom_js) && is_array($custom_js))
    @foreach ($custom_js as $script)
        <script src="{{$script->url}}"></script>
    @endforeach
@endif
