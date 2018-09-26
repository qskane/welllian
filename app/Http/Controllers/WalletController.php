<?php

namespace App\Http\Controllers;

use App\Models\Wallet;

class WalletController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show($id)
    {
        $wallet = (new Wallet)->findOrFailByUser($id);

        $this->authorize('view', $wallet);

        return view('user.wallet.show', compact('wallet'));
    }
}
