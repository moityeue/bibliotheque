<?php
class ControllerAdmin extends Controller {
    public static function viewuser(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $name = $_GET;
        $manager = new ModelAdmin();
        $ifsuser = $manager->edituser($name);

        echo $twig->render('adminUserManagement.twig',['infos' => $ifsuser, 'base' => self::$_base]);
    }

    public static function count(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $name = $_GET;
        $manager = new ModelAdmin();
        $countbooking = $manager->countbooking($name);

        echo $twig->render('adminUserManagement.twig',['reqcount' => $countbooking, 'base' => self::$_base]);
    }
}