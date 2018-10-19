<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <title>{{$template->name}}</title>
</head>
<body>

{!! template()->preview($template) !!}

</body>
</html>
