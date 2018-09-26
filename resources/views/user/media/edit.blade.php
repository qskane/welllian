@component('user._layout',['active'=>'media','header'=>__('user.media_info')])


    @component('user.media._form',['action'=>route('user.media.update',[Auth::id(),$media->id]),'media'=>$media,'method'=>'PATCH'])

        @slot('extra')

            @include('components.form.radio_determine',[
                'label'=>__('media.providing'),
                'name'=>'providing',
                'selected'=>$media->providing
            ])

            @include('components.form.radio_determine',[
               'label'=>__('media.consuming'),
               'name'=>'consuming',
               'selected'=>$media->consuming
            ])

            @include('components.form.text',[
               'label'=>__('media.consume_bid'),
               'name'=>'consume_bid',
               'default'=>$media->consume_bid
            ])

        @endslot

    @endcomponent


@endcomponent
