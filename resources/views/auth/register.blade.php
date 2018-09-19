@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">

            @component('components.containers.card')
                @slot('header')
                    {{ __('Register') }}
                @endslot

                @component('components.form.layout',['action'=>route('register'),'submit'=>false])

                    @include('components.form.text',[
                        'label'=>__('Nickname'),
                        'name'=>'name',
                    ])

                    @include('components.form.text',[
                        'label'=>__('form.mobile'),
                        'name'=>'mobile',
                    ])

                    @include('components.form.mobile_verification_code')

                    @include('components.form.text',[
                        'label'=>__('Password'),
                        'name'=>'password',
                        'type'=>'password'
                    ])

                    @include('components.form.text',[
                        'label'=> __('Confirm Password'),
                        'name'=>'password_confirmation',
                        'type'=>'password'
                    ])

                    @include('components.form.submit',['text'=> __('Register')])

                @endcomponent

            @endcomponent

        </div>
    </div>
@endsection
