<?php

class Users extends Model {
    static function all(){
        $list = [];
        $db = Db::getInstance();
        $statement = 'SELECT * FROM users';
        $result = $db->query($statement);

        foreach($result->fetch_all() as $user){
            $list[] = new User($user['name'],$user['email'],$user['password']);
        }
        return $list;
    }

    static function find($id){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM users WHERE id = '.$id;
        $result = $db->query($statement);
        $user = null;
        if($result->num_rows() > 0){
            $user = new User($result['name'], $result['email'], $result['password']);
        }
        return $user;
    }

    static function find_by_email($email){
        $db = Db::getInstance();
        $statement = 'SELECT * FROM users WHERE email = '.$email;
        $result = $db->query($statement);
        $user = null;
        if($result->num_rows() > 0){
            $user = new User($result['name'], $result['email'], $result['password']);
        }
        return $user;
    }

    static function delete($id){
        $db = Db::getInstance();
        $statement = 'DELETE * FROM users WHERE id = '.$id;
        $db->query($statement);
    }

    static function update(){
        $db = Db::getInstance();
    }

    static function save($user){
        $db = Db::getInstance();
        $statement = 'INSERT INTO users (name,email,password) VALUES ('.$user->name.','.$user->email.','.$user->password.')';
        return $db->query($statement);
    }
}