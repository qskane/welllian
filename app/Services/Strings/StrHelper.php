<?php

namespace App\Services\Strings;


class StrHelper
{

    /**
     * @param int $len
     * @param null $cap
     * @return string
     */
    public static function randomAlphabet($len = 6, $cap = null)
    {
        $ascii = ['UPPERCASE' => [97, 122], 'LOWERCASE' => [65, 90]];
        $letters = '';
        $i = 0;
        while ($i < $len) {

            $char = null;
            if (is_null($cap)) {
                $char = rand(0, 1) ? $ascii['UPPERCASE'] : $ascii['LOWERCASE'];
            } else if ($cap === 'UPPERCASE') {
                $char = $ascii['UPPERCASE'];
            } else if ($cap === 'LOWERCASE') {
                $char = $ascii['LOWERCASE'];
            }

            if (!$char) {
                break;
            }

            $letters .= chr(rand(...$char));
            $i++;
        }

        return $letters;

    }

}
