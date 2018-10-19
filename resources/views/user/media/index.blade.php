@component('user.layout',['active'=>'media','header'=>__('user.media_info')])

    @if($medias->count())
        <div class="scroll-x">
            @include('user.media._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('operation')
        @include('components.buttons.create',['link'=>route('user.media.create')])
    @endslot

@endcomponent
