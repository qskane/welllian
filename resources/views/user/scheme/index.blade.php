@component('user._layout',['active'=>'scheme','header'=>__('user.scheme_info')])

    @if($schemes->count())
        <div style="overflow-x: scroll">
            @include('user.scheme._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a class="btn btn-primary" href="{{route('user.scheme.create',Auth()->id())}}">
            {{__('scheme.create')}}
        </a>
    @endslot

@endcomponent
