<div>
    @if($title??false)
        <h2>{{$title}}</h2>
    @endif

    {{$header ?? ''}}

    @foreach($products->chunk(4) as $chunk)
        <div class="row">
            @each('components.rows.cols.product', $chunk, 'product')
        </div>
    @endforeach

    {{$footer ?? ''}}
</div>

