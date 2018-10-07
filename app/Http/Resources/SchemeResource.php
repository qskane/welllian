<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SchemeResource extends JsonResource
{

    protected $templateData = [];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
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
