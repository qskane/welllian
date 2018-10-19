<?php

namespace App\Services\Template;


use App\Models\Template;
use App\Services\String\StrHelper;
use Exception;

class TemplateService
{
    /**
     * @param $template
     * @param null $container
     * @return string
     * @throws \Exception
     */
    public function preview($template, $container = null)
    {
        $container = $container ?? StrHelper::randomAlphabet();
        if (is_numeric($template)) {
            $template = Template::findOrFail($template);
        } else if ($template instanceof Template) {
            // pass
        } else {
            throw new \Exception('not supported parameter $template type');
        }

        $medias = app('service.media')->auto($template->quantity);

        $html = viewer()->compile($template->toString(), ['consumers' => $medias, 'container' => $container]);

        return viewer()->optimize("<div id='{$container}'>{$html}</div>");
    }


    /**
     * @param Template|string $template
     * @param array $data
     * @param $container
     * @return mixed
     * @throws \Exception
     */
    public function compile($template, $container, array $data = [])
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
