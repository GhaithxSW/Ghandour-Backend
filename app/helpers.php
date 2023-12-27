<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;

if (!function_exists('layoutConfig')) {
    function layoutConfig()
    {
        $__getConfiguration = null;

        if (App::getLocale() == 'en') {
            $__getConfiguration = Config::get('app-config.layout.vlm');
            return $__getConfiguration;
        }

        if (App::getLocale() == 'ar') {
            $__getConfiguration = Config::get('app-config.layout.vlm-rtl');
            return $__getConfiguration;
        }

        return $__getConfiguration;
    }
}
