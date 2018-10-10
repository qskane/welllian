<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class SchemeResource
 * @deprecated unused
 * @package App\Http\Resources
 */
class SchemeResource extends JsonResource
{

    protected $templateData = [];

    public function toArray($request)
    {
        return [
            'template' => str_replace(["\r", "\n"], ['', ''], $this->template->toCompiled($this->container, $this->templateData)),
            'container' => $this->container,
        ];
    }

    public function templateData(array $data)
    {
        $this->renderData = $data;

        return $this;
    }

}
