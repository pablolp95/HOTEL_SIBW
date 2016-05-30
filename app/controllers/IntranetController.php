<?php
include_once '../resources/views/intranet/LoginView.php';
include_once '../resources/views/intranet/Head.php';
include_once '../resources/views/intranet/DashboardView.php';
include_once '../resources/views/intranet/Nav.php';
include_once '../resources/views/intranet/Footer.php';
include_once '../app/controllers/LoginController.php';
include_once '../app/controllers/UsersController.php';
include_once '../app/controllers/RoomsController.php';
include_once '../app/controllers/PromotionsController.php';
include_once '../app/controllers/ReservesController.php';
include_once '../app/controllers/RoomtypesController.php';

class IntranetController{
    function print_page(){
        session_start();
        $head = new IntranetHead();

        if(isset($_SESSION['expire']) && time()>$_SESSION['expire']){
            session_unset();
            session_destroy();
        }

        echo '<!DOCTYPE html>
        <html lang="es">';
        //Si el usuario ya ha iniciado sesión
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
            $head->print_head();
            $nav = new IntranetNav();
            echo'<body>';
            $nav->print_nav();

            if(isset($_REQUEST['action']) && $_REQUEST['action']=='logout'){
                session_destroy();
                session_unset();
                header("Location: /?page=intranet");
                exit();
            }

            if(isset($_REQUEST['section'])){
                switch ($_REQUEST['section']){
                    case 'reserves':
                        $controller = new ReservesController();
                        break;
                    case 'promotions':
                        $controller = new PromotionsController();
                        break;
                    case 'rooms':
                        $controller = new RoomsController();
                        break;
                    case 'users':
                        $controller = new UsersController();
                        break;
                    case 'roomtypes':
                        $controller = new RoomtypesController();
                        break;
                }

                if(isset($_REQUEST['action'])){
                    if(isset($_REQUEST['id'])){
                        switch ($_REQUEST['action']){
                            case 'edit':
                                $controller->edit($_REQUEST['id']);
                                break;
                            case 'delete':
                                $controller->delete($_REQUEST['id']);
                                break;
                            case 'update':
                                $controller->update($_REQUEST['id']);
                                break;
                        }
                    }else{
                        switch ($_REQUEST['action']){
                            case 'create':
                                $controller->create();
                                break;
                            case 'store':
                                $controller->store();
                                break;
                        }
                    }
                }else{
                    if(isset($_REQUEST['id'])){
                        $controller->show($_GET['id']);
                    }else{
                        $controller->index();
                    }
                }

            }
            else{
                $dashboard = new DashboardView();
                $dashboard->print_dashboard();
            }

            $footer = new IntranetFooter();
            $footer->print_footer();
            echo'</body>';
        }
        else{
            //Si la acción es iniciar sesión
            if(isset($_REQUEST['action']) && $_REQUEST['action']=='login'){
                $login = new LoginController();
                $logged = $login->get_login($_REQUEST['email'],$_REQUEST['password']);
                if($logged){
                    header("Location: /?page=intranet");
                    exit();
                }
                else{
                    //Abria que mostrar que ha habido un error
                    header("Location: /?page=intranet");
                    exit();
                }
            }
            else {
                $head->print_head();
                $login = new LoginView();
                $login->print_login();
            }
        }
        if(isset($_REQUEST['section']) && isset($_REQUEST['action']) && $_REQUEST['section']=='reserves' &&($_REQUEST['action']=='edit' || $_REQUEST['action']=='create')){
            echo '<script>
                 $(\'.datepicker\').pickadate();
                </script>';
        }

        echo '</html>';
    }
}