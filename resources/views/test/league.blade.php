@extends('layouts.app')
@section('content')

    <!--请将此div标签置于您希望显示的位置-->
    <div id="s"></div>

    @push('script')
        <!--请将此script标签置于<body></body>之间-->
        <script>
          (function (i, s, o, g, r, a, m) {
            i['welllianObject'] = r;
            i[r] = i[r] || function () {
              (i[r].q = i[r].q || []).push(arguments);
            };
            i[r].l = 1 * new Date();
            a = s.createElement(o);
            m = s.getElementsByTagName(o)[0];
            a.async = true;
            a.src = g;
            m.parentNode.insertBefore(a, m);
          })(window, document, 'script', '//malllian-dev.com/js/league.js', 'league');
          league('create', '{{config('fake.league_key')}}');
        </script>
    @endpush

@endsection
