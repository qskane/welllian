<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Template;
use App\Services\View\TemplateCompiler;

class TestController extends Controller
{

    public function index()
    {

        dd(request());
        $this->service();

        //        $template = Template::find(4);
        //
        //        $container = 'fake';
        //        $medias = Media::all();
        //        $data = ['items' => $medias->toArray()];
        //
        //        $r = app(TemplateCompiler::class)->make($template, $container, $data);


        //        $key = '867r5upedpd0cylx';
        //
        //        $media = Media::select('id')->key($key)->firstOrFail();
        //
        //        $schemes = Scheme::with(['template'])->mediaId($media->id)->get();
        //
        //        return SchemeResource::collection($schemes);
    }

    public function view()
    {
        return view('test.index');
    }

    public function media()
    {
        $fromKey = '867r5upedpd0cylx';

        $medias = Media::select(['name', 'key', 'logo', 'description'])->all();

        foreach ($medias as $media) {
            $medias->jump_url = "http://malllian-dev.com/jump?from={$fromKey}&to={$media->key}";
        }

        return $medias;
    }

    public function service()
    {
        $auto = app('services.template')->preview(3);

        echo $auto;

    }

}
