<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
    </tr>
    </thead>
    <tbody>
    @foreach($medias as $media)
        <tr>
            <th scope="row">1</th>
            <td>{{$media->name}}</td>
            <td>{{$media->domain}}</td>
            <td>{{$media->logo}}</td>
            <td>{{$media->description}}</td>
            <td>{{$media->key}}</td>
            <td>{{$media->secret}}</td>
            <td>{{$media->verification_key}}</td>
            <td>{{$media->verified}}</td>
            <td>{{$media->providing}}</td>
            <td>{{$media->consuming}}</td>
            <td>{{$media->consume_bid}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $medias->links() }}
