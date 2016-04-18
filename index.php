<!DOCTYPE html>
<html lang="es">

<?php

include 'head.php';
include 'header.php';
include 'content.php';
include 'footer.php';

$content =new content();
$head = new head();
$nav =new nav();
$footer= new footer();
if(isset($_GET['page'])){
    $page=isset($_GET['page']) ? $_GET['page']:'';
}

$head->printHead($page);
$nav->printNav();

switch ($page){
    case 'rooms':
        $head->printHead($page);
        $nav->printNav();
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
