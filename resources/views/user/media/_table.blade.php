<table class="table" style="min-width: 700px">
    <thead>
    <tr>
        <th>{{__('media.name')}}</th>
        <th>{{__('media.domain')}}</th>
        <th>{{__('media.verified')}}</th>
        <th>{{__('media.providing')}}</th>
        <th>{{__('media.consuming')}}</th>
        <th>{{__('media.consume_bid')}}</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($medias as $media)
        <tr>
            <td>{{str_limit($media->name,20)}}</td>
            <td>{{str_limit($media->domain,20)}}</td>
            <td>
                @include('components.contents.status',['status'=>$media->verified])
            </td>
            <td>
                @include('components.contents.status',['status'=>$media->providing])
            </td>
            <td>
                @include('components.contents.status',['status'=>$media->consuming])
            </td>
            <td>{{$media->consume_bid}}</td>
            <td>
                <a href="{{route('user.media.show',[Auth::id(),$media->id])}}">{{__('show')}}</a>
                <a href="{{route('user.media.edit',[Auth::id(),$media->id])}}">{{__('edit')}}</a>
                @if(!$media->verified)
                    <a href="{{route('user.media.verification',[Auth::id(),$media->id])}}">{{__('verification')}}</a>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $medias->links() }}
