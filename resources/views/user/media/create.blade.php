@component('user.layout',['active'=>'media','header'=>__('user.media_info')])

    @include('user.media._form',['action'=>route('user.media.store')])

@endcomponent
