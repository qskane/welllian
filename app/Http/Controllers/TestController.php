<?php

namespace App\Http\Controllers;


class TestController extends Controller
{

    public function index()
    {
        $this->regex();
    }

    public function regex()
    {

        $a = [
            [__('name'), $media->name],
            [__('media.domain'), $media->domain],
            [__('media.promotion_url'), $media->promotion_url],
            [__('media.logo'), $media->logo ? "<img src='{$media->logo}' width='50' height='50'/>" : ''],
            [__('media.description'), $media->description],
            [__('media.verification_code'), $media->verification_key, 'CODE'],
            [__('media.verified'), $media->verified, 'STATUS'],
            [__('media.providing'), $media->providing, 'STATUS'],
            [__('media.consuming'), $media->consuming, 'STATUS'],
            [__('media.consume_bid'), $media->consume_bid],
            [__('created_at'), $media->created_at],

        ];
        $regex = '/^[#\.]{1}[a-zA-Z0-9]{1}[a-zA-Z0-9_-]*[a-zA-Z0-9]{1}$/';
        $str = '##abcd';

        $r = preg_match($regex, $str);
        dd($r);

        return view('test');
    }
}
