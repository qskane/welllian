@component('user.layout',['active'=>'template','header'=>__('user.template_info')])

    @include('user.template._form',['action'=>route('user.template.store')])

@endcomponent
