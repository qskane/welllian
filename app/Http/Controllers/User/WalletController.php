<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;

class WalletController extends Controller
{

    public function show()
    {
        $wallet = Wallet::owner()->firstOrFail();

        $this->authorize('view', $wallet);

        return view('user.wallet.show', compact('wallet'));
    }

    public function log()
    {
        // FIXME

        return view('user.wallet.log');
    }

}
