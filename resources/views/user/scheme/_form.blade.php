@php
    $scheme = $scheme ?? new \App\Models\Scheme();
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('name'),
        'name'=>'name',
        'default'=>$scheme->name,
    ])

    @include('components.form.text',[
        'label'=>__('scheme.container'),
        'name'=>'name',
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

    @include('components.form.select',['label'=>__('media.name'),'name'=>'media','options'=>auth()->user()->medias])

    @include('components.form.select',['label'=>__('template.name'),'name'=>'media','options'=>\App\Models\Template::all()])

    @if($extra ?? false)
        {{$extra}}
    @endif

@endcomponent
