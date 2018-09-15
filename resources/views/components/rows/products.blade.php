<h1 class="my-4">Welcome to Modern Business</h1>

@foreach($products->chunk(4) as $chunk)

    <div class="row">
        @foreach($chunk as $product)
            @include('components.rows.cols.product')
        @endforeach
    </div>
@endforeach

<div class="justify-content-center">
    {{ $products->links() }}
</div>



