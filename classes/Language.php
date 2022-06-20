<?php
   
    class Language extends Classes {
        private $_id_language;
        private $_language;

        public function getId_language(){
            return $this->_id_language;
        }
        public function setId_language($id_language){
            $this->_id_language = $id_language;
        }
        public function getLanguage(){
            return $this->_language;
        }
        public function setLanguage($language){
            $this->_language = $language;
        }
    }