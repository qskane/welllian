@extends('layout.app')
@section('content')


    @php

    $a = new \Faker\Generator();
    $a->rgbCssColor();

    dd($a);
    @endphp

@endsection
