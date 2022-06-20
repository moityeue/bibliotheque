<?php
class ControllerBooking extends Controller {
    public static function prebooking(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $user = new ModelBooking();
        $listbk = $user->booking();
        echo $twig->render('adminPreresa.twig', ['userbk' => $listbk[0], 'bks'=> $listbk[1], 'ing'=>$listbk[2], 'userbk2' => $listbk[3] , 'bks2' => $listbk[4], 'ing2' => $listbk[5], 'base' => self::$_base]);
    }

  
    public static function searchBking(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $mgr = new ModelBooking();
        $backlistbk = $mgr->searchBk();

        echo $twig->render('adminReturn.twig', ['bkusr' => $backlistbk[0], 'bks' => $backlistbk[1], 'bking' => $backlistbk[2], 'bkcopy' => $backlistbk[3], 'base' => self::$_base]);
    }

    public  function preResa(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $s = $_GET;
        $user = new ModelBooking();
        $prebking = $user->searchPreresa($s);

        echo $twig->render('adminBooking.twig', ['user' => $prebking[0], 'book' => $prebking[1], 'preresa' => $prebking[2], 'booking' => $prebking[3], 'userLate' => $prebking[4], 'bookLate' => $prebking[5], 'preresaLate' => $prebking[6], 'bookingLate' => $prebking[7], 'base' => self::$_base]);
    }
}