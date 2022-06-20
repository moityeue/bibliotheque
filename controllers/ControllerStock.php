<?php
class ControllerStock extends Controller {
   
    public function insert(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        
        $manager = new ModelStock();
        // $insertBook = $manager->insertBook();
        // echo $twig->render('adminAdd.twig', ['authors' => $insertBook[0], 'categories' => $insertBook[1], 'publishers' => $insertBook[2], 'languages' => $insertBook[3], 'base' => self::$_base]);
        $sbook = $manager->seeInsert();
        echo $twig->render('adminAdd.twig',["arraySee"=> $sbook[0] ,'arraySee1'=> $sbook[1] ,'arraySee2'=> $sbook[2],'arraySee3'=> $sbook[3]]);
    }

    public static function readstock(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());

        $manager = new ModelStock();
        $list = $manager->liststock();

        echo $twig->render('adminStock.twig', ['categories' => $list[0], 'books' => $list[1], 'booksAuthors' => $list[2], 'booksCategories' => $list[3], 'base' => self::$_base]);
    }

    public static function modifCopy(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $data = $_POST ;
        $manager = new ModelStock();
        $edi = $manager->modif();
        echo $twig->render('adminCopy.twig',["modif"=> $manager]);
    }

    public static function ajout(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $data = $_POST ;
        $manager = new ModelStock();
        $edi = $manager->modifB();
        echo $twig->render('adminCopy.twig',["modif"=> $manager]);
    }
    
    // public  function editBook(){
    //     $loader = new Twig\Loader\FilesystemLoader('./views');
    //     $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
    //     $twig->addExtension(new \Twig\Extension\DebugExtension());
    //     $data = $_POST ;
    //     $manager = new ModelStock();
    //     $edi = $manager->edit();
    //     echo $twig->render('adminEdit.twig',["modif"=> $manager,'base' => self::$_base]);
    // }
    
}
