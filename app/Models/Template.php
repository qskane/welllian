<?php

namespace App\Models;

use App\Services\Views\TemplateCompiler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'style', 'html', 'script'];

    public function toString()
    {
        return $this->style . $this->html . $this->script;
    }

    public function toCompiled($data = [], $container = null)
    {
        return app(TemplateCompiler::class)->make($this, $data, $container);
    }

}
