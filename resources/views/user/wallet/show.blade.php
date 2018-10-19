@php
    $title=__('user.wallet_info');
@endphp

@component('user.layout',['active'=>'wallet','header'=>__('user.wallet_info')])

    {{--<div>--}}
        {{--<p><span class="mr-1">{{__("wallet.coin")}}:</span>{{$wallet->coin}}</p>--}}
        {{--<p><span class="mr-1">{{__("wallet.wealth")}}:</span>{{$wallet->wealth}}</p>--}}
    {{--</div>--}}

    @include('components.lists.list_key_value',['items'=>[
        [__("wallet.coin"),$wallet->coin],
    ]])

    <div>
        <a href="{{route('user.wallet.log')}}">@lang('wallet.log')</a>
    </div>


@endcomponent
