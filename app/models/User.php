<?php

namespace App;

class User {
    var $id;
    var $name;
    var $email;
    var $password;

    public function id(){
        return $this->id;
    }

    public function name(){
        return $this->name;
    }

    public function email(){
        return $this->email;
    }

    public function password(){
        return $this->password;
    }
}