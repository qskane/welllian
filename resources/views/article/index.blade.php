@extends('layout.app')
@section('content')

    <div class="container">

        @foreach($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{route('article.show',['key'=>$article->key,'lang'=>$article->language_code])}}">{{$article->title}}</a>
                    </h5>
                    <p class="card-text">{{$article->description}}</p>
                </div>
            </div>
        @endforeach

        {{ $articles->links() }}
    </div>

@endsection
