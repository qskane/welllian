<div class="btn-group">
    @if($show??true)
        <a class="btn btn-outline-primary btn-sm" href="{{route('user.media.show',[$media->id])}}">{{__('show')}}</a>
    @endif

    <a class="btn btn-outline-primary btn-sm" href="{{route('user.media.edit',[$media->id])}}">{{__('edit')}}</a>

    @if(!$media->verified)
        <a class="btn btn-outline-primary btn-sm"
           href="{{route('user.media.verification',[$media->id])}}">{{__('verification')}}</a>
    @endif

    @include('components.buttons.delete',[
    'name'=>__('delete'),
    'action'=>route('user.media.show',[$media->id])
    ])

</div>




