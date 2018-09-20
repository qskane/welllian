@extends('layouts.app')

@section('content')

    @component('products._search')

    @endcomponent

    @component('components.rows.products',compact('products'))
        {{--@slot('header')--}}
        {{--手机数码--}}
        {{--@endslot--}}
        @slot('footer')
            {{$products->links()}}
        @endslot
    @endcomponent


@endsection
