@extends('layouts.app')
@section('content')

    @component('components.containers.card')

        @include('league.members._form')

    @endcomponent

@endsection
