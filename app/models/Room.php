<?php

class Room
{
    var $id;
    var $type;
    var $room_number;
    var $reserve_associated;

    function __construct($id, $type, $room_number){
        $this->id = $id;
        $this->type = $type;
        $this->room_number = $room_number;
    }

    public function get_id(){
        return $this->id;
    }

    public function set_id($id){
        $this->id = $id;
    }

    public function get_type(){
        return $this->type;
    }

    public function set_type($type){
        $this->type = $type;
    }
    
    public function get_number(){
        return $this->room_number;
    }

    public function set_number($room_number){
        $this->room_number = $room_number;
    }

    public function get_reserve_associated(){
        return $this->reserve_associated;
    }

    public function set_reserve_associated($reserve_associated){
        $this->reserve_associated = $reserve_associated;
    }

}