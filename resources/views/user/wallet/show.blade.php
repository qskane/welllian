@php
    $title=__('user.wallet_info');
@endphp

@component('user.layout',['active'=>'wallet','header'=>__('user.wallet_info')])

    @include('components.lists.list_key_value',['items'=>[
        [__("wallet.coin"),$wallet->coin],
    ]])

    <div>
        <a href="{{route('user.wallet.log')}}">@lang('wallet.log')</a>
    </div>


@endcomponent
