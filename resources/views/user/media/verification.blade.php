@component('user._layout',['active'=>'media','header'=>__('user.media_info')])

    <ol>
        <li>
            <p>
                请复制以下代码添加到网页<b class="ml-1 mr-1">https://{{$media->domain}}/</b>
                <span class="text-secondary">( 或http://{{$media->domain}}/ )</span>
                的
                @include('components.contents.code',['code'=>'<head></head>'])
                标签之间
            </p>

            @include('components.contents.code',['code'=>'<meta name="malllian-verification" content="'.$media->verification_key.'" />'])
        </li>
        <li>
            @include('components.buttons.post',[
                'name'=>__('media.start_verification'),
                'action'=>route('user.media.verification',[Auth::id(),$media->id])
            ])
        </li>
    </ol>

    <p class="alert alert-info">
        验证成功后请勿删除验证代码,将会定期检测更新
    </p>

@endcomponent
