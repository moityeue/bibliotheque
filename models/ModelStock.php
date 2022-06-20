<?php
 class ModelStock extends Model {
    public function seeInsert(){
        $db = $this->getDb();
        $req = $db->query("SELECT `id_author`, `name_author`, `nationality` FROM `author`");
        $arraySee = [];
        while($row = $req->fetch(PDO::FETCH_ASSOC)){
            $arraySee[] = new Author ($row);
           
        }
        $req1 = $db->query("SELECT `id_category`, `name_category` FROM `category`");
        $arraySee1 = [];
        while($row1 = $req1->fetch(PDO::FETCH_ASSOC)){
            $arraySee1[] = new Category ($row1);
        }
        $req2 = $db->query("SELECT `id_language`,`language` FROM `language`");
        $arraySee2 = [];
        while($row2 = $req2->fetch(PDO::FETCH_ASSOC)){
            $arraySee2[] = new Language ($row2);
        }
       
        $req3 = $db->query("SELECT `id_publisher`, `name` FROM `publisher`");
        $arraySee3 = [];
        while($row3 = $req3->fetch(PDO::FETCH_ASSOC)){
            $arraySee3[] = new Publisher ($row3);
           
        }
        if(isset($_POST['submit'])) {
            if(!empty($_FILES)){
               
                $fichier = 'views\templates\ressource\bookcover/';
                $img_cover = $_FILES['cover']['name'];
                if (isset($_FILES['cover']) AND $_FILES['cover']['error'] == 0){
                    if ($_FILES['cover']['size'] <= 100000){
                        $infosfichier = pathinfo($_FILES['cover']['name']);
                        $extension_upload = $infosfichier['extension'];
                        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png', 'PNG', 'JPG', 'GIF', 'JPEG');
                        if (in_array($extension_upload,$extensions_autorisees)){
                        move_uploaded_file($_FILES['cover']['tmp_name'], $fichier.basename($_FILES['cover']['name']));
                        }else {
                            echo 'Image trop grand';
                        }
                    }else{
                        echo 'Erreur du téléchargement !';
                    }
                }else{ 
                    echo 'Erreur, vous navez pas accès !';
                }
            }
            $title = $_POST['title'];
            $id_author = $_POST['id_author'];
            $id_category = $_POST['id_category'];
            $publication_date = $_POST['publication_date'];
            $cover = $_POST['cover'];
            $isbn_number = $_POST['isbn_number'];
            $description = $_POST['description'];
            $id_publisher = $_POST['id_publisher'];
            $location = $_POST['location'];
            $id_language = $_POST['id_language'];

            $req = $db->prepare("INSERT INTO `book`(`id_book`, `title`, `id_author`, `id_category`, `publication_date`, `cover`, `isbn_number`, `description`, `id_publisher`, `location`, `id_language`) VALUES (':id_book',':title',':id_author',':id_category',':publication_date',':cover',':isbn_number',':description',':id_publisher',':location',':id_language')");

            $req->bindParam(':title', $title, PDO::PARAM_STR);
            $req->bindParam(':id_author', $id_author, PDO::PARAM_INT);
            $req->bindParam(':id_category', $id_category, PDO::PARAM_INT); 
            $req->bindParam(':publication_date', $publication_date, PDO::PARAM_STR);
            $req->bindParam(':cover', $cover, PDO::PARAM_STR); 
            $req->bindParam(':isbn_number', $isbn_number, PDO::PARAM_INT);
            $req->bindParam(':description', $description, PDO::PARAM_STR);
            $req->bindParam(':id_publisher', $id_publisher, PDO::PARAM_INT);
            $req->bindParam(':location', $location, PDO::PARAM_STR);
            $req->bindParam(':id_language', $id_language, PDO::PARAM_INT);
            $req->execute();
        }    
        
       
        return array($arraySee, $arraySee1,$arraySee2, $arraySee3);
    }
   
    // public function insertBook(){

    //     $db = $this->getDb();

    //     $reqAllAuthors = $db->query('SELECT `id_author`, `name_author`, `nationality` FROM `author`');
    //     $reqAllCategories = $db->query('SELECT `id_category`, `name_category` FROM `category`');
    //     $reqAllPublishers = $db->query('SELECT `id_publisher`, `name` FROM `publisher`');
    //     $reqAllLanguages = $db->query('SELECT `id_language`, `language` FROM `language`');

    //     $authors = [];
    //     $categories = [];
    //     $publishers = [];
    //     $languages = [];

    //     while($allAuthors = $reqAllAuthors->fetch(PDO::FETCH_ASSOC)){
    //         $authors[] = new Author($allAuthors);
    //     }

    //     while($allCategories = $reqAllCategories->fetch(PDO::FETCH_ASSOC)){
    //         $categories[] = new Category($allCategories);
    //     }

    //     while($allPublishers = $reqAllPublishers->fetch(PDO::FETCH_ASSOC)){
    //         $publishers[] = new Publisher($allPublishers);
    //     }

    //     while($allLanguages = $reqAllLanguages->fetch(PDO::FETCH_ASSOC)){
    //         $languages[] = new Language($allLanguages);
    //     }

    //     if(isset($_POST["submit"])){
    //         $title = $_POST['title'];
    //         $id_author = $_POST['author'];
    //         $id_category = $_POST['category'];
    //         $publication_date = $_POST['publication_date'];
    //         $isbn_number = $_POST['isbn'];
    //         $publisher = $_POST['publisher'];
    //         $location = $_POST['location'];
    //         // $language = $_POST['language'];
    //         $cover = $_POST['cover'];
    //         $resume = $_POST['resume'];

    //         $req = $db->prepare("INSERT INTO `book`( `title`, `id_author`, `id_category`, `publication_date`, `isbn_number`) VALUES (:title, :id_author, :id_category, :publication_date, :isbn_number)");

    //         $req->bindParam('title', $title, PDO::PARAM_STR);
    //         $req->bindParam('id_author', $id_author, PDO::PARAM_INT);
    //         $req->bindParam('id_category', $id_category, PDO::PARAM_INT); 
    //         $req->bindParam('publication_date', $publication_date, PDO::PARAM_STR);
    //         $req->bindParam('isbn_number', $isbn_number, PDO::PARAM_INT);
    //         $req->execute();
    //     }

    //     return array($authors, $categories, $publishers, $languages);
    // } 


    
    public function liststock(){
        $db = $this->getDb();

        $reqAllCategories = $db->query('SELECT `id_category`, `name_category` FROM `category`');

        $categories = [];

        while($allCategories = $reqAllCategories->fetch(PDO::FETCH_ASSOC)){
            $categories[] = new Category($allCategories);
        }

        if(isset($_GET['submit'])) {
            
            $search = isset($_GET['search']) && $_GET['search'] != '' ? '%' . $_GET['search'] . '%' : null;
            $centuryStart = isset($_GET['century']) ? $_GET['century'] . '-01-01' : null;
            $centuryEnd = isset($_GET['century']) ? ($_GET['century'] + 99) . '-12-01' : null;
            $cat = isset($_GET['category']) ? $_GET['category'] : null;
            // vr_dump($centuryEnd);
            // var_dump($centuryStart);
            // var_dump($search);
            // var_dump($cat);

            $sql = 'SELECT `book`.`id_book`, `book`.`title`, `book`.`id_author`, `book`.`id_category`, DATE_FORMAT(`book`.`publication_date`, "%Y") AS `publication_date`, `book`.`isbn_number`, `category`.`name_category`, `author`.`name_author` FROM `book` INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author`';

            if(null !== $search || null !== $centuryEnd || null !== $cat){

                $sql .= ' WHERE';
                $sql .= (null !== $search) ? ' (`book`.`title` LIKE :search OR `book`.`isbn_number` LIKE :search OR `author`.`name_author` LIKE :search)' : '';
                $sql .= (null !== $search && (null !== $centuryStart || null !== $cat)) ? ' AND' : '';
                $sql .= (null !== $centuryStart) ? ' (`publication_date` BETWEEN :centuryStart AND :centuryEnd)' : '';
                $sql .= (null !== $centuryStart && null !== $cat) ? ' AND' : '';
                $sql .= (null !== $cat) ? ' (`book`.`id_category` = :category)' : '';
            }

            $reqSearch = $db->prepare($sql);

            // var_dump($reqSearch);

            (null != $search) ? $reqSearch->bindParam('search', $search, PDO::PARAM_STR) : '';
            (null != $centuryStart) ? $reqSearch->bindParam('centuryStart', $centuryStart, PDO::PARAM_STR) : '';
            (null != $centuryEnd) ? $reqSearch->bindParam('centuryEnd', $centuryEnd, PDO::PARAM_STR) : '';
            (null != $cat) ? $reqSearch->bindParam('category', $cat, PDO::PARAM_STR) : '';

            $reqSearch->execute();

            $books = [];
            $booksAuthors = [];
            $booksCategories = [];

            while($search = $reqSearch->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($search);
                // var_dump($books);
                $booksAuthors[] = new Author($search);
                $booksCategories[] = new Category($search);
            }

        } else {

            $reqListAll = $db->query('SELECT `book`.`id_book`, `book`.`title`, `book`.`id_author`, `book`.`id_category`, DATE_FORMAT(`book`.`publication_date`, "%Y") AS `publication_date`, `book`.`isbn_number`, `category`.`name_category`, `author`.`name_author` FROM `book` INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author`');

            $books = [];
            $booksAuthors = [];
            $booksCategories = [];

            while($listAll = $reqListAll->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($listAll);
                // var_dump($books);
                $booksAuthors[] = new Author($listAll);
                $booksCategories[] = new Category($listAll);
            }
        }
        return array($categories, $books, $booksAuthors, $booksCategories);
    }   
          
    public function modif (){
        $db=$this->getDb();
        if(isset($_POST["submit"])){
           $id_copy = (int)$_POST["id_copy"];
           $condition = $_POST['condition'];
           
           $message = 'Cet exemplaire a bien été modifié';
           $req = $db->prepare("UPDATE `copy` SET `id_copy`='$id_copy',`condition`='$condition'  WHERE `id_copy`='$id_copy'");
           $req->bindParam('id_copy', $id_copy, PDO::PARAM_INT);
           $req->bindParam('condition', $condition, PDO::PARAM_STR);
           $req->execute();
           
        }
    }

    public function modifB (){
        $db=$this->getDb();
        if(isset($_POST["submit"])){
           $id_copy = (int)$_POST["id_copy"];
           $condition = $_POST['condition'];
           $id_language = (int)$_POST['id_language'];
           $req = $db->prepare("INSERT INTO `copy`(`id_copy`, `condition`, `id_language`) VALUES ('id_copy','condition','id_language')");
           $req->bindParam('id_copy', $id_copy, PDO::PARAM_INT);
           $req->bindParam('condition', $condition, PDO::PARAM_STR);
           $req->bindParam('id_language', $id_language, PDO::PARAM_INT);
           $req->execute();
        }
    }
}
 