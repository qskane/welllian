<?php

use Illuminate\Database\Seeder;

class TemplateTableSeeder extends Seeder
{

    public function run()
    {
        $userId = config('web.official_user_id');

        \App\Models\Template::insert([
            [
                'html' => '
<div style=" border: 1px solid #d2d2d2;background-color: #ffffff;padding: 0.5em;border-radius: 4px;">
    <div style="display: flex;flex-wrap: wrap;">
        @foreach($consumers as $consumer)
            <a href="{{$consumer->url}}">
                <div class="item" style="padding: 0 0.5em;width: 10em;overflow: hidden;">
                    <img src="{{$consumer->logo}}" style="display: inline;max-width: 2rem;max-height: 1em"
                         onerror="this.src=\'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_86d58ae1.png\'"
                    />
                    {{$consumer->name}}
                </div>
            </a>
        @endforeach
    </div>
    <div style="text-align: right">
        <small style="color: darkgray">
            由<a href="https://welllian.com" style="color: darkgray">微联</a>提供
        </small>
    </div>
</div>

',
                'name' => '横向列表-小LOGO',
                'user_id' => $userId,
                'description' => '横向列表-小LOGO',
                'quantity' => 10,
            ],
            [
                'html' => '
<div style="width: 10rem;border: 1px solid #d2d2d2;background-color: #ffffff;padding: 1em;border-radius: 4px;">
    <ul style="list-style: none;padding: 0;margin-bottom: 4px;">
        @foreach($consumers as $consumer)
            <li>
                <a href="{{$consumer->url}}">
                    <div style="width:2rem;display: inline-block;text-align: left">
                        <img src="{{$consumer->logo}}" style="max-width: 100%;max-height: 1em"
                             onerror="this.src=\'https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo_top_86d58ae1.png\'"
                        />
                    </div>
                    <span>{{$consumer->name}}</span>
                </a>
            </li>
        @endforeach
    </ul>
    <div style="text-align: right">
        <small style="color: darkgray">
            由<a href="https://welllian.com" style="color: darkgray">微联</a>提供
        </small>
    </div>
</div>

',
                'name' => '纵向列表-小LOGO',
                'user_id' => $userId,
                'description' => '纵向列表-小LOGO',
                'quantity' => 10,
            ],
            [
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
            ',
                'name' => '5列格子-大LOGO-灰',
                'description' => '5列格子-大LOGO-灰',
                'user_id' => $userId,
                'quantity' => 10,
            ],
        ]);

    }
}
