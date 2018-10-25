@php
    view()->share('vue',false);
@endphp

@component('user.layout',['active'=>'template','header'=>__('user.template_info')])

    @include('components.lists.list_key_value',['items'=>[
        [__('name'),$template->name],
        [__('description'),$template->description],
        [__('user.user'),$template->user->name],
        [__('template.source_code'),$template->html,'TEXTAREA'],
    ]])

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('user.template.preview',$template->id)}}" target="_blank">{{__('template.preview')}}</a>
        </div>
        <div class="card-body">
            <div class="scroll-x">
                {!! template()->preview($template) !!}
            </div>
        </div>
    </div>


    {{--@if($template->isOwner())--}}
        {{--<div class="text-center">--}}
            {{--@include('user.template._operation',['show'=>false])--}}
        {{--</div>--}}
    {{--@endif--}}

@endcomponent
