@component('components.form.layout',['action'=>route('member.store')])

    @include('components.form.text',[
        'label'=>__('form.telephone'),
        'name'=>'telephone',
    ])

    @include('components.form.telephone_verification_code')

    @include('components.form.text',[
        'label'=>__('E-Mail Address'),
        'name'=>'email',
        'required'=>false
    ])

@endcomponent
