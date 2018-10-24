<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use App\Models\Media;
use App\Models\Wallet;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        $consumers = [
            [
                'name' => 'consumer-1',
                'logo' => 'consumer-1-logo-url',
                'url' => 'consumer-1-url',
                'description' => 'consumer-1-description',
            ],
            [
                'name' => 'consumer-1',
                'logo' => 'consumer-1-logo-url',
                'url' => 'consumer-1-url',
                'description' => 'consumer-1-description',
            ],
        ];

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
