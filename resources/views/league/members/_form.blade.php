@component('components.form.layout',['action'=>route('member.store')])

    @include('components.form.text',[
        'label'=>__('form.telephone'),
        'name'=>'telephone',
    ])

    {{--<div class="form-group row">--}}
        {{--<label for="password"--}}
               {{--class="col-md-4 col-form-label text-md-right">{{ __('form.telephone_verification_code') }}</label>--}}
        {{--<div class="col-md-2">--}}
            {{--<input id="telephone_verification_code" class="form-control" name="telephone_verification_code" required/>--}}
        {{--</div>--}}
        {{--<div class="col-md-4">--}}
            {{--<button type="button" class="btn btn-raised">{{__('send')}}</button>--}}
        {{--</div>--}}
        {{--<span class="invalid-feedback" role="alert">--}}
            {{--<strong>{{ $errors->has('telephone_verification_code') ? $errors->first('telephone_verification_code') : __('form.telephone_verification_code') . __('form.invalid_input') }}</strong>--}}
        {{--</span>--}}
    {{--</div>--}}

    @include('components.form.telephone_verification_code')

    @include('components.form.text',[
        'label'=>__('E-Mail Address'),
        'name'=>'email',
        'required'=>false
    ])

@endcomponent
