<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita60daf237ef5d4630f523f051d8fe5e7
{
    public static $prefixesPsr0 = array (
        'O' => 
        array (
            'OneSignal' => 
            array (
                0 => __DIR__ . '/../..' . '/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInita60daf237ef5d4630f523f051d8fe5e7::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
