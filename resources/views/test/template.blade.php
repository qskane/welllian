
@php
    $container = '#'.$container;
@endphp
<style>
    {{$container}} .league-container {
        list-style: none;
        text-align: center;
        position: relative;
        max-width: 1200px;
        min-width: 800px;
        margin: auto;
        overflow: hidden;
        padding: 0;
    }

    {{$container}} .league-item-container {
        float: left;
        padding: 4px;
        width: 20%;
        box-sizing: border-box;
        height: 120px;
        border: 1px solid transparent;
        overflow: hidden;
        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        filter: grayscale(1); /* Microsoft Edge and Firefox 35+ */
    }

    {{$container}} .league-item-container:hover {
        border: 1px solid orangered;
        -webkit-filter: grayscale(0);
        filter: none;
    }

    {{$container}} a {
        text-decoration: none;
        display: block;
    }

    {{$container}} .league-item-name {
        color: darkgray;
        margin: 0;
        font-size: 18px;
        text-decoration: none;
    }

    {{$container}} .league-item-warp {
        height: 80px;
        text-align: center;

        display: flex;
        justify-content: center; /* align horizontal */
        align-items: center; /* align vertical */

    }

    {{$container}} .league-item-logo {
        max-width: 100px;
        max-height: 100px;
        margin: auto;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>

<ul class="league-container">
    @foreach($consumers as $consumer)
        <li class="league-item-container">
            <a href="{{$consumer->url}}">
                <div class="league-item-warp">
                    <img src="{{$consumer->logo}}" class="league-item-logo"/>
                </div>
                <h4 class="league-item-name">{{$consumer->name}}</h4>
            </a>
        </li>
    @endforeach
</ul>
