<?php
    
    class Author extends Classes {
        private $_id_author;
        private $_name_author;
        private $_nationality;

        public function getId_author(){
            return $this->_id_author;
        }
        public function setId_author($id_author){
            $this->_id_author = $id_author;
        }
        public function getName_author(){
            return $this->_name_author;
        }
        public function setName_author($name_author){
            $this->_name_author = $name_author;
        }
        public function getNationality(){
            return $this->_nationality;
        }
        public function setNationality($nationality){
            $this->_nationality = $nationality;
        }
    }