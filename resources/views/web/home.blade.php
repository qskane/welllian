@php
    $padding = 'p0';
@endphp
@extends("layout.app")
@section('content')

    @push('style')
        <style>
            .home-section {
                padding-top: 24vh;
                padding-bottom: 18vh;
            }
        </style>
    @endpush

    @php

        $joinLink = route('register');
        $detailLink = route('article.show',config('web.article.document_getting_start'));
        $linkBlock =  "<p>
                        <a href='$detailLink' class='pr-2 text-info'>了解详情</a>
                        <a href='$joinLink' class='pl-2 text-info'>加入联盟</a>
                    </p>";
    @endphp

    <section class="bg-black home-section">
        <div class="container">
            <div class="col-12 text-center text-white">
                <h1><span class="mr-3">微</span>·<span class="ml-3">联</span></h1>
                <p>微联是基于中小网站联盟的互联网真实流量互换平台。</p>
                {!! $linkBlock !!}
            </div>

        </div>
    </section>

    <section class="bg-dark home-section">
        <div class="container">
            <div class="text-center text-light">
                <h1>微</h1>
                <p>微小势力，共创奇迹。</p>
                <p>现在的微不足道，也许是明天的惊涛海啸。</p>
                {!! $linkBlock !!}
            </div>
        </div>
    </section>

    <section class="bg-secondary home-section">
        <div class="container">
            <div class="col-12 text-center text-white ">
                <h1>联</h1>
                <p>互联为网，互联为王。</p>
                <p>孤军奋战是悲壮，取长补短是更强。</p>
                {!! $linkBlock !!}
            </div>
        </div>
    </section>



@endsection
