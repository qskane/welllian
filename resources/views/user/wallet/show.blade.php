@php
    $title=__('user.wallet_info');
@endphp

@component('user._layout',['active'=>'wallet','header'=>__('user.wallet_info')])

    <div>
        <p><span class="mr-1">{{__("wallet.coin")}}:</span>{{$wallet->coin}}</p>
        <p><span class="mr-1">{{__("wallet.wealth")}}:</span>{{$wallet->wealth}}</p>
    </div>

@endcomponent
