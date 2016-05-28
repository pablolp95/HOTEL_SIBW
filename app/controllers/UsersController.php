<?php
include_once '../app/models/Users.php';
include_once '../app/models/User.php';
include_once '../resources/views/intranet/IntranetUsersView.php';
include_once '../app/controllers/Controller.php';

class UsersController extends Controller
{
var $actionA;
/**
* Display a listing of the resource.
*/
public function index(){
    $u=new Users();
    $users = $u->all();
    UsersView::print_index($users);
}

/**
* Show the form for creating a new resource.
*/
public function create(){
UsersView::print_create();
}

/**
* Store a newly created resource in storage.
*/
public function store(){
    $u=new Users();
     if(isset($_POST['name1'])&& isset($_POST['email1']) && isset($_POST['password1'])) {
         $user = new User($_POST['name1'], $_POST['email1'], $_POST['password1']);
       if($u->save($user))
           header("Location: /?page=intranet&section=users");

     }
    else{
        header("Location: /?page=intranet&section=users&action=create");
    }

}


/**
* Display the specified resource.
*/
public function show($id){
$user = Users::find($id);
UsersView::print_show($user);
}

/**
* Show the form for editing the specified resource.
*/
public function edit($id){
$use = Users::find($id);
UsersView::print_edit($use);
}

/**
* Update the specified resource in storage.
*/
public function update($id){
    $u=new Users();
      if(isset($_POST['name2'])&& isset($_POST['email2']) && isset($_POST['password2'])){
       $user=new User($_POST['name2'],$_POST['email2'],$_POST['password2']);
    $user->set_id($id);
     if($u->update($user)) {
    header("Location: /?page=intranet&section=users");
    }
     else{
         header("Location: /?page=intranet&section=users&action=edit&id={$user->get_id()}");

     }
    }
}

/**
* Remove the specified resource from storage.
*/
public function delete($id){
if($user=Users::delete($id)){
header("Location: /?page=intranet&section=users");

}
}



}
?>