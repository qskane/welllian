<?php

namespace App\Models;

use App\Models\Concerns\HasOwner;
use App\Services\Template\TemplateCompiler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use SoftDeletes, HasOwner;

    protected $fillable = ['name', 'html', 'description', 'user_id', 'quantity'];

    protected $container;

    public function toString()
    {
        return $this->html;
    }

    /**
     * @param $container
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function toCompiled($container, array $data = [])
    {
        return template()->compile($this, $container, $data);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hasRelated()
    {
        return (boolean)Scheme::template($this->id)->count();
    }

}
