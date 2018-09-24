@php
    $id = str_random(8);
@endphp

<button class="{{$class ?? "btn btn-link"}}"
        onclick="event.preventDefault(); $('#{{$id}}').submit();">
    {{ $name }}
</button>

<form id="{{$id}}" action="{{$action}}" method="POST" style="display: none;">
    @csrf
</form>
