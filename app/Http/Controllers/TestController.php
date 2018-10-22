<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {

        dd(env('PUSHER_APP_ID',10));

        //        return view('test.index');
    }

    public function view()
    {
        return view('test.vue_template');
    }

    public function league()
    {
        $producer = '8wz0u8ekgoi21111';
        $consumer = '8wz0u8ekgoi23333';
        dispatch_now(new LeagueConsumeJob($producer, $consumer));
        dd(11);

        return view('test.league');
    }

}
