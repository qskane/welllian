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


if (!function_exists('transfer')) {
    /**
     * @return \App\Services\Wallet\Transfer
     */
    function transfer()
    {
        return app('service.wallet')->transfer();
    }
}


if (!function_exists('wallet')) {
    /**
     * @return \App\Services\Wallet\WalletService
     */
    function wallet()
    {
        return app('service.wallet');
    }
}


if (!function_exists('outward')) {
    /**
     * @param $target
     * @return string
     */
    function outward($target)
    {
        if (!preg_match("/^http(s):\/\/.*$/i", $target)) {
            $target = 'http://' . $target;
        }
        return url()->route('link.outward', compact('target'));
    }
}
