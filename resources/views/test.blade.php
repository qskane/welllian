@extends('layouts.app')
@section('content')


    {{--<style type="text/css">--}}
    {{--.league-container {--}}
    {{--list-style-type: none;--}}
    {{--padding: 8px;--}}
    {{--display: flex;--}}
    {{--flex-wrap: wrap;--}}
    {{--}--}}

    {{--.league-container a {--}}
    {{--text-decoration: none;--}}
    {{--color: darkgray;--}}
    {{--}--}}

    {{--.league-container .league-item-container {--}}
    {{--flex-basis: 0;--}}
    {{--flex-grow: 1;--}}
    {{--width: 100%;--}}
    {{--padding: 4px;--}}
    {{--overflow: hidden;--}}
    {{--text-align: center;--}}
    {{--border: 1px solid transparent;--}}
    {{---webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */--}}
    {{--filter: grayscale(100%);--}}
    {{--}--}}

    {{--.league-container .league-item-container:hover {--}}
    {{--border: 1px solid orange;--}}
    {{---webkit-filter: none; /* Safari 6.0 - 9.0 */--}}
    {{--filter: none;--}}
    {{--}--}}

    {{--.league-container .league-item-container .league-item-logo {--}}
    {{--max-width: 80px;--}}
    {{--margin-right: 4px;--}}
    {{--}--}}

    {{--.league-container .league-item-container .league-item-name {--}}
    {{--margin: 0;--}}
    {{--}--}}

    {{--.league-container .league-item-container .league-item-description {--}}
    {{--word-break: break-all;--}}
    {{--}--}}

    {{--</style>--}}
    <style>
        .league-container {
            margin: 0 auto;
            width: 100%;
            list-style: none;
        }

        .league-item-container {
            float: left;
            padding: 0 15px;
            width: 30%;
            height: 200px;
            box-sizing: border-box;
        }
        .league-item-container img{

            width: 80px;

        }

        .league-item-description {
            word-wrap: break-word;
            word-break: break-all;
        }
    </style>



    <ul class="league-container">
        @foreach([1,2,3,4,5,1,1,1,1,1,1,1] as $i)
            @php
                $item = [
                    'name'=>'fake name 1',
                    'promotion_url'=>'http://mallian-dev.com',
                    'logo'=>'/img/googlelogo_color_272x92dp.png',
                    'description'=>'Unsatisfied glasses can be exchanged or refunded within 30 days of receiving. '
                ];
            @endphp

            <a href="{{$item['promotion_url']}}">
                <li class="league-item-container">
                    <img src="{{$item['logo']}}" class="league-item-logo"/>
                    <p class="league-item-name">Google</p>
                    <small class="league-item-description">{{str_random(mt_rand(10,50))}}</small>
                </li>
            </a>
        @endforeach
    </ul>


    {{--@push('scripts')--}}
    {{--<script>--}}
    {{--(function (i, s, o, g, r, a, m) {--}}
    {{--i['GoogleAnalyticsObject'] = r;--}}

    {{--i[r] = i[r] || function () {--}}
    {{--(i[r].q = i[r].q || []).push(arguments)--}}
    {{--};--}}

    {{--i[r].l = 1 * new Date();--}}

    {{--a = s.createElement(o);--}}
    {{--m = s.getElementsByTagName(o)[0];--}}
    {{--a.async = 1;--}}
    {{--a.src = g;--}}
    {{--m.parentNode.insertBefore(a, m)--}}

    {{--})(window, document, 'script', '//malllian-dev.com/js/league.js', 'league');--}}

    {{--league('create', 'UA-1111-1');--}}

    {{--</script>--}}
    {{--@endpush--}}
@endsection
