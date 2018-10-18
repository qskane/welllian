@component('article._layout',compact('ancestors'))

    <h1>{{$article->title}}</h1>
    <article class="markdown-body">
        {!! $article->html !!}
    </article>

@endcomponent
