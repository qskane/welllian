@php
    $scheme = $scheme ?? new \App\Models\Scheme;
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('name'),
        'name'=>'name',
        'default'=>$scheme->name,
    ])

    @include('components.form.text',[
        'label'=>__('scheme.container'),
        'name'=>'container',
        'default'=>$scheme->container,
        'help'=>__('scheme.container_explain')
    ])

    @php
        $quantities = [];
        for($i=1;$i<=config('league.scheme.max_quantity');$i++){
            $quantities[] = ['name'=>$i,'value'=>$i];
        }
    @endphp
    @include('components.form.select',['label'=>__('scheme.quantity'),'name'=>'quantity','options'=>$quantities,'help'=>__('scheme.quantity_explain')])

    @include('components.form.select',['label'=>__('media.name'),'name'=>'media_id','options'=>auth()->user()->verifiedMedias()])

    @include('components.form.select',['label'=>__('template.name'),'name'=>'template_id','options'=>\App\Models\Template::all()])

    @include('components.form.radio_determine',[
        'label'=>__('scheme.running'),
        'name'=>'running',
        'selected'=>$scheme->running ?? 0
    ])

@endcomponent
