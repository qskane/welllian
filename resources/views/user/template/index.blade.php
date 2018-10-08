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
        @include('components.buttons.create',['link'=>route('user.template.create')])
    @endslot

@endcomponent
