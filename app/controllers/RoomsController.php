<?php

require ('../Rooms');
class RoomsController extends Controller
{
    public function index(){
        $rooms=Rooms::all();
        RoomView::printIndex($rooms);
    }
    public function create(){
        RoomView::printCreate();
    }
    public function store($request){
        $room=new Room();
        $this->silentSave($room,$request);
        Rooms::save($room);
    }
    public function show($_GET){
        if(isset($_GET['id'])){
            $room =Rooms::find($_GET['id']);
            RoomView::printRoom($room);
        }
    }
    public function edit($_GET){

        if(isset($_GET['id'])){
            $room =Rooms::find($_GET['id']);
            RoomView::printEditRoom($room);
        }
    }
    public function update($request){

    }
    public function delete(){

    }
    public function silentSave(&$room,$request){

    }
}?>