<?php
class ControllerBook extends Controller {
    public  function listAll(){
        $twig = self::getTwig();
        $manager = new ModelBook();
        $allBooks = $manager->allBooks();
        echo $twig->render('homepage.twig', ['books' => $allBooks[0], 'authors' => $allBooks[1], 'categories' => $allBooks[2], 'languages' => $allBooks[3], 'base' => self::$_base]);
    }
    public function readMore($id){
        $twig = self::getTwig();
        $manager = new ModelBook();
        $infosbook = $manager->select($id);
        
        echo $twig->render('infosbook.twig', ['book' => $infosbook[0], 'author' => $infosbook[1], 'category' => $infosbook[2], 'language' => $infosbook[3], 'publisher' => $infosbook[4], 'base' => self::$_base]);
    }
    public function suggbook(){
        $twig = self::getTwig();
        $data = new ModelBook();
        $lastbk = $data->suggest();
        
        echo $twig->render('suggestion.twig', ['books' => $lastbk[0], 'genre' => $lastbk[1],'base' => self::$_base]);
    }

    public  function searchBy(){
        $loader = new Twig\Loader\FilesystemLoader('./views');
        $twig = new Twig\Environment($loader, ['cache' => false, 'debug' => true]);
        $twig->addExtension(new \Twig\Extension\DebugExtension());
        $recherche = $_GET ;
        $manager = new ModelBook();
        $dt = $manager->search($recherche);
        echo $twig->render('homepage.twig',['datas'=> $dt, 'base' => self::$_base]);
    }
 
}