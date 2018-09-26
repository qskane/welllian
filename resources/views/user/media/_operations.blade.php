<a href="{{route('user.media.show',[Auth::id(),$media->id])}}">{{__('show')}}</a>
<a href="{{route('user.media.edit',[Auth::id(),$media->id])}}">{{__('edit')}}</a>

@if(!$media->verified)
    <a href="{{route('user.media.verification',[Auth::id(),$media->id])}}">{{__('verification')}}</a>
@endif

@if($delete??false)
    @include('components.buttons.delete',[
    'name'=>__('delete'),
    'action'=>route('user.media.show',[Auth::id(),$media->id])
    ])
@endif





