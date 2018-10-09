<?php

namespace App\Services\Template;

trait Optimize
{
    /**
     * Handle an incoming request.
     *
     * @param $html
     * @return mixed
     * @see https://stackoverflow.com/questions/29196447/how-do-i-compress-html-in-laravel-5
     */
    public function optimize($html)
    {
        if (strpos($html, '<pre>') !== false) {
            $replace = [
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/" => '<?php ',
                "/\r/" => '',
                "/>\n</" => '><',
                "/>\s+\n</" => '><',
                "/>\n\s+</" => '><',
            ];
        } else {
            $replace = [
                '/<!--[^\[](.*?)[^\]]-->/s' => '',
                "/<\?php/" => '<?php ',
                "/\n([\S])/" => '$1',
                "/\r/" => '',
                "/\n/" => '',
                "/\t/" => '',
                "/ +/" => ' ',
            ];
        }

        return preg_replace(array_keys($replace), array_values($replace), $html);
    }
}
