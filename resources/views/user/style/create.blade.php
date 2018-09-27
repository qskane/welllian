@component('user._layout',['active'=>'style','header'=>__('user.style_info')])

    @include('user.style._form',['action'=>route('user.style.store',Auth::id())])

@endcomponent
