<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2f483f32c92c348e3ad2a7e6d6eb6105
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit2f483f32c92c348e3ad2a7e6d6eb6105::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2f483f32c92c348e3ad2a7e6d6eb6105::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
