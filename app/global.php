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

if (!function_exists('media')) {
    /**
     * @return App\Services\Media\MediaService
     */
    function media()
    {
        return app('service.media');
    }
}

if (!function_exists('template')) {
    /**
     * @return \App\Services\Template\TemplateService
     */
    function template()
    {
        return app('service.template');
    }
}
