<?php
include_once '../app/models/Promotion.php';
include_once '../app/Db.php';
include_once '../app/models/Model.php';

class Promotions extends Model {
    function all(){
        $list = array();
        $db = Db::getInstance();
        $result = $db->query('SELECT * FROM promotions');

        while ($row = $result->fetch_assoc()) {
            $promotion = new Promotion($row['name'], $row['description'], $row['code'], $row['price']);
            $promotion->setId($row['id']);
            array_push($list,$promotion);
        }
        return $list;
    }

    function find($id){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM promotions WHERE id = \''.$id.'\'';
        $result = $db->query($statement);
        $promotion = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $promotion = new Promotion($row['name'], $row['description'], $row['code'], $row['price']);
            $promotion->setId($row['id']);
        }

        return $promotion;
    }
    function delete($id){
        $db = Db::getInstance();
        $statement = 'DELETE FROM promotions WHERE id =\''.$id.'\'';
        return $db->query($statement);
    }

    function update($promotion){
        $db = Db::getInstance();
        return $db ->query("UPDATE promotions SET name='{$promotion->getName()}', description='{$promotion->getDescription()}',
                            code='{$promotion->getCode()}', price='{$promotion->getPrice()}' WHERE id={$promotion->getId()}");

    }

    function save($promotion){
        $db = Db::getInstance();
        return $db->query("INSERT INTO promotions (id, name, description , code, price, created_at, updated_at)
                            VALUES ('','{$promotion->getName()}','{$promotion->getDescription()}','{$promotion->getCode()}',
                            '{$promotion->getPrice()}', NULL , NULL)");
    }
}