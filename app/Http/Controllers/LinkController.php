<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function league(Request $request)
    {
        // http://malllian-dev.com/link/league?producer=8wz0u8ekgoi23333&consumer=8wz0u8ekgoi24444

        $producer = $request->get('producer');
        $consumer = $request->get('consumer');
        $redirect = $request->get('redirect');

        dispatch_now(new LeagueConsumeJob($producer, $consumer));


        dd('done');
        //        return redirect($redirect);
    }

}
