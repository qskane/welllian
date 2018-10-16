<?php

if (!function_exists('viewer')) {
    /**
     * @return \App\Services\View\ViewService
     */
    function viewer()
    {
        return app('service.view');
    }
}
