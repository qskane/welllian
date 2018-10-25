@php
    view()->share('vue',false);
@endphp

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

    {{--@slot('operation')--}}
    {{--@include('components.buttons.create',['link'=>route('user.template.create')])--}}
    {{--@endslot--}}

    @slot('operation')
        <a href="{{route('article.show',config('web.article.custom_template'))}}">{{__('template.custom_template')}}</a>
    @endslot

@endcomponent
