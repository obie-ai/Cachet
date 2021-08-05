<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="env" content="{{ app('env') }}">
    <meta name="token" content="{{ csrf_token() }}">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/img/apple-touch-icon.png') }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/img/favicon-32x32.png') }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/img/favicon-16x16.png') }}">
<link rel="manifest" href="{{ asset('/img/site.webmanifest') }}">
<link rel="mask-icon" href="{{ asset('/img/safari-pinned-tab.svg') }}" color="#f9cf36">
<link rel="shortcut icon" href="{{ asset('/img/favicon.ico') }}">
<meta name="msapplication-TileColor" content="#f9cf36">
<meta name="msapplication-config" content="{{ asset('/img/browserconfig.xml') }}">
<meta name="theme-color" content="#f9cf36">

    <title>{{ $pageTitle ?? $siteTitle }}</title>

    @if($enableExternalDependencies)
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&subset={{ $fontSubset }}" rel="stylesheet" type="text/css"> --}}
    @endif
    <link rel="stylesheet" href="{{ asset(mix('dist/css/dashboard/dashboard.css')) }}">
    @yield('css')

    @include('partials.crowdin')

    <script type="text/javascript">
        var Global = {};
        Global.locale = '{{ $appLocale }}';
    </script>

    <script src="{{ asset(mix('dist/js/manifest.js')) }}"></script>
    <script src="{{ asset(mix('dist/js/vendor.js')) }}"></script>
</head>

<body class="@yield('bodyClass')">
    <div class="content" id="app">
        @yield('content')
    </div>
</body>
@yield('js')
<script src="{{ asset(mix('dist/js/all.js')) }}"></script>
</html>
