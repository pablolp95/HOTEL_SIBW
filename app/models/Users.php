<?php


class Users extends model
{
    static function all()
    {
        $list=[];
        $db=Db::getInstance();
        $req=$db->query('SELECT * FROM USERS');

        foreach($req->fetchAll() as $r){
            $list[]=new user($r['name'],$r['email'],$r['password'],$r['RememberToken']);
        }
        return $list;
    }

    static function find($id)
    {
        $db=Db::getInstance();
        $req=$db->query('SELECT * FROM USERS WHRERE ID='%$id%'');
        return $req;
    }

    static function delete($id)
    {
        $db=Db::getInstance();
        return $db->query('DELETE FROM USERS WHRERE ID=\'%$id%\'');
    }

    static function update ($request)
    {
        $db=Db::getInstance();
        return $db->query('UPDATE USERS set EMAIL='%$request->email%', NAME='%$request->name%',PASSWORD='%$request->password%', $TOKEN='%$request->RememberToken%' WHERE ID='%$request->id%'');

    }
    static function save($Model) {
        $db=Db::getInstance();
        return $db->query('INSERT INTO USERS (NAME,EMAIL,PASSWORD,TOKEN) VALUES ($model->name,$model->email,$model->password,$model->RememberToken)');
    }
}?>