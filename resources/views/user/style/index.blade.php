@component('user._layout',['active'=>'style','header'=>__('user.style_info')])

    @if($styles->count())
        <div style="overflow-x: scroll">
            @include('user.style._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a class="btn btn-primary" href="{{route('user.style.create',Auth::id())}}">
            {{__('create')}}
        </a>
    @endslot

@endcomponent
