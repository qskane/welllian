@php
    $title=__('user.home');
@endphp

@component('user.layout',['active'=>'profile','header'=>__('user.profile_info')])

    @component('components.form.layout',['action'=>route('user.profile.edit'),'submit'=>false])

        @include('components.form.text',[
            'label'=>__('user.nickname'),
            'name'=>'name',
            'default'=>$user->name,
            'disabled'=>!$user->isDefaultName(),
            'help'=>$user->isDefaultName() ? __('user.can_only_modify_the_nickname_once'):''
        ])

        @include('components.form.text',[
            'label'=>__('user.mobile'),
            'name'=>'mobile',
            'default'=>$user->mobile,
            'disabled'=>true
        ])

        @if($user->isDefaultName())
            @include('components.form.submit',['text'=>__('save')])
        @endif

    @endcomponent

@endcomponent
