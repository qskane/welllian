<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{config('app.name')}}</title>

    {{--<link rel="stylesheet" href="/vendor/fonts-material-icons.css">--}}
    <link rel="stylesheet" href="/vendor/bootstrap-material-design.min.css"
          integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <link href="/css/malllian.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
@include('layouts.nav')
@yield('header')
<div id="root">
    <main class="container mt-2 mb-2 p-2">
        @yield("content")
    </main>
</div>

@yield('footer')
@include('layouts.footer')

<script src="/vendor/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
<script src="/vendor/popper.js"
        integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U"
        crossorigin="anonymous"></script>
<script src="/vendor/bootstrap-material-design.js"
        integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9"
        crossorigin="anonymous"></script>
<script src="/vendor/bootstrap-notify.min.js"></script>
<script src="/js/global.js"></script>


@stack('scripts')

</body>
</html>

