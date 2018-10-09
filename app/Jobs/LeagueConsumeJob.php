<?php

namespace App\Jobs;

use App\Models\LeagueLog;
use App\Models\Media;
use App\Models\Wallet;
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

    /**
     * @var Media
     */
    protected $produceMedia;
    /**
     * @var Media
     */
    protected $consumeMedia;

    public function __construct($produce, $consume)
    {
        $this->produce = $produce;
        $this->consume = $consume;
        $this->userAgent = request()->userAgent();
        $this->ip = request()->ip();
    }

    public function handle()
    {
        $this->produceMedia = Media::with('wallet')->key($this->produce)->first();
        $this->consumeMedia = Media::with('wallet')->key($this->consume)->first();

        $produceWalletId = $this->consumeMedia->wallet->id;
        $consumeWalletId = $this->produceMedia->wallet->id;
        if (!$this->produceMedia || !$this->consumeMedia || !$produceWalletId || !$consumeWalletId) {
            return;
        }

        $transferred = (new Wallet)->transfer($consumeWalletId, $produceWalletId, $this->consumeMedia->consume_bid, true);
        if (!$transferred) {
            $this->consumeMedia->available = false;
            $this->consumeMedia->save();
        }

        LeagueLog::create([
            'produce_media_id' => $this->produceMedia->id,
            'consume_media_id' => $this->consumeMedia->id,
            'produce_domain' => $this->produceMedia->domain,
            'consume_domain' => $this->consumeMedia->domain,
            'consume_url' => $this->consumeMedia->consume_url,
            'consume_bid' => $this->consumeMedia->consume_bid,
            'ip' => $this->ip,
            'user_agent' => $this->userAgent,
        ]);
    }
}
