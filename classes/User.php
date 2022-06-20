<?php
class User extends Classes {
    private $_id_user;
    private $_firstname;
    private $_lastname;
    private $_password;
    private $_mail;
    private $_user_number;
    private $_tel;

    public function getId_user(){
        return $this->_id_user;
    }
    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
    public function getFirstname(){
        return $this->_firstname;
    }
    public function setFirstname($firstname){
        $this->_firstname = $firstname;
    }
    public function getLastname(){
        return $this->_lastname;
    }
    public function setLastname($lastname){
        $this->_lastname = $lastname;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function setPassword($password){
        $this->_password = $password;
    }
    public function getMail(){
        return $this->_mail;
    }
    public function setMail($mail){
        $this->_mail = $mail;
    }
    public function getUser_number(){
        return $this->_user_number;
    }
    public function setUser_number($user_number){
        $this->_user_number = $user_number;
    }
    public function getTel(){
        return $this->_tel;
    }
    public function setTel($tel){
        $this->_tel = $tel;
    }
}