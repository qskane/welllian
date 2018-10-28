@component('article._layout',compact('ancestors'))

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

    <article class="markdown-body">
        {!! $article->html !!}
    </article>

@endcomponent
