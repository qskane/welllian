@extends("layouts.app")

@push("styles")
    <link rel="stylesheet" href="/css/markdown.css">
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

    <div class="row">
        <div class="col-sm-12 col-md-2">
            @include('docs._menu')
        </div>
        <div class="col-sm-12 col-md-10">
            <div class="card">

                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>

                <article class="markdown-body">
                    {{$slot}}
                </article>
            </div>

        </div>
    </div>

@endsection
