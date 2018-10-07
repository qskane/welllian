<?php

namespace App\Services\Views;


use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\Blade;

class BladeCompiler
{

    /**
     * @param $str
     * @param array $args
     * @return string
     * @throws \Exception
     * @source https://stackoverflow.com/questions/16891398/is-there-any-way-to-compile-a-blade-template-from-a-string
     */
    public function make($str, array $args = [])
    {
        $generated = Blade::compileString($str);

        ob_start() and extract(array_merge(['__env' => app(Factory::class)], $args), EXTR_SKIP);

        // We'll include the view contents for parsing within a catcher
        // so we can avoid any WSOD errors. If an exception occurs we
        // will throw it out to the exception handler.
        try {
            eval('?>' . $generated);
        } catch (\Exception $e) {
            // If we caught an exception, we'll silently flush the output
            // buffer so that no partially rendered views get thrown out
            // to the client and confuse the user with junk.
            ob_get_clean();

            throw $e;
        }

        $content = ob_get_clean();

        return $content;
    }

}
