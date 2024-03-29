<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit925b7dc5625b4b1973068c1d07a161e0
{
    public static $prefixLengthsPsr4 = array (
        't' => 
        array (
            'tailwindJIT\\' => 12,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'tailwindJIT\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit925b7dc5625b4b1973068c1d07a161e0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit925b7dc5625b4b1973068c1d07a161e0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit925b7dc5625b4b1973068c1d07a161e0::$classMap;

        }, null, ClassLoader::class);
    }
}
