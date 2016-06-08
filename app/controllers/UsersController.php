<?php
include_once '../app/models/Users.php';
include_once '../app/models/User.php';
include_once '../resources/views/intranet/IntranetUsersView.php';
include_once '../app/controllers/Controller.php';

class UsersController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index(){
        $users = new Users();
        $users = $users->all();
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
        $users = new Users();
        if(isset($_POST['name'],$_POST['email'],$_POST['password'])) {
            $user = new User($_POST['name'], $_POST['email'], $_POST['password']);
            if($users->save($user))
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
        $users = new Users();
        $user = $users->find($id);
        UsersView::print_show($user);
    }

    /**
    * Show the form for editing the specified resource.
    */
    public function edit($id){
        $users = new Users();
        $user = $users->find($id);
        UsersView::print_edit($user);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update($id){
        $users = new Users();

        if(isset($_POST['name'],$_POST['email'],$_POST['password'])){
           $user=new User($_POST['name'],$_POST['email'],$_POST['password']);
           $user->set_id($id);
           if($users->update($user)) {
             header("Location: /?page=intranet&section=users");
           }
           else{
             header("Location: /?page=intranet&section=users&action=edit&id='.$id'");
           }
        }
    }

    /**
    * Remove the specified resource from storage.
    */
    public function delete($id){
        $users = new Users();
        $users->delete($id);
        header("Location: /?page=intranet&section=users");
    }
}
?>