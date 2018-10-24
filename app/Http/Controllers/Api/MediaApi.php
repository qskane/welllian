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
            return response('', 404, ['Access-Control-Allow-Origin' => '*']);
        }
        $schemes = Scheme::with(['template'])->mediaId($media->id)->running()->get();
        $parsedConsumers = [];
        $originConsumers = [];
        foreach ($schemes as $scheme) {
            $consumers = media()->produce($key, $scheme->quantity, [$media->id]);
            $container = $scheme->container;
            $template = str_replace(
                ["\r", "\n"],
                ['', ''],
                $scheme->template->toCompiled($container, compact('consumers'))
            );
            $template = viewer()->optimize($template);

            $parsedConsumers[] = compact('template', 'container');

            $origin = $consumers->map(function ($consumer) {
                return $consumer->only(['name', 'logo', 'url', 'description']);
            })->toArray();

            $originConsumers[] = ['name' => $scheme->name, 'container' => $container, 'data' => $origin];
        }

        return response()->json([
            'parsed_consumers' => $parsedConsumers,
            'origin_consumers' => $originConsumers,
        ])->withHeaders([
            'Access-Control-Allow-Origin' => '*',
        ]);
    }

}
