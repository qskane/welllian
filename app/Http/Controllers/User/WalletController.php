<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\WalletLog;

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
        $wallet = Wallet::owner()->firstOrFail();

        $this->authorize('view', $wallet);

        $logs = WalletLog::to($wallet->id)->latest('id')->paginate();

        return view('user.wallet.log', compact('logs'));
    }

}
