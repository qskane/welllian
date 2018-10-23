@extends('layout.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-2">
                @include('user._menu',['active'=>$active])
            </div>
            <div class="col-sm-12 col-md-10">
                @component('components.cards.layout')
                    @slot('header')
                        <div class="row">
                            <div class="col-6">{{$header ?? ''}}</div>
                            <div class="col-6 text-right">{{$operation ?? ''}}</div>
                        </div>
                    @endslot

                    {{$slot}}

                    @if($footer?? false)
                        @slot('footer')
                            {{$footer}}
                        @endslot
                    @endif

                @endcomponent
            </div>
        </div>
    </div>


@endsection
