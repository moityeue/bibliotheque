<?php
    class ModelBook extends Model {
           public function allBooks(){
            $db=$this->getDb();

            $req = $db->query('SELECT `id_book`, `title`, `book`.`id_author`, `name_author`, `nationality`, `book`.`id_category`, `name_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`, `id_language` FROM `book` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author` INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category` ORDER BY `title`');

            $reqCategories = $db->query('SELECT `id_category`, `name_category` FROM `category` ORDER BY `name_category`');
            $reqLanguages = $db->query('SELECT `id_language`, `language` FROM `language`');

            $books = [];
            $author = [];
            $categories = [];
            $languages = [];

            while ($book = $req->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($book);
                $author[] = new Author($book);
            }
            while ($category = $reqCategories->fetch(PDO::FETCH_ASSOC)){
                $categories[] = new Category($category);
            }
            while ($language = $reqLanguages->fetch(PDO::FETCH_ASSOC)){
                $languages[] = new Language($language);
            }

            return array($books, $author, $categories, $languages);
        }
        public function suggest(){
            $db=$this->getDb();
            $req = $db->query('SELECT `id_book`, `title`, `book`.`id_author`, `book`.`id_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`,`id_language`, `category`.`id_category`, `name_category` FROM `book`  INNER JOIN `category` ON `book`.`id_category` = `category`.`id_category`  INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author` ORDER BY `publication_date` DESC ');
            

            $books = [];
            $genre = [];
          
            while ($sgg = $req->fetch(PDO::FETCH_ASSOC)){
                $books[] = new Book($sgg);
                $genre[] = new Category($sgg);
            }
            
            return array($books, $genre );
        }
        public function select($id){
            $db=$this->getDb();
            $req = $db->prepare('SELECT `id_book`, `title`, `book`.`id_author`, `id_category`, `publication_date`, `cover`, `isbn_number`, `description`, `copy_number`, `id_publisher`, `location`, `author`.`id_author`,`name_author`, `nationality` FROM `book` INNER JOIN `author` ON `book`.`id_author` = `author`.`id_author` WHERE `book`.`id_book` = :id');
            $req->bindParam('id', $id, PDO::PARAM_INT);
            $req->execute();
            
            return new Book($req->fetch(PDO::FETCH_ASSOC));
        }

        public function search($recherche){
            $db=$this->getDb();
            if(isset($_GET['search'] )){
                var_dump($_GET['search']);
                $recherche = ($_GET['title'] . '%$recherche%');
                $category = $_GET['category'];
                $req = $db->prepare("SELECT `title`,`id_author`,`cover`,`description` FROM `book`  WHERE `title` LIKE '%$recherche%'  ");
                $req->bindParam(':search', $recherche, PDO::PARAM_STR);
                $req->execute();
                
                $req2 = $db->prepare("SELECT `id_category`, `name_category` FROM `category` WHERE  `id_category` LIKE 'id_category' ");
                $req2->bindParam(':id_category', $category, PDO::PARAM_INT);
                $req2->execute();
                  
                return new Book( $req->fetch(PDO::FETCH_ASSOC));   
            }  
        }
  
    }   
