<fieldset class="form-group">
    <div class="row">
        <label class="col-form-label col-sm-12 col-md-3 pt-0 text-md-right">{{$label}}</label>
        <div class="col-sm-12 col-md-8">
            @foreach($options as $option)
                <div class="form-check {{$inline ?? 'form-check-inline'}}">
                    <input type="radio"
                           name="{{$name}}"
                           id="{{$name}}-{{$loop->iteration}}"
                           value="{{$option['value']}}"
                           class="form-check-input"
                           @if(isset($selected) && $selected === $option['value']) checked @endif
                           @if(isset($disableds) && in_array($option['value'],$disableds)) disabled @endif
                    />
                    <label class="form-check-label" for="{{$name}}-{{$loop->iteration}}">{{$option['name']}}</label>
                </div>
            @endforeach
        </div>
    </div>
</fieldset>
