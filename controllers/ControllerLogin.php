<?php
class ControllerLogin extends Controller {
    public static function loginUser(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $user = new ModelLogin();
        $log = $user->loginU();
        echo $twig->render('loginUser.twig',["base"=> $log, 'base' => self::$_base]);
    }
    
    public static function loginAdmin(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $admin = new ModelLogin();
        $log = $admin->loginA();
        echo $twig->render('loginAdmin.twig',["base"=> $log, 'base' => self::$_base]);
    }
}
