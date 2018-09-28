@component('user._layout',['active'=>'template','header'=>__('user.scheme_info')])

    @include('user.scheme._form',['action'=>route('user.scheme.store',Auth::id())])

@endcomponent
