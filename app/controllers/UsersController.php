<?php

use App\User;
include_once '../../resources/views/intranet/UsersView.php';

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = Users::all();
        UsersView::printIndex($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        UsersView::printCreate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(){
        $user = new User();
        $this->silentSave($user);
        Users::save($user); //guardo,Añado el usuario a la base de datos
    }


    /**
     * Display the specified resource.
     */
    public function show(){
        if(!isset($_GET['id'])){

        }
        else{
            $user = Users::find($_GET['id']);
            UsersView::printUser($user);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(){
        if(isset($_GET['id'])){
            $user = Users::find($_GET['id']);
            UsersView::printEditUser($user);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(){
        $user = new User();
        $user = Users::find($_GET['id']);
        $this->silentSave($user);
        Users::save($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(){

    }

    /**
     * Basic save operation used for update & store.
     *
     * @param $user
     */
    public function silentSave($user){
        $user->name = $_GET->name;
        $user->password = $_GET->password;
        $user->RememberToken = $_GET->RememberToken;

    }


}