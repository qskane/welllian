<?php

namespace App\Services\Media;

use App\Models\Media;

class MediaService
{

    public function auto($quantity = null, array $excepts = [], array $include = [])
    {
        $quantity = $quantity ?? config('web.media.default_preview_quantity');

        $consumers = $this->findMedias($quantity, $excepts, $include);

        return $this->mixRedirect($consumers, config('web.official_media_key'));
    }

    public function produce($producerKey, $quantity, array $excepts = [], array $include = [])
    {
        $consumers = $this->findMedias($quantity, $excepts, $include);

        return $this->mixRedirect($consumers, $producerKey);
    }

    protected function mixRedirect($consumers, $producer)
    {
        foreach ($consumers as $media) {
            $media->url = route('link.league', ['producer' => $producer, 'consumer' => $media->key, 'redirect' => $media->consume_url]);
        }

        return $consumers;
    }

    protected function findMedias($quantity, array $excepts, array $include)
    {
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

        return $medias;
    }

}
