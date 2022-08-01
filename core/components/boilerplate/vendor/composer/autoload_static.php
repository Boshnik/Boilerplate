<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8634832d316b4ab47369d1eb080998b9
{
    public static $prefixLengthsPsr4 = array (
        'B' => 
        array (
            'Boshnik\\Boilerplate\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Boshnik\\Boilerplate\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8634832d316b4ab47369d1eb080998b9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8634832d316b4ab47369d1eb080998b9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8634832d316b4ab47369d1eb080998b9::$classMap;

        }, null, ClassLoader::class);
    }
}
