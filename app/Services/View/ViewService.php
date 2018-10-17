<?php

namespace App\Services\View;

use Illuminate\Contracts\Support\Arrayable;

class ViewService
{
    use Optimize, BladeCompiler;

    protected $storage = [];

    public function storage($instance = null, $value = null)
    {
        if (is_null($instance) && is_null($value)) {
            return $this->storage;
        } else if (is_array($instance)) {
            $this->storage = array_merge($this->storage, $instance);
        } else if ($instance instanceof Arrayable) {
            $this->storage = array_merge($this->storage, $instance->toArray());
        } else if (!is_null($value)) {
            if ($value instanceof Arrayable) {
                $value = $value->toArray();
            }
            $this->storage[$instance] = $value;
        } else {
            throw new \Exception('Unexpected parameter');
        }
    }

}
