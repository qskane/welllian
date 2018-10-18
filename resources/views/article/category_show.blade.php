@component('article._layout',compact('ancestors'))

    <div class="container">
        @if($categories->count())
            @php
                $firstDepth = $categories->first()->depth;
            @endphp
            @foreach($categories as $category)
                <div style="margin-left: {{$category->depth - $firstDepth}}rem;">
                    <h5>{{$category->name}}</h5>
                    <ul>
                        @foreach($category->articles as $article)
                            <li>
                                <a href="{{route('article.show',$article->id)}}">{{$article->title}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        @else
            @include('components.contents.empty')
        @endif
    </div>

@endcomponent
