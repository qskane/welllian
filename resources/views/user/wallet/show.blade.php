@php
    $title=__('user.wallet_info');
@endphp

@component('user._layout',['active'=>'wallet','header'=>__('user.wallet_info')])

    {{$wallet->coin}}

@endcomponent
