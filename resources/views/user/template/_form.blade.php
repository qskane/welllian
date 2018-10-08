@php
    $template = $template ?? new \App\Models\Template;
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('name'),
        'name'=>'name',
        'default'=>$template->name,
    ])

    @include('components.form.textarea',[
        'label'=>__('template.html'),
        'name'=>'html',
        'default'=>$template->html,
        'help'=>'<a href="#">help message</a>'
    ])

    @php
        // FIXME fix help message
    @endphp

@endcomponent
