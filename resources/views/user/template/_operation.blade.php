<div class="btn-group">
    @if($show??true)
        <a class="btn btn-sm btn-outline-primary"
           href="{{route('user.template.show',$template->id)}}">{{__('show')}}</a>
    @endif

    {{--@if($template->isOwner())--}}
        {{--<a class="btn btn-sm btn-outline-primary"--}}
           {{--href="{{route('user.template.edit',$template->id)}}">{{__('edit')}}</a>--}}
        {{--@include('components.buttons.delete',[--}}
                {{--'name'=>__('delete'),--}}
                {{--'action'=>route('user.template.destroy',[$template->id])--}}
        {{--])--}}
    {{--@endif--}}
</div>
