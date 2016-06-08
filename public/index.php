<?php

include_once '../app/controllers/PublicController.php';
include_once '../app/controllers/IntranetController.php';

$page = isset($_GET['page']) ? $_GET['page']:'';


if($page == 'intranet'){

    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'findreserve') {
        include_once '../resources/scripts/showReserves.php';
    }
    else{
        $intranet = new IntranetController();
        $intranet->print_page();
    }
}
else{
    $public = new PublicController();

    if($page == 'reserve' && isset($_REQUEST['action'])) {
        if($_REQUEST['action'] == 'store'){
            $public->store_reserve();
        }
        else if($_REQUEST['action'] == 'getroomtypes'){
            $public->get_roomtypes();
        }
        else if($_REQUEST['action'] == 'getpromotions'){
            $public->get_promotions();
        }
        else if($_REQUEST['action'] == 'roomstype') {
            include_once '../resources/scripts/showRooms.php';
        }
    }
    else{
        $public->print_page();

    }
}

?>