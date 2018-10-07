<style>
   #{{$container}} .league-container {
        list-style: none;
        text-align: center;
        position: relative;
        min-width: 1000px;
        max-width: 1200px;
        margin: auto;
        overflow: hidden;
    }

   #{{$container}} .league-container .league-item-container {
        float: left;
        padding: 15px;
        width: 25%;
        box-sizing: border-box;
        height: 120px;
        border: 1px solid transparent;

        filter: gray; /* IE6-9 */
        -webkit-filter: grayscale(1); /* Google Chrome, Safari 6+ & Opera 15+ */
        filter: grayscale(1); /* Microsoft Edge and Firefox 35+ */
    }

   #{{$container}} .league-container .league-item-container:hover {
        border: 1px solid darkgray;
        -webkit-filter: grayscale(0);
        filter: none;
    }

   #{{$container}} .league-container .league-container a {
        text-decoration: none;
        display: block;
    }

   #{{$container}} .league-container .league-item-name {
        color: darkgray;
        margin: 0;
    }

   #{{$container}} .league-item-logo-warp{
       height: 100px;
    }

   #{{$container}} .league-container .league-item-logo {
        max-width: 100px;
        max-height: 100px;
        margin: auto;
        background-repeat: no-repeat;
        background-size: contain;
    }
</style>

<ul class="league-container">
    @foreach($items as $item)
        <li class="league-item-container">
            <a href="{{$item['promotion_url']}}">
                <img src="{{$item['logo']}}"
                     class="league-item-logo"/>
                <h6 class="league-item-name">{{$item['name']}}</h6>
            </a>
        </li>
    @endforeach
</ul>
