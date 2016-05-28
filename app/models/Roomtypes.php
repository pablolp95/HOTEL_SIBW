<?php
include_once '../app/models/Roomtype.php';

class Roomtypes
{
    function all(){
        $list = [];
        $statement = 'SELECT * FROM roomtypes';
        $result = Db::getInstance()->query($statement);

        foreach($result->fetch_all() as $roomtype){
            $list[] = new Roomtype($roomtype['id'],$roomtype['name'],$roomtype['description']);
        }
        return $list;
    }

    function find($id){
        $statement = 'SELECT * FROM roomstypes WHERE id = \''.$id.'\'';
        $result = Db::getInstance()->query($statement);
        $roomtype = null;
        if($result->num_rows() > 0){
            $row = $result->fetch_assoc();
            $roomtype = new Roomtype($row['id'],$row['name'],$row['description']);
        }
        return $roomtype;
    }

    function delete($id){

    }

    function update(){

    }

    function save($reserve){

    }
}