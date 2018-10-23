@php
    $profiles = [
         ['link'=>route('user.profile.edit'),'name'=>__('user.profile_info'),'key'=>'profile'],
         ['link'=>route('user.wallet.show'),'name'=>__('user.wallet_info'),'key'=>'wallet'],
    ];
@endphp
@include('components.lists.list_link',['items'=>$profiles,'active'=>$active])

@php
    $leagues = [
        ['link'=>route('user.media.index'),'name'=>__('user.media_info'),'key'=>'media'],
        ['link'=>route('user.scheme.index'),'name'=>__('user.scheme_info'),'key'=>'scheme'],
        ['link'=>route('user.template.index'),'name'=>__('user.template_info'),'key'=>'template'],
    ];
@endphp
@include('components.lists.list_link',['items'=>$leagues,'class'=>'mt-2','active'=>$active])
