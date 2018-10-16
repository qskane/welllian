<?php

namespace App\Services\View;

class ViewService
{
    use Optimize, BladeCompiler;

    protected $storage = [];

    public function storage($name = null, $value = null)
    {
        if (is_null($name) && is_null($value)) {
            return $this->storage;
        } else if (is_array($name)) {
            $this->json = array_merge($this->storage, $name);
        } else if (!is_null($value)) {
            $this->storage[$name] = $value;
        } else {
            throw new \Exception('Unexcepted parameter');
        }
    }

}
