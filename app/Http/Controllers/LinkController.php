<?php

namespace App\Http\Controllers;

use App\Jobs\LeagueConsumeJob;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function league(Request $request)
    {
        $produce = $request->get('produce');
        $consume = $request->get('consume');
        $redirect = $request->get('redirect');

        dispatch_now(new LeagueConsumeJob($produce, $consume));


        dd('done');
//        return redirect($redirect);
    }

}
