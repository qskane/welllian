<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use App\Models\Media;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function index()
    {
        //        $collection = collect(['product_id' => 1, 'name' => 'Desk', 'price' => 100, 'discount' => false]);

        $collection = Media::all();
        $a = $collection->pluck('name', 'id');
        dd($a);

        $filtered = $collection->each->only(['id', 'name']);

        dd($collection, $filtered, $filtered->all());
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
