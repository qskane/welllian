<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Media;
use App\Models\Scheme;

class MediaApi extends Controller
{

    public function show($key)
    {
        $media = Media::select('id')->key($key)->firstOrFail();

        $schemes = Scheme::with(['template'])->mediaId($media->id)->get();

        $medias = Media::all();

        $templateData = ['items' => $medias->toArray()];
        $response = [];
        foreach ($schemes as $scheme) {
            $container = $scheme->container;
            $response[] = [
                'template' => str_replace(["\r", "\n"], ['', ''], $scheme->template->toCompiled($container, $templateData)),
                'container' => $container,
            ];
        }

        return response()->json(['data' => $response])->withHeaders(['Access-Control-Allow-Origin' => '*']);
    }

}
