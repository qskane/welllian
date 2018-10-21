@php
    $title=__('wallet.log');
@endphp

@component('user.layout',['active'=>'wallet','header'=>$title])


    <table class="table">
        <thead>
        <tr>
            <th>{{__('wallet.serial_number')}}</th>
            <th>{{__('wallet.coin')}}</th>
            <th>{{__('wallet.unpaid')}}</th>
            <th>{{__('description')}}</th>
            <th>{{__('category')}}</th>
            <th>{{__('created_at')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($logs as $log)
            <tr>
                <td>{{$log->serial_number}}</td>
                <td>{{$log->coin}}</td>
                <td>{{$log->unpaid}}</td>
                <td>{{$log->text}}</td>
                <td>{{__('wallet.categories.'.$log->wallet_log_category_id)}}</td>
                <td>{{$log->created_at}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endcomponent
