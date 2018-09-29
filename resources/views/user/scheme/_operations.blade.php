<div class="btn-group">
    @if($show??true)
        <a class="btn btn-outline-primary btn-sm" href="{{route('user.scheme.show',[$scheme->id])}}">{{__('show')}}</a>
    @endif

    <a class="btn btn-outline-primary btn-sm" href="{{route('user.scheme.edit',[$scheme->id])}}">{{__('edit')}}</a>

    @include('components.buttons.delete',[
    'name'=>__('delete'),
    'action'=>route('user.scheme.show',[$scheme->id])
    ])

</div>
