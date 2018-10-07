<?php

namespace App\Http\Controllers;


use App\Http\Resources\SchemeResource;
use App\Models\Media;
use App\Models\Scheme;
use App\Models\Template;
use App\Services\Views\TemplateCompiler;
use Illuminate\Contracts\View\Factory;

class TestController extends Controller
{

    public function index()
    {
        $template = Template::find(4);

        $container = 'fake';
        $medias = Media::all();
        $data = ['items' => $medias->toArray()];

        $r = app(TemplateCompiler::class)->make($template, $container, $data);


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

}
