@foreach($templates as $template)
    <div>
        {!! $template->toCompiled() !!}
    </div>

    <p>{{$template->name}}</p>
@endforeach

{{ $templates->links() }}
