<?php
class Admin extends Classes{
    private $_id_admin;
    private $_name;
    private $_password;

    public function getId_admin(){
        return $this->_id_admin;
    }
    public function setId_admin($id_admin){
        $this->_id_admin = $id_admin;
    }
    public function getName(){
        return $this->_name;
    }
    public function setName($name){
        $this->_name = $name;
    }
    public function getPassword(){
        return $this->_password;
    }
    public function setPassword($password){
        $this->_password = $password;
    }
}