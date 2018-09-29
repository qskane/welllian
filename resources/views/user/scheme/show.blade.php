@component('user.layout',['active'=>'scheme','header'=>__('user.scheme_info')])

    @include('components.lists.list_key_value',['items'=>[
        [__('name'),$scheme->name],
        [__('scheme.container'),$scheme->container,'CODE'],
        [__('scheme.quantity'),$scheme->quantity],
        [__('media.name'),$scheme->media->name,'LINK',route('user.media.show',$scheme->media->id)],
        [__('template.name'),$scheme->template->name,'LINK',route('user.template.show',$scheme->template->id)],
        [__('scheme.running'),$scheme->running,'STATUS'],
    ]])

    <div class="text-center">
        @include('user.scheme._operations',['show'=>false])
    </div>

@endcomponent
