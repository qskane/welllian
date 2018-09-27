@extends('layouts.app')
@section('content')

    @push('scripts')
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;

                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                };

                i[r].l = 1 * new Date();

                a = s.createElement(o);
                m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)

            })(window, document, 'script', '//malllian-dev.com/js/league.js', 'league');

            league('create', 'UA-1111-1');

        </script>
    @endpush
@endsection
