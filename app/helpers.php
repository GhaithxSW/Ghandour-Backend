<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;


if (!function_exists('layoutConfig')) {
    function layoutConfig()
    {
        if (App::getLocale() == 'en') {
            // $__getConfiguration = Config::get('app-config.layout.vdm');
            $__getConfiguration = Config::get('app-config.layout.vlm');
            return $__getConfiguration;
        }

        if (App::getLocale() == 'ar') {
            // $__getConfiguration = Config::get('app-config.layout.vdm-rtl');
            $__getConfiguration = Config::get('app-config.layout.vlm-rtl');
            return $__getConfiguration;
        }

        // if (Request::is('login')) {
        //     $__getConfiguration = Config::get('app-config.layout.vlm');
        // }
        // return $__getConfiguration;
    }
}



if (!function_exists('getRouterValue')) {
    function getRouterValue()
    {
        if (App::getLocale() == 'en') {
            // $__getRoutingValue = '/modern-dark-menu';
            $__getRoutingValue = '/modern-light-menu';
            return $__getRoutingValue;
        }

        if (App::getLocale() == 'ar') {
            // $__getRoutingValue = '/rtl/modern-dark-menu';
            $__getRoutingValue = '/rtl/modern-light-menu';
            return $__getRoutingValue;
        }

        // if (Request::is('login')) {
        //     $__getRoutingValue = '/modern-light-menu';
        // }
        // return $__getRoutingValue;
    }
}
