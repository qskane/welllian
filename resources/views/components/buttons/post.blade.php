@php
    $id = str_random(8);
@endphp

<button class="btn btn-sm btn-outline-primary"
        onclick="event.preventDefault(); $('#{{$id}}').submit();">
    {{ $name }}
    <form id="{{$id}}" action="{{$action}}" method="POST" style="display: none;">
        @csrf
    </form>
</button>


