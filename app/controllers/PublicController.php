<?php
include_once '../resources/views/ContactView.php';
include_once '../resources/views/Footer.php';
include_once '../resources/views/GalleryView.php';
include_once '../resources/views/Head.php';
include_once '../resources/views/HomeView.php';
include_once '../resources/views/MyReserveView.php';
include_once '../resources/views/Nav.php';
include_once '../resources/views/PromotionsView.php';
include_once '../resources/views/RoomsView.php';
include_once '../resources/views/ReserveView.php';
include_once '../app/controllers/ReservesController.php';
include_once '../app/controllers/RoomtypesController.php';
include_once '../app/controllers/PromotionsController.php';

class PublicController{
    function print_page(){
        if($_GET['page']!='reserve'){
            session_start();
            if(isset($_SESSION['expire'])){
                session_unset();
                session_destroy();
            }
        }

        echo'<!DOCTYPE html>
        <html lang="es">';
        $page = $_GET['page'];
        $head = new Head();
        $nav = new Nav();
        $footer = new Footer();

        $head->print_head($page);
        echo '<body>';
        $nav->print_nav();

        switch ($page) {
            case 'promotions':
                $promotions = new PromotionsView();
                $promotions->print_promotions();
                break;
            case 'rooms':
                $rooms = new RoomsView();
                $rooms->print_all_rooms();
                break;
            case 'double-room':
            case 'triple-room':
            case 'superior-room':
                $rooms = new RoomsView();
                $rooms->print_room($page);
                break;
            case 'gallery':
                $gallery = new GalleryView();
                $gallery->print_gallery();
                break;
            case 'contact':
                $contact = new ContactView();
                $contact->print_contact();
                break;
            case 'myreserve':
                $myReserve = new MyReserveView();
                if(isset($_REQUEST['email'],$_REQUEST['reserve_code'])) {
                    $reserves = new ReservesController();
                    $reserve = $reserves->findByEmailCode($_REQUEST['email'],$_REQUEST['reserve_code']);
                    $myReserve->print_my_reserve($reserve);
                }
                else{
                    $myReserve->print_form();
                }
                break;
            case 'reserve':
                if(isset($_REQUEST['step'])){
                    $reserve = new ReserveView();
                    $step = $_REQUEST['step'];
                    $reserve->print_reserve($step);
                }
                break;
            default:
                $home = new HomeView();
                $home->print_home();
                break;
        }

        $footer->print_footer();
        echo '<!-- Personal scripts -->';
        if($page == 'contact')
            echo'<script src="js/emailValidation.js"></script>';
        else if($page == 'intranet')
            echo'<script src="js/intranet.js"></script>';
        else if($page == 'reserve')
            echo'<script src="js/reserve.js"></script>';
        echo '</body>
        </html>';
    }

    function store_reserve(){
        $reserves = new ReservesController();
        $reserves->publicStore();
    }

    function get_roomtypes(){
        $types = json_decode(stripslashes($_POST['data']));
        if($types != NULL){
            $roomtypes = new RoomtypesController();
            $list = array();
            foreach($types as $type){
                $roomtype = $roomtypes->findByName($type);
                $list[$type] = $roomtype->getBasePrice();
            }
            echo json_encode($list);
        }
    }

    function get_promotions(){
        $promotionsCodes = json_decode(stripslashes($_POST['data']));
        if($promotionsCodes != NULL){
            $promotions = new PromotionsController();
            $list = array();
            foreach($promotionsCodes as $code){
                $promotion = $promotions->findByCode($code);
                $list[$code] = $promotion->getPrice();
            }
            echo json_encode($list);
        }
    }
}