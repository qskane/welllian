<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;

class TestController extends Controller
{

    public function index()
    {
        $producer = '8wz0u8ekgoi21111';
        $consumer = '8wz0u8ekgoi23333';

        dispatch_now(new LeagueConsumeJob($producer, $consumer));

        dd(11);

        return view('test.index');
    }

    public function view()
    {
        return view('test.view');
    }

    public function league()
    {
        return view('test.league');
    }

}
