<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        $wallet = (new Wallet)->findOrFailByUser(Auth::id());

        $this->authorize('view', $wallet);

        return view('user.wallet.show', compact('wallet'));
    }
}
