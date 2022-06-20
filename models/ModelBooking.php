<?php
    class ModelBooking extends Model {
        public function booking(){
            $db=$this->getDb();

            $req1 = $db->query("SELECT `pre_resa`.`id_preresa`, `pre_resa`.`id_book`, `pre_resa`.`id_copy`, `date`, `pre_resa`.`id_user`, `statut`, `book`.`id_book`, `book`.`title`, `user`.`id_user`, `user`.`firstname`, `user`.`lastname`, `user`.`user_number`, `book`.`isbn_number` FROM `pre_resa` INNER JOIN `book` ON `pre_resa`.`id_book` = `book`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `pre_resa`.`id_user` WHERE `pre_resa`.`statut`='en cours'");

            $userbk = [];
            $bks = [];
            $ing = [];
            
            while ($ub = $req1->fetch(PDO::FETCH_ASSOC)){
                $userbk[] = new User ($ub);
                $bks[] = new Book ($ub);
                $ing[] = new Pre_resa ($ub);
            }
           
             
            $req2 = $db->query("SELECT `pre_resa`.`id_preresa`, `pre_resa`.`id_book`, `pre_resa`.`id_copy`, `date`, `pre_resa`.`id_user`, `statut`, `book`.`id_book`, `book`.`title`, `user`.`id_user`, `user`.`firstname`, `user`.`lastname`, `user`.`user_number`, `book`.`isbn_number` FROM `pre_resa` INNER JOIN `book` ON `pre_resa`.`id_book` = `book`.`id_book` INNER JOIN `user` ON `user`.`id_user` = `pre_resa`.`id_user` WHERE `pre_resa`.`statut`='refusé' OR `pre_resa`.`statut`='validé'");

            $userbk2 = [];
            $bks2 = [];
            $ing2 = [];

            while ($ub2 = $req2->fetch(PDO::FETCH_ASSOC)){
                $userbk2[] = new User ($ub2);
                $bks2[] = new Book ($ub2);
                $ing2[] = new Pre_resa ($ub2);
            }

            if((isset($_GET['id'])) && (isset($_GET['value']))) {
                $id = $_GET['id'];
                $value = $_GET['value'];

                $update= $db->prepare("UPDATE `pre_resa` SET `statut` = :statut WHERE `id_preresa`= :id");

                $update->bindParam('id', $id, PDO::PARAM_INT);
                $update->bindParam('statut', $value, PDO::PARAM_STR);

                $update->execute();
            }
            
            return array($userbk,$bks,$ing,$userbk2,$bks2,$ing2);
        }

        public function searchBk(){

            $db = self::getDb();

            if(isset($_GET['search-return'])) {

                $data = !empty($_GET['search-return']) ? '%' . $_GET['search-return'] . '%' : NULL ;

                // var_dump($data);

                if($data ==! null){
                
                    // var_dump($data);

                    

                    $selectnumber = $db->prepare('SELECT `book`.`id_book`, `title`, `isbn_number`, `user`.`id_user`, `firstname`, `lastname`, `user_number`, `id_booking`, `booking_number`, `copy`.`id_copy`, `copy`.`condition` FROM `booking` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` INNER JOIN `book` ON `booking`.`id_book` = `book`.`id_book` INNER JOIN `copy` ON `copy`.`id_copy` = `booking`.`id_copy` WHERE `user`.`user_number` LIKE :search');

                    $selectnumber->bindParam('search', $data, PDO::PARAM_STR);

                    $selectnumber->execute();
                }
            } else {

                $selectnumber = $db->query('SELECT `book`.`id_book`, `title`, `isbn_number`, `user`.`id_user`, `firstname`, `lastname`, `user_number`, `id_booking`, `booking_number`, `copy`.`id_copy`, `copy`.`condition` FROM `booking` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` INNER JOIN `book` ON `booking`.`id_book` = `book`.`id_book` INNER JOIN `copy` ON `copy`.`id_copy` = `booking`.`id_copy`');

            }

            // $selectnumber = $db->prepare('SELECT `user`.`id_user`, `firstname`, `lastname`, `user`.`user_number`, `book`.`id_book`, `book`.`title`, `book`.`copy_number`, `book`.isbn_number, `copy`.`id_copy`, `copy`.`condition`,  FROM `user` INNER JOIN `pre_resa` ON `user`.`id_preresa` = `pre_resa`.`id_preresa` INNER JOIN `book` ON `book`.`id_book` = `pre_resa`.`id_book` INNER JOIN `copy` ON `copy`.`id_book` = `pre_resa`.`id_book` WHERE `user`.`user_number` LIKE ?');

            

            $bkusr = [];
            $bks = [];
            $bking = [];
            $bkcopy = [];

            while ($ing = $selectnumber->fetch(PDO::FETCH_ASSOC)) {
                // var_dump($ing);
                $bkusr[] = new User($ing);
                // var_dump($bkusr);
                $bks[] = new Book($ing);
                // var_dump($bks);
                $bking[] = new Booking($ing);
                // var_dump($bking);
                $bkcopy[] = new Copy($ing);
            }
            
            return array($bkusr,$bks,$bking, $bkcopy);
        }
        
        public function searchPreresa($s){
            $db = self::getDb();

            if(isset($_GET['search-stock']) && $_GET['search-stock'] !== null) {

                $search = '%' . $_GET['search-stock'] . '%';

                // Requête Résultats
                $reqResults = $db->prepare('SELECT `user`.`id_user`, `firstname`, `lastname`, `user`.`user_number`, `book`.`id_book`, `book`.`title`, `book`.`isbn_number`, `copy`.`id_copy`, `copy`.`condition`, `booking_number`, `booking`.`id_booking`,  DATE_FORMAT(`booking`.`end_day`, "%d/%m/%Y") AS `end_day` FROM `booking` INNER JOIN `book` ON `book`.`id_book` = `booking`.`id_book` INNER JOIN `copy` ON `copy`.`id_book` = `booking`.`id_book` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` WHERE `booking_number` LIKE :search AND NOW() < `end_day`');

                $reqResults->bindParam('search', $search, PDO::PARAM_STR);

                $reqResults->execute();

                $user = [];
                $book = [];
                $preresa = [];
                $booking = [];

                while ($ing = $reqResults->fetch(PDO::FETCH_ASSOC)) {
                    $user[] = new User($ing);
                    $book[] = new Book($ing);
                    $preresa[] = new Pre_resa($ing);
                    $booking[] = new Booking($ing);
                }

                // Requête Retards
                $reqRetards = $db->prepare('SELECT `user`.`id_user`, `firstname`, `lastname`, `user`.`user_number`, `book`.`id_book`, `book`.`title`, `book`.`isbn_number`, `copy`.`id_copy`, `copy`.`condition`, `booking_number`, `booking`.`id_booking`,  DATE_FORMAT(`booking`.`end_day`, "%d/%m/%Y") AS `end_day` FROM `booking` INNER JOIN `book` ON `book`.`id_book` = `booking`.`id_book` INNER JOIN `copy` ON `copy`.`id_book` = `booking`.`id_book` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` WHERE `booking_number` LIKE :search AND NOW() >= `end_day`');

                $reqRetards->bindParam('search', $search, PDO::PARAM_STR);

                $reqRetards->execute();

                $userLate = [];
                $bookLate = [];
                $preresaLate = [];
                $bookingLate = [];

                while ($ing = $reqRetards->fetch(PDO::FETCH_ASSOC)) {
                    $userLate[] = new User($ing);
                    $bookLate[] = new Book($ing);
                    $preresaLate[] = new Pre_resa($ing);
                    $bookingLate[] = new Booking($ing);
                }

                
            } else {

                // Requête Résultats
                $reqResults = $db->query('SELECT `user`.`id_user`, `firstname`, `lastname`, `user`.`user_number`, `book`.`id_book`, `book`.`title`, `book`.`isbn_number`, `copy`.`id_copy`, `copy`.`condition`, `booking_number`, `booking`.`id_booking`, DATE_FORMAT(`booking`.`end_day`, "%d/%m/%Y") AS `end_day` FROM `booking` INNER JOIN `book` ON `book`.`id_book` = `booking`.`id_book` INNER JOIN `copy` ON `copy`.`id_book` = `booking`.`id_book` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` AND NOW() < `end_day`');

                $user = [];
                $book = [];
                $preresa = [];
                $booking = [];

                while ($ing = $reqResults->fetch(PDO::FETCH_ASSOC)) {
                    $user[] = new User($ing);
                    // var_dump($user);
                    $book[] = new Book($ing);
                    // var_dump($book);
                    $preresa[] = new Pre_resa($ing);
                    // var_dump($preresa);
                    $booking[] = new Booking($ing);
                    // var_dump($booking);
                }

                // Requête Retards
                $reqRetards = $db->query('SELECT `user`.`id_user`, `firstname`, `lastname`, `user`.`user_number`, `book`.`id_book`, `book`.`title`, `book`.`isbn_number`, `copy`.`id_copy`, `copy`.`condition`, `booking_number`, `booking`.`id_booking`,  DATE_FORMAT(`booking`.`end_day`, "%d/%m/%Y") AS `end_day` FROM `booking` INNER JOIN `book` ON `book`.`id_book` = `booking`.`id_book` INNER JOIN `copy` ON `copy`.`id_book` = `booking`.`id_book` INNER JOIN `user` ON `booking`.`id_user` = `user`.`id_user` WHERE NOW() >= `end_day`');

                $userLate = [];
                $bookLate = [];
                $preresaLate = [];
                $bookingLate = [];

                while ($ing = $reqRetards->fetch(PDO::FETCH_ASSOC)) {
                    $userLate[] = new User($ing);
                    $bookLate[] = new Book($ing);
                    $preresaLate[] = new Pre_resa($ing);
                    $bookingLate[] = new Booking($ing);
                }


            }

            return array($user,$book,$preresa,$booking,$userLate,$bookLate,$preresaLate,$bookingLate);
        }
    }

