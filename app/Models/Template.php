<?php

namespace App\Models;

use App\Services\View\TemplateCompiler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'html','user_id'];

    protected $container;

    public function toString()
    {
        return $this->html;
    }

    public function toCompiled($container, $data = [])
    {
        return app(TemplateCompiler::class)->make($this, $container, $data);
    }

    public function setContainer($container = null, $type = 'id')
    {
        if (is_null($container)) {
            $container = str_random(5);
        }
        $types = ['id' => '#', 'class' => '.'];
        $this->container = $types[$type] . $container;

        return $this;
    }

}
