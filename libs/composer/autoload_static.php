<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4d9f3e9693e36bb13c22db4f20607348
{
    public static $prefixLengthsPsr4 = array (
        'Y' => 
        array (
            'YoutubeDl\\' => 10,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
            'Symfony\\Component\\OptionsResolver\\' => 34,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'YoutubeDl\\' => 
        array (
            0 => __DIR__ . '/..' . '/norkunas/youtube-dl-php/src',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Symfony\\Component\\OptionsResolver\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/options-resolver',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit4d9f3e9693e36bb13c22db4f20607348::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4d9f3e9693e36bb13c22db4f20607348::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
