<?php
class Pre_resa extends Classes {
    private $_id_preresa; 
    private $_id_book; 
    private $_id_copy; 
    private $_date; 
    private $_id_user; 
    private $_statut; 

    public function getId_preresa(){
        return $this->_id_preresa;
    }
    public function setId_preresa($id_preresa){
        $this->_id_preresa = $id_preresa;
    }

    public function getId_book(){
        return $this->_id_book;
    }
    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }

    public function getId_copy(){
        return $this->_id_copy;
    }
    public function setId_copy($id_copy){
        $this->_id_copy = $id_copy;
    }
    public function getDate(){
        return $this->_date;
    }
    public function setId_date($date){
        $this->_date = $date;
    }

    public function getId_user(){
        return $this->_id_user;
    }
    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
    public function getStatut(){
        return $this->_statut;
    }
    public function setStatut($statut){
        $this->_statut = $statut;
    }

}