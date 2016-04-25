<?php
include_once 'Home.php';
include_once 'Rooms.php';
include_once 'promotions.php';
include_once 'gallery.php';
include_once 'contact.php';
class Content{

    //Function that prints home's page
    function printHome(){
        $home = new Home();
        $home->printHome();
    }
    
    //This functions prints promotion's page
    function printPromotions(){
        $promotions =new promotions();
        $promotions->printPromotions();
    }

    //This function prints Rooms's page
    function printAllRooms(){
        $rooms = new Rooms();
        $rooms->printAllRooms();
    }

    //This function prints a specific room page
    function printRoom($page){
        $rooms = new Rooms();
        $rooms->printRoom($page);
    }

    //This funciton prints Galery's page
    function printGallery(){
        $gallery=new gallery();
        $gallery->printGallery();
    }

    //This function prints contact's page
    function printContact(){
        $contact=new contact();
        $contact->printContact();
    }
}


?>