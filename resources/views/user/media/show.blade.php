@component('user.layout',['active'=>'media','header'=>__('user.media_info')])

    @include('components.lists.list_key_value',['items'=>[
        [__('name'), $media->name],
        [__('media.domain'), $media->domain],
        [__('media.key'), $media->key],
        [__('media.consume_url'), $media->consume_url],
        [__('media.logo'), $media->logo ? "<img src='{$media->logo}' style='max-width:100px;'/>" : ''],
        [__('media.description'), $media->description],
        [__('media.verification_code'), '<meta name="malllian-verification" content="'.$media->verification_key.'" />', 'CODE'],
        [__('media.verified'), $media->verified, 'STATUS'],
        [__('media.providing'), $media->providing, 'STATUS'],
        [__('media.consuming'), $media->consuming, 'STATUS'],
        [__('media.consume_bid'), $media->consume_bid],
        [__('created_at'), $media->created_at],
    ]])

    <div class="text-center">
        @include('user.media._operations',['show'=>false,'delete'=>true])
    </div>

@endcomponent
