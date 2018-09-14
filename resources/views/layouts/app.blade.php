<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
    <link rel="stylesheet" href="/css/web.css">
    @yield('styles')
</head>
<body>
<div class="mdl-layout mdl-js-layout">
    @include('layouts.nav')
    @yield('header')
    <main class="mdl-layout__content">
        <div class="page-content main">
            @yield("content")
        </div>
    </main>
    @yield('footer')
    @include('layouts.footer')
</div>

{{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"--}}
{{--integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"--}}
{{--crossorigin="anonymous"></script>--}}

<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

@yield('scripts')

</body>
</html>

