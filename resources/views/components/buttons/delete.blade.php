@php
    $id = str_random(8);
@endphp

<a href="#" class="{{$class ?? "text-danger"}}"
        onclick="event.preventDefault(); if(confirm('{{__('operation_need_confirm')}}')){ $('#{{$id}}').submit(); }">
    {{ $name }}
</a>

<form id="{{$id}}" action="{{$action}}" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="_method" value="DELETE"/>
</form>
