@component('user._layout',['active'=>'schema','header'=>__('user.template_info')])

    @if($templates->count())
        <div style="overflow-x: scroll">
            @include('user.schema._table')
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a href="{{config('league.template.repository')}}" target="_blank">{{__('template.custom_template')}}</a>
    @endslot

@endcomponent
