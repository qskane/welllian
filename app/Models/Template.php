<?php

namespace App\Models;

use App\Models\Helper\HasOwner;
use App\Services\View\TemplateCompiler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes, HasOwner;

    protected $fillable = ['name', 'html', 'description', 'user_id'];

    protected $container;

    public function toString()
    {
        return $this->html;
    }

    public function toCompiled($container, array $data = [])
    {
        return app(TemplateCompiler::class)->make($this, $container, $data);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
