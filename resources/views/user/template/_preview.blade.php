<div class="card mb-2">
    <div class="card-body">
        <h5 class="card-title">{{$template->name}}</h5>
        <div class="card-text">
            @php
                $container = \App\Services\String\StrHelper::randomAlphabet();
                $medias = \App\Models\Media::all();
            @endphp
            <div id="{{$container}}">
                {!! $template->toCompiled($container,compact('container','medias')) !!}
            </div>
        </div>
    </div>
</div>
