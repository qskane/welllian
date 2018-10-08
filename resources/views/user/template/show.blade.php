@component('user.layout',['active'=>'template','header'=>__('user.template_info')])

    @include('components.lists.list_key_value',['items'=>[
        [__('name'),$template->name],
        [__('description'),$template->description],
        [__('user.name'),$template->user->name],
        [__('template.html'),$template->html,'TEXTAREA'],
        [__('template.new_window_preview'),__('view'),'LINK',route('user.template.preview',$template->id),true],
    ]])

    @if($template->isOwner())
        <div class="text-center">
            @include('user.template._operation',['show'=>false])
        </div>
    @endif
@endcomponent
