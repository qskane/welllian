@component('user._layout',['active'=>'media','header'=>__('user.media_info')])

    <ol>
        <li>
            <p>复制以下代码添加到<b>{{$media->domain}}</b>首页<code>{{"<head></head>"}}</code>之间</p>
            <div class="alert alert-secondary" role="alert">
                <code>{{'<meta name="malllian-verification" content="'.$media->verification_key.'" />'}}</code>
            </div>
        </li>
        <li>
            @include('components.buttons.post',[
                'name'=>__('verification'),
                'action'=>route('user.media.verification',[Auth::id(),$media->id])
            ])
        </li>
    </ol>

@endcomponent
