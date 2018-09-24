@php
    $id = str_random(8);
@endphp

<button class="{{$class ?? "btn btn-link text-danger"}}"
        onclick="event.preventDefault(); if(confirm('{{__('operation_need_confirm')}}')){ $('#{{$id}}').submit(); }">
    {{ $name }}
</button>

<form id="{{$id}}" action="{{$action}}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE"/>
</form>
