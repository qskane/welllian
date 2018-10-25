<?php

namespace App\Http\Controllers;

use Aliyun\Core\Config;
use App\Jobs\LeagueConsumeJob;
use App\Models\Media;

class TestController extends Controller
{

    public function index()
    {
        Config::load();

        return view('test.index');
    }

    public function view()
    {
        $consumers = Media::all();

        return view('test.view', compact('consumers'));
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
