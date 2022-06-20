<?php
    
    class Book extends Classes {
        private $_id_book;
        private $_title;
        private $_id_author;
        private $_id_category;
        private $_publication_date;
        private $_cover;
        private $_isbn_number;
        private $_description;
        private $_copy_number;
        private $_id_publisher;
        private $_location;
        private $_id_language;

        public function getId_book(){
            return $this->_id_book;
        }
        public function getTitle(){
            return $this->_title;
        }
        public function getId_author(){
            return $this->_id_author;
        }
        public function getId_category(){
            return $this->_id_category;
        }
        public function getPublication_date(){
            return $this->_publication_date;
        }
        public function getCover(){
            return $this->_cover;
        }
        public function getIsbn_number(){
            return $this->_isbn_number;
        }
        public function getDescription(){
            return $this->_description;
        }
        public function getCopy_number(){
            return $this->_copy_number;
        }
        public function getId_publisher(){
            return $this->_id_publisher;
        }
        public function getLocation(){
            return $this->_location;
        }

        public function setId_book($id_book){
            $this->_id_book = $id_book;
        }
        public function setTitle($title){
            $this->_title = $title;
        }
        public function setId_author($id_author){
            $this->_id_author = $id_author;
        }
        public function setId_category($id_category){
            $this->_id_category = $id_category;
        }
        public function setPublication_date($publication_date){
            $this->_publication_date = $publication_date;
        }
        public function setCover($cover){
            $this->_cover = $cover;
        }
        public function setIsbn_number($isbn_number){
            $this->_isbn_number = $isbn_number;
        }
        public function setDescription($description){
            $this->_description = $description;
        }
        public function setCopy_number($copy_number){
            $this->_copy_number = $copy_number;
        }
        public function setId_publisher($id_publisher){
            $this->_id_publisher = $id_publisher;
        }
        public function setLocation($location){
            $this->_location = $location;
        }
        public function getId_language(){
            return $this->_id_language;
        }
        public function setId_language($id_language){
            $this->_id_language = $id_language;
        }
      
    }