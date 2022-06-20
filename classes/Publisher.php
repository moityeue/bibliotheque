<?php
class Publisher  extends Classes{
    private $_id_publisher;
    private $name;

    public function getId_publisher(){
        return $this->_id_publisher;
    }
    public function setId_publisher($id_publisher){
        $this->_id_publisher = $id_publisher;
    }
    public function getName(){
        return $this->_name;
    }
    public function setName($name){
        $this->_name= $name;
    }
}