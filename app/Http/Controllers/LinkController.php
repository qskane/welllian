<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use Illuminate\Http\Request;

class LinkController extends Controller
{

    // http://malllian-dev.com/link/league?producer=8wz0u8ekgoi23333&consumer=8wz0u8ekgoi24444&redirect=http%3A%2F%2Fwww.qq.com%3Fuser%3D1
    public function league(Request $request)
    {
        $producer = $request->get('producer');
        $consumer = $request->get('consumer');
        $redirect = $request->get('redirect');

        dispatch(new LeagueConsumeJob($producer, $consumer));

        return redirect($redirect);
    }

}
