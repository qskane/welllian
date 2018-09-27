<ul class="list-group {{$class ?? ''}}">
    @foreach($items as $item)
        @include('components.lists.item-link',array_merge($item,['active'=>$active===$item['key']]))
    @endforeach
</ul>
