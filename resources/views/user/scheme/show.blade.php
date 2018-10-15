@component('user.layout',['active'=>'scheme','header'=>__('user.scheme_info')])

    @php
        $install = app(App\Services\View\BladeCompiler::class)
        ->make(file_get_contents(resource_path('views/user/scheme/_install.blade.php')), [
            'key' => $scheme->media->key,
            'container'=>$scheme->container
        ]);
    @endphp

    @include('components.lists.list_key_value',['items'=>[
        [__('name'),$scheme->name],
        [__('scheme.container'),$scheme->container,'CODE'],
        [__('scheme.quantity'),$scheme->quantity],
        [__('media.media'),$scheme->media->name,'LINK',route('user.media.show',$scheme->media->id)],
        [__('template.template'),$scheme->template->name,'LINK',route('user.template.show',$scheme->template->id)],
        [__('scheme.running'),$scheme->running,'STATUS'],
        [__('scheme.install_code'),$install,'TEXTAREA'],
    ]])

    <div class="text-center">
        @include('user.scheme._operations',['show'=>false])
    </div>

@endcomponent
