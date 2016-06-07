<?php
include_once '../app/models/Roomtypes.php';
include_once '../app/models/Roomtype.php';
include_once '../resources/views/intranet/IntranetRoomtypesView.php';
include_once '../app/controllers/Controller.php';

class RoomtypesController extends Controller {
    public function index(){
        $rooms = new Roomtypes();
        $list = $rooms->all();
        IntranetRoomtypesView::print_index($list);
    }

    public function create(){
        IntranetRoomtypesView::print_create();
    }

    public function store(){
        if(isset($_POST['name'],$_POST['base_price'],$_POST['max_adults'],$_POST['max_children'])){
            $roomtype = new Roomtype(null,$_POST['name'], $_POST['description'], $_POST['max_adults'], $_POST['max_children'],$_POST['base_price']);
            $roomtypes = new Roomtypes();
            if($roomtypes->save($roomtype)){
                header("Location: /?page=intranet&section=roomtypes");
            }
            else{
                header("Location: /?page=intranet&section=roomtypes&action=create");

            }
        }
    }

    public function show($id){
        $roomtypes = new Roomtypes();
        $roomtype = $roomtypes->find($id);
        IntranetRoomtypesView::print_show($roomtype);
    }

    public function edit($id){
        $roomtypes = new Roomtypes();
        $roomtype = $roomtypes->find($id);
        IntranetRoomtypesView::print_edit($roomtype);
    }

    public function update($id){
        if(isset($_POST['name'],$_POST['base_price'],$_POST['max_adults'],$_POST['max_children'])){
            $roomtype = new Roomtype($id,$_POST['name'], $_POST['description'], $_POST['max_adults'], $_POST['max_children'],$_POST['base_price']);
            $roomtypes = new Roomtypes();
            if($roomtypes->update($roomtype)){
                header("Location: /?page=intranet&section=roomtypes");
            }
            else{
                header("Location: /?page=intranet&section=roomtypes&action=edit&id=".$roomtype->getId());
            }
        }
    }

    public function delete($id){
        $roomtypes = new Roomtypes();
        if($roomtypes->delete($id))
            header("Location: /?page=intranet&section=roomtypes");

    }
    public function getall(){
        $rooms = new Roomtypes();
        $list = $rooms->all();
    return $list;
    }
}

?>