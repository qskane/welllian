@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-2">
            @include('user._menu',['active'=>$active])
        </div>
        <div class="col-sm-12 col-md-10">
            @component('components.cards.layout')
                @slot('header')
                    {{$header}}
                @endslot

                {{$slot}}

            @endcomponent
        </div>
    </div>
@endsection
