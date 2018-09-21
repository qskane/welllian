@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-2">
            @include('user._menu',['active'=>$active])
        </div>
        <div class="col-sm-12 col-md-10">
            @component('components.cards.layout')
                @if($header??false)
                    @slot('header')
                        {{$header}}
                    @endslot
                @endif

                {{$slot}}

                @if($footer??false)
                    @slot('footer')
                        {{$footer}}
                    @endslot
                @endif

            @endcomponent
        </div>
    </div>
@endsection
