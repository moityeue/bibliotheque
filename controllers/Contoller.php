<?php
abstract class Controller {
    private static $_twig;
    protected static $_base = 'php/Library-Lyon';

    protected static function getTwig(){
        if(self::$_twig === null){
            self::setTwig();
        }
        return self::$_twig;
    }

    private static function setTwig(){
        $loader = new Twig\loader\FilesystemLoader('./views');
        self::$_twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        self::$_twig->addExtension(new Twig\Extension\DebugExtension());
    }
}