<?php

namespace App\Services\Views;


use App\Models\Template;
use Exception;

class TemplateCompiler
{

    /**
     * @param $template
     * @param array $data
     * @param null $container
     * @return mixed
     * @throws Exception
     */
    public function make($template, $data = [], $container = null)
    {
        if ($template instanceof Template) {
            $stub = $template->toString();
        } else if (is_string($template)) {
            $stub = $template;
        } else {
            throw new Exception('not support type of template');
        }

        $container = $container ?? str_random(6);
        $vars = array_merge(compact('container'), $data);

        return app(BladeCompiler::class)->make($stub, $vars);
    }


}
