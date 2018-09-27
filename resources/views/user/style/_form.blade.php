@php
    $style = $style ?? new \App\Models\Style();
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('style.name'),
        'name'=>'name',
        'default'=>$style->name,
    ])

    <div class="form-group row">
        <label for="css" class="col-sm-12 col-md-3 col-form-label text-md-right">
            CSS
        </label>
        <div class="col-sm-12 col-md-8">
            <textarea class="form-control" rows="6"></textarea>
        </div>
    </div>

@endcomponent
