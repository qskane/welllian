@extends("layouts.app")
@section('header')
    @include('home._slider')
@endsection
@section('content')
    @include('components.rows.products')
@endsection
