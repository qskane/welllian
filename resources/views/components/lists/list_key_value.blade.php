<ul class="list-group list-group-flush mb-4">
    @foreach($items as $item)
        <li class="list-group-item">
            <span class="mr-1" style="display:inline-block; min-width: 5rem">{{$item[0]}}</span>
            <span style="display:inline-block;">
                @if(isset($item[2]))
                    @switch($item[2])
                        @case('CODE')
                        @include('components.contents.code',['code'=>$item[1]])
                        @break
                        @case('LINK')
                        <a href="{{$item[3]}}">{{$item[1]}}</a>
                        @break
                        @case('STATUS')
                        @include('components.contents.status',['status'=>(boolean)$item[1]])
                        @break
                        @case('TEXTAREA')
                        <textarea class="form-control" style="resize:both;" rows="6" cols="60">{{$item[1]}}</textarea>
                        @break
                    @endswitch
                @else
                    {!! $item[1] !!}
                @endif
            </span>
        </li>
    @endforeach
</ul>
