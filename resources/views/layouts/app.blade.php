<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{$title ?? config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <link rel="stylesheet" href="/vendor/bootstrap/bootstrap.min.css">
    <link href="/css/malllian.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/fontawesome-free-5.3.1-web/css/all.min.css">

    @stack('style')
</head>
<body>
@include('layouts.nav')
@yield('header')
<main>
    <div id="root">
        @yield("content")
    </div>
</main>

@yield('footer')
@include('layouts.footer')

<script src="/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="/vendor/bootstrap/popper.min.js"></script>
<script src="/vendor/bootstrap/bootstrap.min.js"></script>
<script src="/vendor/bootstrap-notify/bootstrap-notify.min.js"></script>

<script src="/js/global.js"></script>

@include('components.alerts.global')

@stack('script')

</body>
</html>
