<?php
include_once '../app/models/Rooms.php';
include_once '../app/models/Room.php';
include_once '../resources/views/intranet/IntranetRoomsView.php';

class RoomsController extends Controller {
    public function index(){
        $rooms = new Rooms();
        $list = $rooms->all();
        RoomsView::print_index($list);
    }

    public function create(){
        RoomsView::print_create();
    }

    public function store(){
        if(isset($_POST['select'])&& isset($_POST['number_room'])){
            $room = new Room($_POST['select'], $_POST['number_room']);
            $rooms = new Rooms();
            if($rooms->save($room)){
                header("Location: /?page=intranet&section=rooms");
            }
        }
    }

    public function show($id){
        $rooms = new Rooms();
        $room = $rooms->find($id);
        RoomsView::print_room($room);

    }

    public function edit($id){
        $rooms = new Rooms();
        $room = $rooms->find($id);
        RoomsView::print_edit($room);
    }

    public function update($id){
        $u=new Rooms();
        if(isset($_POST['select1'])&& isset($_POST['number_room1'])){
            $room = new Room($_POST['select1'], $_POST['number_room1']);
            $room->set_id($id);
            if($u->update($room)){
                header("Location: /?page=intranet&section=rooms");
            }
        }
    }

    public function delete($id){
        $u=new Rooms();
        if($u->delete($id))
            header("Location: /?page=intranet&section=rooms");

    }
}

?>