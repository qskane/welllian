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
        ['link'=>route('user.schema.index',Auth::id()),'name'=>__('user.schema_info'),'key'=>'schema'],
        ['link'=>route('user.style.index',Auth::id()),'name'=>__('user.style_info'),'key'=>'style'],
        ['link'=>route('user.effect.index',Auth::id()),'name'=>__('user.effect_info'),'key'=>'effect'],
    ];
@endphp
@include('components.lists.list-link',['items'=>$leagues,'class'=>'mt-2','active'=>$active])
