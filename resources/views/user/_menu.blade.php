@php
    $profiles = [
         ['link'=>route('user.profile.edit',Auth::id()),'name'=>__('user.profile_info'),'key'=>'profile'],
         ['link'=>route('user.wallet.show',Auth::id()),'name'=>__('user.wallet_info'),'key'=>'wallet'],
    ];
@endphp
@include('components.lists.list-link',['items'=>$profiles,'active'=>$active])


@php
    $leagues = [
        ['link'=>route('user.media.index',Auth::id()),'name'=>__('user.media_info'),'key'=>'media'],
        ['link'=>route('user.scheme.index',Auth::id()),'name'=>__('user.scheme_info'),'key'=>'scheme'],
        ['link'=>route('user.template.index',Auth::id()),'name'=>__('user.template_info'),'key'=>'template'],
    ];
@endphp
@include('components.lists.list-link',['items'=>$leagues,'class'=>'mt-2','active'=>$active])
