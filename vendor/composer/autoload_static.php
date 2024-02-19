<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2a768b20acb7be8bad6346ae0ccf262
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Phpml\\' => 6,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Phpml\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-ai/php-ml/src',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2a768b20acb7be8bad6346ae0ccf262::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2a768b20acb7be8bad6346ae0ccf262::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb2a768b20acb7be8bad6346ae0ccf262::$classMap;

        }, null, ClassLoader::class);
    }
}
