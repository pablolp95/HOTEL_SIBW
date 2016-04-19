<!DOCTYPE html>
<html lang="es">

<?php

include 'head.php';
include 'header.php';
include 'content.php';
include 'footer.php';
include 'topbar.php';
$content =new content();
$head = new head();
$nav =new nav();
$footer= new footer();
$bar= new TopBar();


if(isset($_GET['page'])){
    $page=isset($_GET['page']) ? $_GET['page']:'';
}
else{
    $page='homepage';
}

$head->printHead($page);
$nav->printNav();
$bar->printBar($page);
switch ($page){
    case 'rooms':
        $content->printAllRooms();
        break;
    case 'double-room':
    case 'triple-room':
    case 'top-room':
        $content->printRoom($page);
    break;
    default:
        $content->home();
        break;

}
$footer->printFooter();

?>
</html>
