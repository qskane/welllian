<ul class="list-group bmd-list-group-sm">
    @php
        $items = [
             ['link'=>route('user.profile.edit',Auth::id()),'name'=>__('user.profile_info'),'key'=>'profile'],
             ['link'=>route('user.wallet.show',Auth::id()),'name'=>__('user.wallet_info'),'key'=>'wallet'],
             ['link'=>route('user.media.index',Auth::id()),'name'=>__('user.media_info'),'key'=>'media'],
        ];
    @endphp
    @foreach($items as $item)
        <a href="{{$item['link']}}"
           class="list-group-item {{$active=== $item['key'] ? 'active':''}}">{{$item['name']}}</a>
    @endforeach
</ul>
