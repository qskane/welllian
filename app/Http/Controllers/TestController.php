<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Template;
use App\Services\View\TemplateCompiler;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{

    public function index()
    {


        //        $request = request();
        //        Log::info('Wrong parameter', array_merge(['location' => 'SupportController@verificationCode', 'request' => $request->all()]));
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
