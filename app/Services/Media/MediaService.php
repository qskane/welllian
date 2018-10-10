<?php

namespace App\Services\Media;

use App\Models\Media;

class MediaService
{

    public function auto($quantity = null, $excepts = [], $include = [])
    {
        $quantity = $quantity ?? config('web.media.default_preview_quantity');
        $query = Media::consumable();

        if ($notIn = array_merge($excepts, $include)) {
            $query->whereNotIn('id', $notIn);
        }

        $medias = $query->orderBy('consume_bid', 'desc')
            ->limit($quantity)
            ->get();

        if ($include) {
            $medias->merge(
                Media::whereIn('id', $include)->get()
            );
        }

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
