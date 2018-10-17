<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>@yield('title',config('app.name'))</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}"/>

</head>
<body>
<div id="app">
    @include('layout.nav')
    @yield('header')
    <main id="main" class="{{ $padding ?? 'pt-4 pb-4' }}">
        @yield("content")
    </main>
    @yield('footer')
    @include('layout.footer')
    <textarea style="display: none" id="storage">{{config('web.view.storage_placeholder')}}</textarea>
</div>

<script src="{{ asset('js/app.js') }}"></script>
@include('components.alerts.global')
@stack('script')
</body>
</html>
