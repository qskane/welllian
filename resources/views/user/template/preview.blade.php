<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$template->name}}</title>
</head>
<body>

@php
    $container = \App\Services\String\StrHelper::randomAlphabet();
    $medias = \App\Models\Media::all();
@endphp
<div id="{{$container}}">
    {!! $template->toCompiled($container,compact('container','medias')) !!}
</div>

</body>
</html>
