@component('user._layout',['active'=>'media','header'=>__('user.media_info')])

    @if($medias->count())
        @include('user.media._table')
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a class="btn btn-primary btn-raised" href="{{route('user.media.create',Auth()->id())}}">
            {{__('user.media_create')}}
        </a>
    @endslot

@endcomponent
