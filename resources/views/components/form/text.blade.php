@php
    $required = isset($required)? (boolean)$required:true;
@endphp

<div class="form-group row">
    <label for="{{$name}}"
           class="col-sm-12 col-md-3 col-form-label text-md-right {{!$required?'text-secondary':''}}"
    >{{$label??''}}
        @if(!$required)
            <span class="ml-1">({{__('form.optional')}})</span>
        @endif
    </label>
    <div class="col-sm-12 col-md-8">

        <input id="{{$name}}"
               class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}"
               name="{{$name}}"
               value="{{ old($name) ?? ($default??null) }}"
               placeholder="{{$placeholder??''}}"
               type="{{$type??'text'}}"
               @if($required) required @endif
               @if($autofocus ?? false) autofocus @endif
               @if($disabled ?? false) disabled @endif
        >

        @if($help ?? false)
            <small id="{{$name}}}-help" class="form-text text-muted">{!! $help !!}</small>
        @endif

        <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->has($name) ? $errors->first($name) : $label . __('form.invalid_input') }}</strong>
        </span>

        @if($validFeedback??false)
            <span class="valid-feedback" role="alert">
                <strong>{{$validFeedback}}</strong>
            </span>
        @endif

    </div>
</div>
