@if(session()->has('message') || session()->has('status'))

    @php
        $message  = null;
        $type = 'info';

        if(session()->has('message')){
            $message = session()->pull('message');
        }

        if(session()->has('status')){
            if(session()->pull('status')){
                $message =$message?? __('success');
                $type = 'success';
            }else{
                $message =$message?? __('fail');
                $type = 'danger';
            }
        }
    @endphp

    @push('script')
        <script type="text/javascript">
            $.notify(
                {message: '{{$message}}'},
                {type: '{{$type}}'}
            );
        </script>
    @endpush

@endif
