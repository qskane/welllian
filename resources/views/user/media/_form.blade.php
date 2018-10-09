@php
    $media = $media ?? new \App\Models\Media();
@endphp

@component('components.form.layout',['action'=>$action,'method'=>$method??'POST'])

    @include('components.form.text',[
        'label'=>__('media.name'),
        'name'=>'name',
        'default'=>$media->name,
    ])

    @include('components.form.text',[
        'label'=>__('media.domain'),
        'name'=>'domain',
        'default'=>$media->domain,
        'help'=>__('media.domain_with_schema'),
        'placeholder'=>'www.awesome.com'
    ])

    @include('components.form.text',[
        'label'=>__('media.consume_url'),
        'name'=>'consume_url',
        'default'=>$media->consume_url,
        'help'=>__('media.same_domain_required'),
        'placeholder'=>'https://www.awesome.com/blog?perfect=1'
    ])

    @include('components.form.text',[
        'label'=>__('media.logo'),
        'name'=>'logo',
        'default'=>$media->logo,
        'required'=>false
    ])

    @include('components.form.text',[
        'label'=>__('media.description'),
        'name'=>'description',
        'default'=>$media->description,
        'required'=>false
    ])

    @if($extra ?? false)
        {{$extra}}
    @endif


@endcomponent
