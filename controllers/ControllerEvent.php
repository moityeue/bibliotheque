<?php
class ControllerEvent extends Controller {
    public static function event(){
        $twig = self::getTwig();
        echo $twig->render('event.twig', ['base' => self::$_base]);
    }
}