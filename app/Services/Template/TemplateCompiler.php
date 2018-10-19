<?php

namespace App\Services\Template;

use App\Models\Template;
use Exception;

class TemplateCompiler
{

    /**
     * @param Template|string $template
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

        return viewer()->compile($stub, $vars);
    }


}
