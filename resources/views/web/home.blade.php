@extends("layout.app")
@section('content')

    @php
        viewer()->storage('menu',['name'=>'menu name']);
    @endphp

    <tree-menu :menu="menu"></tree-menu>
@endsection


