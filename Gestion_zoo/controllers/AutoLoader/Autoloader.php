<?php

class Autoloader
{

    /**
     * Autolader add
     *
     * @return void
     */
    static function register()
    {
        spl_autoload_register(function ($class) {

            include_once 'controllers/'.$class.'.php';
        });
    }
}
