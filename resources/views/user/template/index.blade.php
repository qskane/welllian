@component('user.layout',['active'=>'template','header'=>__('user.template_info')])

    @if($templates->count())
        <div>
            @foreach($templates as $template)
                @include('user.template._preview')
            @endforeach

            {{ $templates->links() }}
        </div>
    @else
        @include('components.contents.empty')
    @endif

    @slot('footer')
        <a href="{{config('league.template.repository')}}" target="_blank">{{__('template.custom_template')}}</a>
    @endslot

@endcomponent
