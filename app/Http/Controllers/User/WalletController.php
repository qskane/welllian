<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;

class WalletController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show()
    {
        $wallet = Wallet::owner()->firstOrFail();

        $this->authorize('view', $wallet);

        return view('user.wallet.show', compact('wallet'));
    }
}
