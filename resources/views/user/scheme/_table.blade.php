<table class="table">
    <thead>
    <tr>
        <th>{{__('name')}}</th>
        <th>{{__('media.name')}}</th>
        <th>{{__('scheme.container')}}</th>
        <th>{{__('template.name')}}</th>
        <th>{{__('scheme.running')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($schemes as $scheme)
        <tr>
            <td>{{$scheme->name}}</td>
            <td>
                <a href="{{route('user.media.show',$scheme->media->id)}}">
                    {{str_limit($scheme->media->name,20)}}
                </a>
            </td>
            <td>
                @include('components.contents.code',['code'=>$scheme->container])
            </td>
            <td>
                <a href="{{route('user.template.show',$scheme->template->id)}}">
                    {{str_limit($scheme->template->name,20)}}
                </a>
            </td>
            <td>
                @include('components.contents.status',['status'=>$scheme->running])
            </td>
            <td>
                @include('user.scheme._operations')
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
