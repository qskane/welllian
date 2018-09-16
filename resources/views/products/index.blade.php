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
{{--<ul class="pagination justify-content-center">--}}
    {{--<li class="page-item disabled">--}}
        {{--<a class="page-link" href="#" tabindex="-1">Previous</a>--}}
    {{--</li>--}}
    {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
    {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
    {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
    {{--<li class="page-item">--}}
        {{--<a class="page-link" href="#">Next</a>--}}
    {{--</li>--}}
{{--</ul>--}}
        @endslot
    @endcomponent


@endsection
