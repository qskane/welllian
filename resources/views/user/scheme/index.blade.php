@component('user.layout',['active'=>'scheme','header'=>__('user.scheme_info')])

    @if($schemes->count())
        <div style="overflow-x: scroll">
            @include('user.scheme._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        @include('components.buttons.create',['link'=>route('user.scheme.create')])
    @endslot

@endcomponent
