<?php

namespace App\Services\Template;


use App\Models\Template;

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
        $container = $container ?? \App\Services\String\StrHelper::randomAlphabet();
        if (is_numeric($template)) {
            $template = Template::findOrFail($template);
        } else if ($template instanceof Template) {
            // pass
        } else {
            throw new \Exception('not supported parameter $template type');
        }

        $medias = app('service.media')->auto($template->quantity);

        $html = $template->toCompiled($container, ['consumers' => $medias]);

        return viewer()->optimize("<div id='{$container}'>{$html}</div>");
    }


}
