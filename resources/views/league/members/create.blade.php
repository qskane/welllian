@extends('layouts.app')
@section('content')


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                @component('components.containers.card')
                    @slot('header')
                        申请成为联盟成员
                    @endslot
                    @include('league.members._form')
                @endcomponent
            </div>
        </div>
    </div>
@endsection
