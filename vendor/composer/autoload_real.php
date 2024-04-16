<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitb2a768b20acb7be8bad6346ae0ccf262
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitb2a768b20acb7be8bad6346ae0ccf262', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitb2a768b20acb7be8bad6346ae0ccf262', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitb2a768b20acb7be8bad6346ae0ccf262::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
