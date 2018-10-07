{{--@extends('layouts.app')--}}
{{--@section('content')--}}

{{--<!--请将此div标签置于您希望显示的位置-->--}}
{{--<div id="fake-container"></div>--}}

{{--<!--请将此div标签置于您希望显示的位置-->--}}
{{--<div id="fake2"></div>--}}

{{--@push('scripts')--}}
{{--<!--请将此script标签置于<body></body>之间-->--}}
{{--<script>--}}
{{--(function (i, s, o, g, r, a, m) {--}}
{{--i['welllianObject'] = r;--}}
{{--i[r] = i[r] || function () {--}}
{{--(i[r].q = i[r].q || []).push(arguments);--}}
{{--};--}}
{{--i[r].l = 1 * new Date();--}}
{{--a = s.createElement(o);--}}
{{--m = s.getElementsByTagName(o)[0];--}}
{{--a.async = true;--}}
{{--a.src = g;--}}
{{--m.parentNode.insertBefore(a, m);--}}
{{--})(window, document, 'script', '//malllian-dev.com/js/league.js', 'league');--}}
{{--league('create', '867r5upedpd0cylx');--}}
{{--</script>--}}
{{--@endpush--}}


<style>
    .league-container {
        list-style: none;
        text-align: center;
        position: relative;
        min-width: 1000px;
        max-width: 1200px;
        margin: auto;
        overflow: hidden;
        padding: 0;
    }

    .league-item-container {
        float: left;
        padding: 4px;
        width: 20%;
        box-sizing: border-box;
        height: 120px;
        border: 1px solid transparent;
        overflow: hidden;

        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        filter: grayscale(1); /* Microsoft Edge and Firefox 35+ */
    }

   .league-item-container:hover {
        border: 1px solid orangered;
        -webkit-filter: grayscale(0);
        filter: none;
    }

     a {
        text-decoration: none;
        display: block;
    }

    .league-item-name {
        color: darkgray;
        margin: 0;
        font-size: 18px;
        text-decoration: none;
    }

    .league-item-warp{
        height: 80px;
        text-align: center;

        display: flex;
        justify-content: center; /* align horizontal */
        align-items: center; /* align vertical */

    }

     .league-item-logo {
        max-width: 100px;
        max-height: 100px;
        margin: auto;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>

<ul class="league-container">
    @foreach([1,2,3,4,5,1,1,1,1,1,1,1] as $i)
        @php
            $item = [
            'name'=>'fake name 1',
            'promotion_url'=>'http://mallian-dev.com',
            'logo'=>'/img/google.png',
            'description'=>'Unsatisfied glasses can be exchanged or refunded within 30 days of receiving. '
            ];
        $logos = [
        'https://img.alicdn.com/tfs/TB1EGNRRVXXXXazXVXXXXXXXXXX-271-123.png',
        '/img/google.png',
        'https://img.alicdn.com/tfs/TB1MQ6JepzqK1RjSZFvXXcB7VXa-760-460.png'
        ];
        @endphp



        <li class="league-item-container">
            <a href="{{$item['promotion_url']}}">
                <div class="league-item-warp">
                    <img src="{{$logos[mt_rand(0,2)]}}" class="league-item-logo"/>
                </div>
                <h4 class="league-item-name">Google</h4>
            </a>
        </li>
    @endforeach
</ul>


{{--@endsection--}}
