<?php
include_once '../app/models/Roomtype.php';
include_once '../app/models/Model.php';
include_once '../app/Db.php';

class Roomtypes extends Model {
    function all(){
        $list = array();
        $statement = 'SELECT * FROM roomtypes';
        $result = Db::getInstance()->query($statement);

        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $roomtype = new Roomtype();
                $this->silentSave($roomtype, $row);
                array_push($list,$roomtype);
            }
        }

        return $list;
    }

    function find($id){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM roomtypes WHERE id = \''.$id.'\'';
        $result = $db->query($statement);
        $roomtype = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $roomtype = new Roomtype();
            $this->silentSave($roomtype, $row);
        }
        return $roomtype;
    }

    function findByName($name){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM roomtypes WHERE name = \''.$name.'\'';
        $result = $db->query($statement);
        $roomtype = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $roomtype = new Roomtype();
            $this->silentSave($roomtype, $row);
        }
        return $roomtype;
    }

    function delete($id){
        $statement = 'DELETE FROM roomtypes WHERE id = \''.$id.'\'';
        return Db::getInstance()->query($statement);
    }

    function update($roomtype){
        $db = Db::getInstance();
        return $db ->query("UPDATE roomtypes SET name='{$roomtype->getName()}', description='{$roomtype->getDescription()}',
                            max_adults='{$roomtype->getMaxAdults()}', max_children='{$roomtype->getMaxChildren()}',
                            base_price='{$roomtype->getBasePrice()}' WHERE id={$roomtype->getId()}");
    }

    function save($roomtype){
        $db = Db::getInstance();
        return $db->query("INSERT INTO roomtypes (id, name, description, max_adults, max_children, base_price, created_at, updated_at)
                            VALUES ('','{$roomtype->getName()}','{$roomtype->getDescription()}','{$roomtype->getMaxAdults()}',
                            '{$roomtype->getMaxChildren()}','{$roomtype->getBasePrice()}',NULL , NULL)");
    }

    private function silentSave($reserve,$row){
        $reserve->setId($row['id']);
        $reserve->setName($row['name']);
        $reserve->setDescription($row['description']);
        $reserve->setMaxAdults($row['max_adults']);
        $reserve->setMaxChildren($row['max_children']);
        $reserve->setBasePrice($row['base_price']);
    }
}