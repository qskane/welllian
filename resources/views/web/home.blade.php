@php
    $padding = 'p0';
    //$fake = \Faker\Factory::create();
@endphp
@extends("layout.app")
@section('content')

    @push('style')
        <style>
            #home-header {
                padding-top: 24vh;
                padding-bottom: 18vh;
            {{--background: linear-gradient(45deg, {{$fake->rgbCssColor}}, {{$fake->rgbCssColor}})--}}










            }

            #header-title {
                /*background-color: #0000001f !important;*/
                color: white !important;
                /*display: inline-block;*/
            }
        </style>
    @endpush
    <section id="home-header" class="bg-black">
        <div class="container">
            <div class="row">
                <h1 id="header-title" class="p-5 col-12 text-center">Bootstrap 4 Grid Template</h1>
                <div class="col-4 offset-4 text-center">
                    <a class="btn btn-light btn-block" href="#">FREE</a>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-warning">2</div>
            <div class="col-md-6 col-sm-12 bg-black">1</div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-12 bg-black">1</div>
            <div class="col-md-6 col-sm-12 bg-warning">2</div>
        </div>

    </section>



@endsection


