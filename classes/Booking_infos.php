<?php
class Booking_infos extends Classes {
    private $_id_booking_infos;
    private $_id_booking;
    private $_date;


    public function getId_booking_infos(){
        return $this->_id_booking_infos;
    }
    public function setId_booking_infos($id_booking_infos){
        $this->_id_booking_infos = $id_booking_infos;
    }
    public function getId_booking(){
        return $this->_id_booking;
    }
    public function setId_booking($id_booking){
        $this->_id_booking = $id_booking;
    }
    public function getDate(){
        return $this->_date;
    }
    public function setDate($date){
        $this->_date = $date;
    }
}