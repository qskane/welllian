<?php

namespace App\Models;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Eloquent\Model;

class LeagueLog extends Model
{
    public $timestamps = false;

    protected $guarded = [];

    public function scopeProduceMedia($query, $id)
    {
        return $query->where('produce_media_id', $id);
    }

    public function scopeConsumeMedia($query, $id)
    {
        return $query->where('consume_media_id', $id);
    }

    public function scopeIp($query, $ip)
    {
        return $query->where('ip', $ip);
    }


    public function isRepeated($produceMediaId, $consumeMediaId, $ip)
    {
        $days = config('web.league.refresh_days') - 1;

        return (boolean)self::produceMedia($produceMediaId)
            ->consumeMedia($consumeMediaId)
            ->ip($ip)
            ->where('created_at', '>', Carbon::make("-{$days} days")->toDateString())
            ->count();
    }


    public function isExhausted($produceMediaId, $ip)
    {
        $days = config('web.league.refresh_days') - 1;
        $exhausted = config('web.league.exhausted');

        return self::select(DB::raw('DISTINCT consume_media_id'))
                ->produceMedia($produceMediaId)
                ->ip($ip)
                ->where('created_at', '>', Carbon::make("-{$days} days")->toDateString())
                ->get()
                ->count() >= $exhausted;
    }


    public function produceMedia()
    {
        return $this->belongsTo(Media::class, 'produce_media_id', 'id');
    }

    public function consumeMedia()
    {
        return $this->belongsTo(Media::class, 'consume_media_id', 'id');
    }

}
