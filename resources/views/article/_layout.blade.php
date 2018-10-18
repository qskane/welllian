@extends("layout.app")

@push("style")
    <style>
        .markdown-body {
            box-sizing: border-box;
            min-width: 200px;
            max-width: 980px;
            margin: 0 auto;
            padding: 45px;
        }

        @media (max-width: 767px) {
            .markdown-body {
                padding: 15px;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container">
        {{--<div class="col-sm-12 col-md-3">--}}
        {{--@include('document._menu',['selected'=>$ancestors->pluck('id')->toArray()])--}}
        {{--</div>--}}
        {{--<div class="col-sm-12 col-md-9">--}}
        <div class="card">
            <ol class="breadcrumb">
                @php
                    $category = $category?? new \App\Models\ArticleCategory();
                @endphp
                @foreach($ancestors as $ancestor)
                    @if($loop->last)
                        <li class="breadcrumb-item active" aria-current="page">{{$ancestor->name}}</li>
                    @else
                        <li class="breadcrumb-item">
                            <a href="{{route('article.category.show',$ancestor->id)}}">{{$ancestor->name}}</a>
                        </li>
                    @endif
                @endforeach
            </ol>
            <div class="card-body">
                {{ $slot }}
            </div>
        </div>
    </div>
@endsection


