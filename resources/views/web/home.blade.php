@extends("layout.app")
@section('content')


    @php
        $items = [
            'id'=>1,
            "name"=>'name1',
            "children"=>[
                [
                'id'=>2,
                "name"=>'name2',
                ],
                [
                'id'=>3,
                "name"=>'name3',
                ]
            ]
        ];
    @endphp

    <tree-menu :menu="@vue($items)"></tree-menu>

@endsection


