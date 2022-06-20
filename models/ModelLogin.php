<?php
class ModelLogin extends Model {
    public function loginU(){
        $db=$this->getDb();
        if(isset($_POST['submit'])){
            if(isset($_POST['login'])){
                $mail = $_POST['login'];
                $password = $_POST['password'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $req = $db->prepare("SELECT `id_user`, `mail`, `password` FROM `user` WHERE `mail` = :login");
                $req->bindparam('login', $_POST['login'], PDO::PARAM_STR);
                $req->execute();
                $users = $req->fetch(PDO::FETCH_ASSOC);
                if($req->rowCount()> 0 && $users['password']==$password){
                    $_SESSION['userId'] = $users['id_user'];
                    $user = new User($users);
                    header('Location:/php/Library-Lyon');
                }else {
                    echo  'Erreur login_admin/password';
                }
                
            }
        }            
                   
    }   
    public function loginA(){
        $db=$this->getDb();
        if(isset($_POST['submit'])){
    
            if(isset($_POST['login'])){
                $name = $_POST['login'];
                $password = $_POST['password'];
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $req = $db->prepare("SELECT `id_admin`, `name`, `password` FROM `admin` WHERE `name` = :login");
                $req->bindparam('login', $_POST['login'], PDO::PARAM_STR);
                $req->execute();
                
                $admins = $req->fetch(PDO::FETCH_ASSOC);
                if($req->rowCount()> 0 && $admins['password']==$password){
                    $_SESSION['userId'] = $admins['id_admin'];
                    $admin = new Admin($admins);
                   header('Location:/php/Library-Lyon/admin');
                   
                }else {
                    echo  'Erreur login_admin/password';
                }
               
            }
        }            
                   
    }   

}


