@extends('layout.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @component('components.cards.layout')
                    @slot('header')
                        {{ __('register') }}
                    @endslot

                    @component('components.form.layout',['action'=>route('register'),'submit'=>false])

                        @include('components.form.text',[
                            'label'=>__('user.mobile'),
                            'name'=>'mobile',
                        ])

                        @include('components.form.mobile_verification_code')

                        @include('components.form.text',[
                            'label'=>__('user.password'),
                            'name'=>'password',
                            'type'=>'password'
                        ])

                        @include('components.form.text',[
                            'label'=> __('user.confirm_password'),
                            'name'=>'password_confirmation',
                            'type'=>'password'
                        ])

                        @include('components.form.submit',['text'=> __('register')])

                    @endcomponent

                @endcomponent

            </div>
        </div>
    </div>

@endsection
