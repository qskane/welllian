<?php

namespace App\Http\Controllers;

use Aliyun\Core\Config;
use App\Jobs\LeagueConsumeJob;
use App\Models\Media;
use Parsedown;
use Storage;

class TestController extends Controller
{

    public function index()
    {

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

        //        return view('test.league');
    }

}
