<?php

use App\Room;
use App\Rooms;

class RoomsController extends Controller {
    public function index(){
        $rooms = Rooms::all();
        RoomsView::printIndex($rooms);
    }

    public function create(){
        RoomsView::printCreate();
    }

    public function store(){
        $room = new Room();
        $this->silentSave($room);
        Rooms::save($room);
    }

    public function show(){
        if(isset($_GET['id'])){
            $room = Rooms::find($_GET['id']);
            RoomsView::printRoom($room);
        }
    }

    public function edit(){
        if(isset($_GET['id'])){
            $room = Rooms::find($_GET['id']);
            RoomsView::printEditRoom($room);
        }
    }

    public function update(){

    }

    public function delete(){

    }

    public function silentSave($room){

    }
}

?>