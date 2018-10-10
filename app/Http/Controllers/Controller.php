<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function alertSuccess($message = null)
    {
        session()->flash('message', $message ?? __('success'));
        session()->flash('status', true);
    }

    protected function alertFail($message = null)
    {
        session()->flash('message', $message ?? __('fail'));
        session()->flash('status', false);
    }

    protected function alert($status, $success = null, $fail = null)
    {
        $status ? $this->alertSuccess($success) : $this->alertFail($fail);
    }

}
