<div>
    @if(isset($title) && $title)
        <h2>{{$title}}</h2>
    @endif

    @if(isset($header) && $header)
        {{$header}}
    @endif

    @foreach($products->chunk(4) as $chunk)
        <div class="row">
            @each('components.rows.cols.product', $chunk, 'product')
        </div>
    @endforeach

    @if(isset($footer) && $footer)
        {{$footer}}
    @endif
</div>

