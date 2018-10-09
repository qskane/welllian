<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Template;
use App\Services\View\TemplateCompiler;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

    public function index()
    {
        $quantity = 10;

        $medias = Media::leftJoin('wallets', 'wallets.user_id', '=', 'medias.user_id')
            ->where('wallets.coin', '>=', DB::raw('medias.consume_bid'))
            ->where('medias.consumable', true)
            ->orderBy('medias.consume_bid', 'desc')
            ->limit($quantity)
            ->get();

        dd($medias);
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
