@extends("layouts.app")
@section('header')
    @include('home._carousel')
@endsection

@section('content')
    @component('components.rows.products',compact('products'))
        @slot('title')
            手机数码
        @endslot
        @slot('footer')
            <div class="text-center">
                <a class="btn btn-raised btn-sm" href="{{route('product.index')}}" role="button">更多手机数码</a>
            </div>
        @endslot
    @endcomponent
@endsection


