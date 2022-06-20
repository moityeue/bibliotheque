<?php
class Copy extends Classes {
    private $_id_copy;
    private $_id_book;
    private $_conditions;
    private $_id_language;

    public function getId_copy(){
        return $this->_id_copy;
    }
    public function setId_copy($id_copy){
        $this->_id_copy = $id_copy;
    }
    public function getId_booky(){
        return $this->_id_book;
    }
    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }
    public function getCondition(){
        return $this->_condition;
    }
    public function setCondition($condition){
        $this->_condition = $condition;
    }
    public function getId_language(){
        return $this->_id_language;
    }
    public function setLanguage($id_language){
        $this->_id_language = $id_language;
    }
}