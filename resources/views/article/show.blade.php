@extends("layout.app")
@section('content')
    @push("style")
        <style>
            .markdown-body {
                box-sizing: border-box;
                min-width: 200px;
                max-width: 980px;
                margin: 0 auto;
                /*padding: 45px;*/
            }

            @media (max-width: 767px) {
                .markdown-body {
                    /*padding: 15px;*/
                }
            }
        </style>
    @endpush

    <div class="container">

        <div class="bg-white">


            <h1 class="text-center pt-4 pb-4">
                {{$article->title}}
            </h1>
            <hr/>

            <div class="text-center pt-2 pb-4">
                <img src="{{$article->image}}" style="max-width: 100%">
            </div>

            <article class="markdown-body">
                {!! $article->html !!}
            </article>

        </div>

    </div>

@endsection

