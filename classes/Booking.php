<?php

class Booking extends Classes{
    private $_id_booking;
    private $_id_user;
    private $_id_book;
    private $_start_day;
    private $_end_day;
    private $_lenght;
    private $_booking_number;

    public function getId_booking(){
        return $this->_id_booking;
    }
    public function setId_booking($id_booking){
        $this->_id_booking = $id_booking;
    }
    public function getId_user(){
        return $this->_id_user;
    }
    public function setId_user($id_user){
        $this->_id_user = $id_user;
    }
    public function getId_book(){
        return $this->_id_book;
    }
    public function setId_book($id_book){
        $this->_id_book = $id_book;
    }
    public function getStart_day (){
        return $this->_start_day;
    }
    public function setStart_day($start_day){
        $this->_start_day = $start_day;
    }
    public function getEnd_day (){
        return $this->_end_day;
    }
    public function setEnd_day($end_day){
        $this->_end_day = $end_day;
    }
    public function getLenght (){
        return $this->_lenght;
    }
    public function setLenght($lenght){
        $this->_lenght = $lenght;
    }
    public function getBooking_number (){
        return $this->_booking_number;
    }
    public function setBooking_number($booking_number){
        $this->_booking_number = $booking_number;
    }

}