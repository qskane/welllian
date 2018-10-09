<?php

namespace App\Services\Media;

use App\Models\Media;
use Illuminate\Support\Facades\DB;

class MediaService
{

    public function auto($quantity = 12)
    {
        $medias = Media::leftJoin('wallets', 'wallets.user_id', '=', 'medias.user_id')
            ->where('wallets.coin', '>=', DB::raw('medias.consume_bid'))
            ->where('medias.consumable', true)
            ->orderBy('medias.consume_bid', 'desc')
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
