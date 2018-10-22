<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Scheme;

class MediaApi extends Controller
{

    public function show($key)
    {
        $media = Media::select('id')->providable()->key($key)->first();
        if (!$media) {
            abort(403);
        }

        $schemes = Scheme::with(['template'])->mediaId($media->id)->running()->get();
        $response = [];
        foreach ($schemes as $scheme) {
            $consumers = media()->produce($key, $scheme->quantity, [$media->id]);
            $container = $scheme->container;
            $template = str_replace(
                ["\r", "\n"],
                ['', ''],
                $scheme->template->toCompiled($container, compact('consumers'))
            );
            $template = viewer()->optimize($template);

            $response[] = compact('template', 'container');
        }

        return response()->json(['data' => $response])->withHeaders(['Access-Control-Allow-Origin' => '*']);
    }

}
