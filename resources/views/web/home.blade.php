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

            /*#header-title {*/
            /*!*background-color: #0000001f !important;*!*/
            /*color: white !important;*/
            /*!*display: inline-block;*!*/
            /*}*/

            .block {
                min-height: 20rem;
            }

            .block img {
                max-width: 100%;
            }
        </style>
    @endpush

    <section id="home-header" class="bg-black">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-center text-white font-weight-bold">微</h1>
                <p class="col-12 text-center text-white">微小势力，共创奇迹。</p>
                <p class="col-12 text-center text-white">现在的微不足道，也许是明天的惊涛海啸。</p>
                <div class="col-4 offset-4 text-center">
                    <a class="btn btn-light btn-block" href="#">开始联盟</a>
                </div>
            </div>
        </div>
    </section>


    <section id="home-header" class="bg-dark">
        <div class="container">
            <div class="row">
                <h1 class="col-12 text-center text-white font-weight-bold">联</h1>
                <p class="col-12 text-center text-white"></p>
                <p class="col-12 text-center text-white"></p>
                <div class="col-4 offset-4 text-center">
                    <a class="btn btn-light btn-block" href="#">开始联盟</a>
                </div>
            </div>
        </div>
    </section>


    <section id="home-header" class="bg-secondary">
        <div class="container">
            <div class="row">
                <h1 id="header-title" class="p-5 col-12 text-center">Bootstrap 4 Grid Template</h1>
                <div class="col-4 offset-4 text-center">
                    <a class="btn btn-light btn-block" href="#">FREE</a>
                </div>
            </div>
        </div>
    </section>



    <section id="home-header" style="background-color: #45475a">
        <div class="container">
            <div class="row">
                <h1 id="header-title" class="p-5 col-12 text-center">Bootstrap 4 Grid Template</h1>
                <div class="col-4 offset-4 text-center">
                    <a class="btn btn-light btn-block" href="#">FREE</a>
                </div>
            </div>
        </div>
    </section>

    {{--<section>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6 col-sm-12 block m-0 pr-1 pb-1 ">--}}
    {{--<div class="justify-content-center align-self-center text-bold">--}}
    {{--All-new Liquid Retina display — the most advanced LCD in the industry. Even faster Face ID. The--}}
    {{--smartest, most powerful chip in a smartphone. And a breakthrough camera system with Depth Control.--}}
    {{--iPhone XR. It’s beautiful any way you look at it.--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6 col-sm-12  block m-0 pl-1 pb-1">--}}
    {{--<img src="/fake/1.jpg"/>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-6 col-sm-12 block m-0 pr-1 pb-1">--}}
    {{--<img src="/fake/3.jpg"/>--}}
    {{--</div>--}}
    {{--<div class="col-md-6 col-sm-12  block m-0 pl-1 pb-1">--}}
    {{--<img src="/fake/2.jpg"/>--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--</section>--}}



@endsection


