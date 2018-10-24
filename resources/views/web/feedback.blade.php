@extends('layout.app')
@section('content')

    <div class="container">
        @component('components.cards.layout',['header'=>__('feedback')])
            <div class="row">
                <div class="alert alert-light col-6 offset-3" role="alert">
                    {{__('web.feedback_explain')}}
                </div>
            </div>

            @component('components.form.layout',['action'=>route('feedback')])

                @include('components.form.text',[
                  'label'=>__('contact'),
                  'name'=>'contact',
                ])

                @include('components.form.textarea',[
                    'label'=>__('content'),
                    'name'=>'content',
                ])
            @endcomponent
        @endcomponent
    </div>


@endsection
