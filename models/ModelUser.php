<?php
    class ModelUser extends Model {
        public function userBk(){
            $db=$this->getDb();
            $req = $db->query('SELECT `user`.`id_user`, `firstname`, `lastname`, `password`, `mail`, `user_number`, `tel`,`id_booking_infos`,`booking_infos`.`id_booking`, `date`, `booking`.`id_booking`, `booking`.`id_user`, `booking`.`id_book`, `booking`.`start_day`, `booking`.`end_day`, `booking`.`lenght`, `booking`.`booking_number`, `copy`.`id_copy`, `copy`.`id_book`, `copy`.`condition` FROM `booking` INNER JOIN `booking_infos` ON `booking_infos`.`id_booking` = `booking`.`id_booking` INNER JOIN `user` ON `user`.`id_user` = `booking`.`id_user` INNER JOIN `copy` ON `copy`.`id_book` = `booking`.`id_book`');
            $req2 = $db->query("SELECT  `isbn_number` FROM `book`");
            
            $userbooking = [];
            $userbkinfos = [];
            $usercopy = [];
            $userinfos = [];
            $userbook = [];

            while ($usb = $req->fetch(PDO::FETCH_ASSOC)){
                $userbooking[] = new Booking($usb);
                $userbkinfos[] = new Booking_infos($usb);
                $usercopy[] = new Copy($usb);
                $userinfos[] = new User($usb);
            } 
            
            while($usb2 = $req2->fetch(PDO::FETCH_ASSOC)){
                $userbook[] = new Book($usb2);
            }
               
                return array($userbooking,$userbkinfos,$usercopy,$userinfos, $userbook);
        }
    }
