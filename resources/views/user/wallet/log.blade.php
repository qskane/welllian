@php
    $title=__('wallet.log');
@endphp

@component('user.layout',['active'=>'wallet','header'=>$title])


    <table>
        <td></td>
        <tbody>

        @foreach($logs as $log)
            <tr>
                <td>{{$log->ser}}</td>
            </tr>
        @endforeach
        </tbody>

    </table>

@endcomponent
