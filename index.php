<?php
require_once __DIR__ . '/vendor/autoload.php';
require_once  __DIR__ .'/vendor/altorouter/altorouter/AltoRouter.php';

//start alto router
$router = new AltoRouter();

$router->setBasePath('/php/Library-Lyon');

//user//

$router->map('GET', '/', 'ControllerBook#listAll', 'homepage');//accueil//ok//

$router->map('GET', '/','ControllerBook#searchBy', 'recherche');

$router->map('GET', '/suggestions', 'ControllerBook#suggbook','suggestion');//nos suggestions//ok//

$router->map('GET', '/evenements', 'ControllerEvent#event', 'event');//évènements//ok//

$router->map('GET','/compte','ControllerUser#User', 'account');//ok//

$router->map('GET', '/book/[i:id]/', 'ControllerBook#ReadMore', 'books');

$router->map('GET', '/livre/[i:id]/[z:title]', 'ControllerBook#readMore', 'book');

// Admin

$router->map('GET','/admin', 'ControllerBooking#prebooking','adminBooking');

$router->map('GET','/admin/retours','ControllerBooking#searchBking','adminReturn');

$router->map('GET','/admin/stockes', 'ControllerStock#readstock', 'bookstock');//a revoir//affichage//

$router->map('GET | POST','/admin/ajouter', 'ControllerStock#insertB', 'stockAjout');//ajouter un livre//ok//changer requete pour ajouter//

$router->map('GET | POST', '/admin/modifier', 'ControllerBook#editBook', 'modifier');// modifier un livre//ok//ok//

$router->map('GET','/admin/utilisateurs', 'ControllerAdmin#viewuser', 'gerer les user');//gestion des users//ok//ok//

$router->map('GET | POST', '/admin/emprunts', 'ControllerBooking#PreResa', 'emprunts');

$router->map('GET | POST', '/admin/exemplaires/ajouter', 'ControllerStock#ajout', 'exemplaire');//ok//ok//ajouter des exemplaires//ok//

$router->map('GET | POST', '/admin/exemplaires/modifier', 'ControllerStock#modifCopy', 'exemplaires');//ok////modifier des exemplaires//ok//

// Login

$router->map('GET | POST', '/admin/login', 'ControllerLogin#loginAdmin', 'loginAdmins');//loginAdmin//ok//ok//

$router->map('GET | POST', '/login', 'ControllerLogin#loginUser', 'loginUsers');//loginUser//ok//


// Match

$match = $router->match();

if($match){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller;
     
    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }

}