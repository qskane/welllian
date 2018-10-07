<div class="card mb-2">
    <div class="card-body">
        <h5 class="card-title">{{$template->name}}</h5>
        <div class="card-text">
            {!! $template->toCompiled(\App\Services\Strings\StrHelper::randomAlphabet()) !!}
        </div>
    </div>
</div>
