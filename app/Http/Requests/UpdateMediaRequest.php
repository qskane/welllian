<?php

namespace App\Http\Requests;


class UpdateMediaRequest extends StoreMediaRequest
{

    public function rules()
    {
        return array_merge(
            parent::rules(),
            [
                'providing' => 'required|boolean',
                'consuming' => 'required|boolean',
                'consume_bid' => 'required|integer',
            ]
        );
    }


    public function inputs()
    {
        return array_merge(
            parent::inputs(),
            [
                'providing' => (boolean)$this->get('providing'),
                'consuming' => (boolean)$this->get('consuming'),
                'consume_bid' => (int)$this->get('consume_bid'),
            ]
        );
    }

}
