@php
    $title=__('user.home');
@endphp

@component('user.layout',['active'=>'profile','header'=>__('user.profile_info')])

    @component('components.form.layout',['action'=>route('user.profile.edit'),'submitText'=>__('form.save')])

        @include('components.form.text',[
            'label'=>__('form.nickname'),
            'name'=>'name',
            'default'=>$user->name
        ])

        @include('components.form.text',[
            'label'=>__('form.mobile'),
            'name'=>'mobile',
            'default'=>$user->mobile,
            'disabled'=>true
        ])

    @endcomponent

@endcomponent
