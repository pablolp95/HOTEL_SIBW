<?php


include_once '../app/models/Users.php';
class UsersController extends Controller
{
    public function index(){
        $users = Users::all();
        UserView::printIndex($users);
    }
    public function create(){
        UserView::printCreate();
    }
    public function store($request){
        $user = new User();
        $this->silentSave($user,$request);
        Users::save($user); //guardo,Añado el usuario a la base de datos
    }
    public function show($_GET){
        if(!isset($_GET['id'])){

        }
        else{
            $user=Users::find($_GET['id']);
            UserView::printUser($user);
        }
    }
    public function edit($_GET){
        if(isset($_GET['id'])){
            $user=Users::find($_GET['id']);
            UserView::printEditUser($user);
        }
    }
    public function update($request){
        $user=new User();
        $user=Users::find($request->id);
        $this->silentSave($user,$request);

        //Ahora habría que buscar por la id del request y cambiar los valores de ese usuario por los nuevos.
    }
    public function delete(){

    }
    public function silentSave(&$user,$request){
        $user->name=$request->name;
        $user->password=$request->password;
        $user->RememberToken=$request->RememberToken;

    }


}?>