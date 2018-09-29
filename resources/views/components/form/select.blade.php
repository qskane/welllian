<div class="form-group row">
    <label class="col-sm-12 col-md-3 col-form-label text-md-right" for="select-{{$name}}">{{$label}}</label>
    <div class=" col-sm-12 col-md-8">
        <select class="form-control {{ $errors->has($name) ? ' is-invalid' : '' }}" name="{{$name}}"
                id="select-{{$name}}">
            @if($slot ?? false)
                {{$slot}}
            @else
                @foreach($options as $option)
                    @php
                        if($option instanceof \Illuminate\Database\Eloquent\Model){
                            $option = [
                                'name'=>$option->name,
                                'value'=>$option->id,
                            ];
                        }
                    @endphp
                    <option value="{{$option['value']}}"
                            @if(isset($selected) && $option['value'] ===$selected) selected @endif
                    >{{$option['name']}}</option>
                @endforeach
            @endif
        </select>
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
