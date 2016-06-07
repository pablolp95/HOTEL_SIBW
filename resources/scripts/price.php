<?php
include_once "../app/models/Reserve.php";
include_once "../app/models/Reserves.php";
include_once '../app/models/Roomtype.php';
include_once '../app/models/Roomtypes.php';
include_once '../app/controllers/RoomtypesController.php';
include_once '../app/controllers/ReservesController.php';
include_once '../app/controllers/PromotionsController.php';
include_once "../app/models/Promotion.php";

$doble=$_GET['doble'];
$triple=$_GET['triple'];
$ind=$_GET['ind'];
$fam=$_GET['fam'];
$day=$_GET['day'];
$pro=$_GET['pro'];
$controller=new RoomtypesController();
$list=$controller->getall();
$price=$pro;

foreach($list as $t){
    if($t->getName()=="Individual"){
        $price+=$ind*$t->getBasePrice()*$day;
    }
    if($t->getName()=="Doble"){
        $price+=$doble*$t->getBasePrice()*$day;
    }
    if($t->getName()=="Triple"){
        $price+=$triple*$t->getBasePrice()*$day;
    }
    if($t->getName()=="Familiar") {
        $price += $fam * $t->getBasePrice()*$day;
    }

}




echo'
        <p>TOTAL: <span id="total_amount">'.$price.'</span>€</p>';

?>