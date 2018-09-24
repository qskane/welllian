@if($status)
    <i class="far fa-check-circle text-success"></i>
    @if($success ?? false)
        {{$success}}
    @endif
@else
    <i class="far fa-times-circle text-danger"></i>
    @if($fail ?? false)
        {{$fail}}
    @endif
@endif
