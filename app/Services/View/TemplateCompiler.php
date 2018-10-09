<?php

namespace App\Services\View;

use App\Models\Template;
use Exception;

class TemplateCompiler
{

    /**
     * @param $template
     * @param array $data
     * @param $container
     * @return mixed
     * @throws Exception
     */
    public function make($template, $container, array $data = [])
    {
        if ($template instanceof Template) {
            $stub = $template->toString();
        } else if (is_string($template)) {
            $stub = $template;
        } else {
            throw new Exception('not support type of template');
        }

        $vars = array_merge(compact('container'), $data);

        return app(BladeCompiler::class)->make($stub, $vars);
    }


}
