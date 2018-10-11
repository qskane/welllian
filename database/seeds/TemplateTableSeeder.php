<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{

    public function run()
    {
        $userId = config('web.official_user_id');

        \App\Models\Template::insert([
            [
                'name' => 'fake',
                'html' => '
<style>#{{$container}}-container{
color:red;
}</style>
@for($i=0;$i<5;$i++)
    <p id=\'{{$container}}-container\'>example {{$i}}</p>
@endfor
<script>
  (function(){
    var container = document.getElementById(\'{{$container}}-container\');
    console.log(container);
    console.log(111);
  })();
</script>
',
                'user_id' => $userId,
                'description' => '',
                'quantity' => 0,
            ],
            [
                'name' => 'fake 222',
                'html' => '
<style>#{{$container}}-container{
color:blue;
}</style>
@for($i=0;$i<5;$i++)
    <p id=\'{{$container}}-container\'>example {{$i}}</p>
@endfor
<script>
  (function(){
    var container = document.getElementById(\'{{$container}}-container\');
    console.log(container);
    console.log(222);
  })();
</script>
',
                'user_id' => $userId,
                'description' => 'Fancy larger or smaller buttons?Fancy larger or smaller buttons? Add .btn-lg or .btn-sm for additional sizes.',
                'quantity' => 0,
            ],
            [
                'name' => 'items',
                'html' => '
            @php
                $container = \'#\'.$container;
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
                @foreach($medias as $media)
                    <li class="league-item-container">
                        <a href="{{$media->url}}">
                            <div class="league-item-warp">
                                <img src="{{$media->logo}}" class="league-item-logo"/>
                            </div>
                            <h4 class="league-item-name">{{$media->name}}</h4>
                        </a>
                    </li>
                @endforeach
            </ul>
            ',
                'user_id' => $userId,
                'description' => 'Fancy larger or smaller buttons? Add .btn-lg or .btn-sm for additional sizes.',
                'quantity' => 10,
            ],
        ]);

    }
}
