<?php
include_once '../resources/views/intranet/LoginView.php';
include_once '../resources/views/intranet/IntranetHead.php';
include_once '../resources/views/intranet/DashboardView.php';
include_once '../../app/models/User.php';
include_once '../../app/models/Users.php';

class IntranetController{
    function print_page(){
        session_start();

        $head = new IntranetHead();
        $head->print_head();

        //Si el usuario ya ha iniciado sesión
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            if(isset($_GET['section'])){

            }
            else{

            }
        }
        else{
            //Si la acción es iniciar sesión
            if(isset($_POST['action']) & $_POST['action']=='login'){
                echo $_POST['email'];
                $users = new Users();
                $user = $users->find_by_email($_POST['email']);
                echo $_POST['email'];
                if($user != null){
                    if($_POST['email'] == $user->get_email() && $_POST['password'] == $user->get_password()){
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $user->get_name();
                        $_SESSION['start'] = time();
                        $_SESSION['expire'] = $_SESSION['start']+(5*60);
                        $dashboard = new DashboardView();
                        $dashboard->print_dashboard();
                    }
                    else{
                        $login = new LoginView();
                        $login->print_login();
                    }
                }
            }
            else {
                $login = new LoginView();
                $login->print_login();
            }
        }
    }
}