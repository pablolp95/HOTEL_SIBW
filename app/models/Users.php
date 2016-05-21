<?php
namespace App;

use App\Db;

class Users extends Model {
    static function all(){
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM USERS');

        foreach($req->fetchAll() as $r){
            $list[] = new user($r['name'],$r['email'],$r['password']);
        }
        return $list;
    }

    static function find($id){
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM USERS WHERE ID='%$id%'');
        return $req;
    }

    static function delete($id){
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM USERS WHERE ID='%$id%'');
        return $req;
    }

    static function update(){
        $db = Db::getInstance();
        return $db->query('UPDATE USERS set EMAIL='%$request->email%', NAME='%$request->name%',PASSWORD='%$request->password%' WHERE ID='%$request->id%'');

    }

    static function save($user){
        $db = Db::getInstance();
        return $db->query('INSERT INTO USERS (NAME,EMAIL,PASSWORD,TOKEN) VALUES ($user->name,$user->email,$user->password)');
    }
}