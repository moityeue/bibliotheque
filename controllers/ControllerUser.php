<?php
class ControllerUser extends Controller {
    public static function User(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $user = new ModelUser();
        $userifs = $user->userBk();

        echo $twig->render('account.twig',['userbooking' => $userifs[0], 'userbkinfos' => $userifs[1], 'usercopy' => $userifs[2], 'userifs' => $userifs[3], 'userinfos' => $userifs[4], 'base' => self::$_base]);
        
    }
    public static function loginUser(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $user = new ModelUser();
        $userifs = $user->userBk();
        echo $twig->render('loginUser.twig',['userbooking' => $userifs[0], 'userbkinfos' => $userifs[1], 'usercopy' => $userifs[2], 'userifs' => $userifs[3], 'base' => self::$_base]);
    }
    public static function loginAdmin(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $user = new ModelUser();
        $userifs = $user->userBk();
        echo $twig->render('loginAdmin.twig',['userbooking' => $userifs[0], 'userbkinfos' => $userifs[1], 'usercopy' => $userifs[2], 'userifs' => $userifs[3], 'base' => self::$_base]);
    }
}