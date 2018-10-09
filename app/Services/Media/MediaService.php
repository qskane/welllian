<?php

namespace App\Services\Media;

use App\Models\Media;

class MediaService
{

    public function auto($quantity = 12)
    {
        $medias = Media::with([
            'wallet' => function ($query) {
                $query->where('coin', '>', config('league.wallet.lowest_coin'));
            },
        ])->consumeAble()
            ->orderBy('consume_bid', 'desc')
            ->limit($quantity)
            ->get();

        return $this->mixRedirect($medias, config('web.official_media_key'));
    }

    protected function mixRedirect($medias, $produce)
    {
        foreach ($medias as $media) {
            $media->url = route('link.league', ['produce' => $produce, 'consume' => $media->key, 'redirect' => $media->promotion_url]);
        }

        return $medias;
    }

}
