<!DOCTYPE html>
<html lang="es">

<?php

include_once '../resources/views/Head.php';
include_once '../resources/views/Nav.php';
include_once '../resources/views/Content.php';
include_once '../resources/views/Footer.php';

$content = new Content();
$head = new Head();
$nav = new Nav();
$footer = new Footer();

if(isset($_GET['page'])){
    $page = isset($_GET['page']) ? $_GET['page']:'';
}
else{
    $page = 'homepage';
}

$head->printHead($page);
$nav->printNav();

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
