<?php
include_once '../app/models/Room.php';
include_once '../app/models/Model.php';
include_once '../app/Db.php';

class Rooms extends Model{
    public function all(){
        $list = array();
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM rooms');

        while ($row = $result->fetch_assoc()) {
            $id = $row['roomtype_id'];
            $name = $db->query('SELECT name FROM roomtypes WHERE id= \''.$id.'\'');
            while ($type = $name->fetch_assoc()) {
                $room = new Room($row['id'],$type['name'],$row['room_number']);
                $room->set_reserve_associated($row['reserve_id']);
                array_push($list,$room);
            }
        }
        return $list;
    }

    public function find($id){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM rooms WHERE id = \''.$id.'\'';
        $result = $db->query($statement);
        $room = null;

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $name = $db->query('SELECT name FROM roomtypes WHERE id= \''.$row['roomtype_id'].'\'');
            while ($type = $name->fetch_assoc()) {
                $room = new Room($row['id'],$type['name'],$row['room_number']);
                $room->set_reserve_associated($row['reserve_id']);
            }
        }
        return $room;
    }

    public function findByReserveAssociated($reserve_id){
        $list = array();
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM rooms WHERE reserve_id= \''.$reserve_id.'\'');

        while ($row = $result->fetch_assoc()) {
            $id = $row['roomtype_id'];
            $name = $db->query('SELECT name FROM roomtypes WHERE id= \''.$id.'\'');
            while ($type = $name->fetch_assoc()) {
                $room = new Room($row['id'],$type['name'],$row['room_number']);
                $room->set_reserve_associated($row['reserve_id']);
                array_push($list,$room);
            }
        }
        return $list;
    }

    public function delete($id){
        $db = Db::getInstance();
        $statement = 'DELETE FROM rooms WHERE id =\''.$id.'\'';
        return $db->query($statement);
    }

    public function update($room){
        $db=Db::getInstance();
        return $db ->query("UPDATE rooms SET room_number='{$room->get_number()}',roomtype_id='{$room->get_type()}',
                     reserve_id='{$room->get_reserve_associated()}' WHERE id={$room->get_id()}");
    }

    public function save($room){
        $db = Db::getInstance();
        return $db->query("INSERT INTO rooms (id, room_number,roomtype_id,reserve_id,created_at,updated_at)
        VALUES ('','{$room->get_number()}','{$room->get_type()}', NULL, NULL , NULL)");
    }
    
    public function getByType($roomtype_id){
        $list = array();
        $db = Db::getInstance();
        $statement = 'SELECT * FROM rooms WHERE roomtype_id = \''.$roomtype_id.'\'';
        $result = $db->query($statement);

        while ($row = $result->fetch_assoc()) {
            $id = $row['roomtype_id'];
            $name = $db->query('SELECT name FROM roomtypes WHERE id= \''.$roomtype_id.'\'');
            while ($type = $name->fetch_assoc()) {
                $room = new Room($row['id'],$type['name'],$row['room_number'],$row['reserve_id']);
                array_push($list,$room);
            }
        }
        return $list;
    }
}