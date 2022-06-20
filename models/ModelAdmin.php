<?php
    class ModelAdmin extends Model{
        public function edituser($name){
            $db=$this->getDb();
            if(isset($_GET['submit'])) {
                $name = $_GET['user_number'];

                $searchuser = $db->prepare('SELECT * FROM `user` WHERE `user_number` LIKE ?');

                $searchuser->BindParam('user_number',$name, PDO::PARAM_STR);
                $searchuser->execute(array($name));

                $infos = [];
                while ($i = $searchuser->fetch(PDO::FETCH_ASSOC)) {
                    $infos[] = new User($i);
                }
                
                return $infos;
            }
        }
        public function countbooking($name){
            $db = $this->getDb();
            if(isset($_GET['submit'])) {
                $name = $_GET['firstname'];

                $reqcount = $db->query('SELECT COUNT(`pre_resa`.`id_preresa`) FROM `pre_resa` INNER JOIN `user` ON `user`.`id_user`= `pre_resa`.`id_user` WHERE `firstname` LIKE ?');
                
                $reqcount->BindParam('firstname', $name, PDO::PARAM_STR);
                $reqcount->execute(array($name));
                
                return $reqcount;
            }
        }
    }