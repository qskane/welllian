@php
    $title=__('user.home');
@endphp




@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-2">
            @include('user._menu',['active'=>'base'])
        </div>
        <div class="col-sm-12 col-md-2">

            @component('components.cards.layout')
                @slot('header')
                    {{__('user.base_info')}}
                @endslot

                @component('components.form.layout',['action'=>route('user.edit',$user->id),'submitText'=>__('form.save')])

                    @include('components.form.text',[
                        'label'=>__('form.nickname'),
                        'name'=>'name',
                        'default'=>$user->name
                    ])

                    @include('components.form.text',[
                        'label'=>__('form.mobile'),
                        'name'=>'mobile',
                        'default'=>$user->mobile,
                        'disabled'=>true
                    ])

                @endcomponent

            @endcomponent

        </div>

    </div>


@endsection
