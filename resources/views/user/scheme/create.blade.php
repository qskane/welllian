@component('user.layout',['active'=>'scheme','header'=>__('user.scheme_info')])

    @include('user.scheme._form',['action'=>route('user.scheme.store')])

@endcomponent
