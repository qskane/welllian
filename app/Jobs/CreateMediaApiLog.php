<?php

namespace App\Jobs;

use App\Models\LeagueApiLog;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateMediaApiLog implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $providerMediaId;
    protected $consumerMediaIds;
    protected $ip;
    protected $userAgent;
    protected $schemeId;
    protected $now;

    public function __construct($schemeId, $providerMediaId, array $consumerMediaIds)
    {
        $this->providerMediaId = $providerMediaId;
        $this->consumerMediaIds = $consumerMediaIds;
        $this->ip = request()->ip();
        $this->userAgent = request()->userAgent();
        $this->schemeId = $schemeId;
        $this->now = Carbon::now()->toDateTimeString();
    }

    public function handle()
    {
        $insert = [];
        $batch = str_random(10);
        foreach ($this->consumerMediaIds as $consumerMediaId) {
            $insert[] = [
                'provider_media_id' => $this->providerMediaId,
                'consumer_media_id' => $consumerMediaId,
                'scheme_id' => $this->schemeId,
                'batch' => $batch,
                'ip' => $this->ip,
                'user_agent' => $this->userAgent,
                'created_at' => $this->now,
            ];
        }

        LeagueApiLog::insert($insert);
    }
}
