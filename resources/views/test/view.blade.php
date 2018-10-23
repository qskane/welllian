@php
    $vue = false;
@endphp

@extends('layout.app')
@section('content')


    <div style="width: 10rem;border: 1px solid #d2d2d2;background-color: #ffffff;padding: 1em;border-radius: 4px;">
        <ul style="list-style: none;padding: 0;margin-bottom: 4px;">
            @foreach($consumers as $consumer)
                <li>
                    <a href="{{$consumer->url}}">
                        <div style="width:2rem;display: inline-block;text-align: left">
                            <img src="{{$consumer->logo}}" style="max-width: 100%;max-height: 1em"
                                 onerror="this.src='https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_86d58ae1.png'"
                            />
                        </div>
                        <b>{{$consumer->name}}</b>
                    </a>
                </li>
            @endforeach
        </ul>
        <div style="text-align: right">
            <small style="color: darkgray">
                由<a href="http://welllian.com" style="color: darkgray">微联</a>提供
            </small>
        </div>
    </div>


    <div style=" border: 1px solid #d2d2d2;background-color: #ffffff;padding: 0.5em;border-radius: 4px;">
        <div style="display: flex;flex-wrap: wrap;">
            @foreach($consumers as $consumer)
                <a href="{{$consumer->url}}">
                    <div class="item" style="padding: 0 0.5em;width: 10em;overflow: hidden;">
                        <img src="{{$consumer->logo}}" style="display: inline;max-width: 2rem;max-height: 1em"
                             onerror="this.src='https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_86d58ae1.png'"
                        />
                        {{$consumer->name}}
                    </div>
                </a>
            @endforeach
        </div>
        <div style="text-align: right">
            <small style="color: darkgray">
                由<a href="http://welllian.com" style="color: darkgray">微联</a>提供
            </small>
        </div>
    </div>


@endsection
