<?php

include_once '../app/controllers/PublicController.php';
include_once '../app/controllers/IntranetController.php';

$page = isset($_GET['page']) ? $_GET['page']:'';


if($page == 'intranet'){
    $intranet = new IntranetController();
    $intranet->print_page();
}
else{
    $public = new PublicController();

    if($page == 'reserve' && isset($_REQUEST['action']) && $_REQUEST['action'] == 'store') {
        $public->store_reserve();
    }
    $public->print_page();
}

?>