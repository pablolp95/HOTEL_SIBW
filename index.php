<!DOCTYPE html>
<html lang="es">

<?php

include_once 'Head.php';
include_once 'Nav.php';
include_once 'Content.php';
include_once 'Footer.php';
include_once 'Topbar.php';

$content = new Content();
$head = new Head();
$nav = new Nav();
$footer = new Footer();
$bar = new TopBar();


if(isset($_GET['page'])){
    $page = isset($_GET['page']) ? $_GET['page']:'';
}
else{
    $page = 'homepage';
}

$head->printHead($page);
$nav->printNav();

//$bar->printBar($page);
switch ($page){
    case 'promotions':
        $content->printPromotions();
        break;
    case 'rooms':
        $content->printAllRooms();
        break;
    case 'double-room':
    case 'triple-room':
    case 'superior-room':
        $content->printRoom($page);
        break;
    case 'gallery':
        $content->printGallery();
        break;
    case 'contact':
        $content->printContact();
        break;

    default:
        $content->printHome();
        break;

}
$footer->printFooter();

?>
</html>
