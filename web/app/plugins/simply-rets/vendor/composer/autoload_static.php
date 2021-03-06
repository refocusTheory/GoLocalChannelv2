<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit404cb66d155a43341237bebe105709a2
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Polyfill\\Ctype\\' => 23,
            'Symfony\\Component\\PropertyAccess\\' => 33,
        ),
        'I' => 
        array (
            'Ivory\\JsonBuilder\\' => 18,
            'Ivory\\GoogleMap\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'Symfony\\Component\\PropertyAccess\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/property-access',
        ),
        'Ivory\\JsonBuilder\\' => 
        array (
            0 => __DIR__ . '/..' . '/egeloen/json-builder/src',
        ),
        'Ivory\\GoogleMap\\' => 
        array (
            0 => __DIR__ . '/..' . '/egeloen/google-map/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'W' => 
        array (
            'Widop\\HttpAdapter' => 
            array (
                0 => __DIR__ . '/..' . '/widop/http-adapter/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit404cb66d155a43341237bebe105709a2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit404cb66d155a43341237bebe105709a2::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit404cb66d155a43341237bebe105709a2::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
