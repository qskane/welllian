<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;

class WebController extends Controller
{

    public function home()
    {
        return view('web.home');
    }

    public function feedback()
    {
        return view('web.feedback');
    }

    public function storeFeedback(FeedbackRequest $request)
    {
        Feedback::create(
            array_merge(
                $request->inputs(),
                [
                    'user_id' => auth()->id(),
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]
            )
        );

        return back()->with('status', true);
    }

}
