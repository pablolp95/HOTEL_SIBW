<?php
include_once 'HomeView.php';
include_once 'RoomsView.php';
include_once 'PromotionsView.php';
include_once 'GalleryView.php';
include_once 'ContactView.php';

class Content{

    //Function that prints home's page
    function printHome(){
        $home = new HomeView();
        $home->printHome();
    }
    
    //This functions prints promotion's page
    function printPromotions(){
        $promotions = new PromotionsView();
        $promotions->printPromotions();
    }

    //This function prints Rooms's page
    function printAllRooms(){
        $rooms = new RoomsView();
        $rooms->printAllRooms();
    }

    //This function prints a specific room page
    function printRoom($page){
        $rooms = new RoomsView();
        $rooms->printRoom($page);
    }

    //This funciton prints Galery's page
    function printGallery(){
        $gallery = new GalleryView();
        $gallery->printGallery();
    }

    //This function prints contact's page
    function printContact(){
        $contact = new ContactView();
        $contact->printContact();
    }
}


?>