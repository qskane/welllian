@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-8">
            @component('components.cards.layout',['header'=>__('Reset Password')])


                @component('components.form.layout',['action'=>route('password.mobile_reset')])

                    @include('components.form.text',[
                        'label'=>__('form.mobile'),
                        'name'=>'mobile',
                        'default'=>$mobile??''
                    ])

                    @include('components.form.mobile_verification_code')

                    @include('components.form.text',[
                        'label'=>__('form.new_password'),
                        'name'=>'password',
                        'type'=>'password'
                    ])

                    @include('components.form.text',[
                        'label'=> __('form.new_password_confirm'),
                        'name'=>'password_confirmation',
                        'type'=>'password'
                    ])

                @endcomponent

            @endcomponent
        </div>
    </div>

@endsection
