@component('user._layout',['active'=>'media','header'=>__('user.media_info')])

    @if($medias->count())
        <div style="overflow-x: scroll">
            @include('user.media._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a class="btn btn-primary" href="{{route('user.media.create',Auth()->id())}}">
            {{__('user.media_create')}}
        </a>
    @endslot

@endcomponent
