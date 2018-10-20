<?php

namespace App\Jobs;

use App\Models\LeagueLog;
use App\Models\Media;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class LeagueConsumeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $produce;
    protected $consume;
    protected $userAgent;
    protected $ip;


    public function __construct($produce, $consume)
    {
        $this->produce = $produce;
        $this->consume = $consume;
        $this->userAgent = request()->userAgent();
        $this->ip = request()->ip();
    }

    public function handle()
    {
        $produceMedia = Media::with('wallet')->key($this->produce)->first();
        $consumeMedia = Media::with('wallet')->key($this->consume)->first();

        if (!$produceMedia || !$consumeMedia) {
            return;
        }

        $produceWalletId = $produceMedia->wallet->id;
        $consumeWalletId = $consumeMedia->wallet->id;
        if (!$produceWalletId || !$consumeWalletId) {
            return;
        }

        $status = transfer()->fromWallet($consumeWalletId)
            ->toWallet($produceWalletId)
            ->coin($consumeMedia->consume_bid)
            ->force(true)
            ->category(config('web.wallet_log_category.league'))
            ->run();

        // FIXME transfer failed

        LeagueLog::create([
            'produce_media_id' => $produceMedia->id,
            'consume_media_id' => $consumeMedia->id,
            'produce_domain' => $produceMedia->domain,
            'consume_domain' => $consumeMedia->domain,
            'consume_url' => $consumeMedia->consume_url,
            'consume_bid' => $consumeMedia->consume_bid,
            'ip' => $this->ip,
            'user_agent' => $this->userAgent,
            'created_at' => Carbon::now(),
        ]);
    }
}
