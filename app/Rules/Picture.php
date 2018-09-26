<?php

namespace App\Rules;


use Illuminate\Contracts\Validation\Rule;

class Picture implements Rule
{

    /*
     * FIXME 可能为网络图片url形式,导致检查后缀失败
     */
    protected $suffixes = ['jpg', 'jpeg', 'png'];

    public function passes($attribute, $value)
    {

    }

    public function message()
    {
        return ':attribute 不是允许的类型。';
    }

}
