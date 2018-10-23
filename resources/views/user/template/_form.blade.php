@php
    $template = $template ?? new \App\Models\Template;
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('name'),
        'name'=>'name',
        'default'=>$template->name,
    ])

    @include('components.form.text',[
        'label'=>__('template.preview_media_quantity'),
        'name'=>'quantity',
        'default'=>$template->quantity,
    ])

    @include('components.form.textarea',[
        'label'=>__('template.source_code'),
        'name'=>'html',
        'default'=>$template->html,
        'help'=>'<a href="#">fake help message</a>'
    ])

    @include('components.form.textarea',[
        'label'=>__('description'),
        'name'=>'description',
        'default'=>$template->description,
        'required'=>false
    ])

@endcomponent
