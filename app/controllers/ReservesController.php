<?php
include_once '../app/controllers/Controller.php';
include_once '../resources/views/intranet/IntranetReservesView.php';
include_once '../app/models/Reserve.php';
include_once '../app/models/Reserves.php';
include_once '../app/models/Rooms.php';
include_once '../app/models/Roomtype.php';
include_once '../app/models/Roomtypes.php';

class ReservesController extends Controller
{
    function index(){
        $reserves = new Reserves();
        $list = $reserves->all();
        IntranetReservesView::print_index($list);
    }

    function create(){
        IntranetReservesView::print_create();
    }

    function store(){
        $reserve = new Reserve();
        $this->silentSave($reserve);
        $reserves = new Reserves();
        if($reserves->save($reserve)){
            header("Location: /?page=intranet&section=reserves");
        }
        else{
            header("Location: /?page=intranet&section=reserves&action=create");
        }
    }

    function publicStore(){
        $reserve = new Reserve();
        $this->silentSave($reserve);
        $reserves = new Reserves();
        if($reserves->save($reserve)){
            header("Location: /?page=reserve&step=summary");
        }
        else{
            header("Location: /?page=reserve&step=confirm");
        }
    }

    function show($id){
        $reserves = new Reserves();
        $reserve = $reserves->find($id);
        IntranetReservesView::print_show($reserve);
    }

    function edit($id){
        $reserves = new Reserves();
        $reserve = $reserves->find($id);
        IntranetReservesView::print_edit($reserve);
    }

    function update($id){
        $reserve = new Reserve();
        $this->silentSave($reserve);
        $reserve->setId($id);
        $reserves = new Reserves();
        if($reserves->update($reserve)){
            header("Location: /?page=intranet&section=reserves");
        }
        else{
            header("Location: /?page=intranet&section=reserves&action=edit&id=".$id);
        }

    }

    function delete($id){
        $reserves = new Reserves();
        if($reserves->delete($id))
            header("Location: /?page=intranet&section=reserves");
    }

    private function silentSave($reserve){
        $reserve->setStartingDate($_POST['starting_date_submit']);
        $reserve->setEndingDate($_POST['ending_date_submit']);
        $reserve->setAdultsNumber($_POST['adults_number']);
        $reserve->setChildrenNumber($_POST['children_number']);
        $reserve->setPromotionCode($_POST['promotion_code']);
        $reserve->setName($_POST['name']);
        $reserve->setSurname($_POST['surname']);
        $reserve->setEmail($_POST['email']);
        $reserve->setObservations($_POST['observations']);
        $reserve->setAddress($_POST['address']);
        $reserve->setCity($_POST['city']);
        $reserve->setPhone($_POST['phone']);
        $reserve->setCardholder($_POST['cardholder']);
        $reserve->setCardType($_POST['card_type']);
        $reserve->setCardNumber($_POST['card_number']);
        $reserve->setCardExpirationMonth($_POST['card_expiration_month']);
        $reserve->setCardExpirationYear($_POST['card_expiration_year']);
        $reserve->setCardCvc($_POST['card_cvc']);
        $reserve->setTotalAmount($_POST['total_amount']);
        
        //Obtengo la(s) habitacion(es) asociada(s) a la reserva de la petición y creo un arraylist del tipo
        //['tipo de habitacion']=>['numero de habitaciones reservadas']. Asigno este arraylist a la reserva
        $statement = 'SELECT * FROM reserves_rooms WHERE reserve_id = \''.$_POST['id'].'\'';
        $result = Db::getInstance()->query($statement);

        $list = null;
        if($result->num_rows > 0){
            $roomtypes = new Roomtypes();
            while($row = $result->fetch_assoc()){
                $roomtype = $roomtypes->find($row['roomtype_id']);
                $list[$roomtype->getName()] = $row['rooms_number'];
            }
        }

        $reserve->setReservedRooms($list);
    }

    function getRoomsAvailable($starting_date, $ending_date){
        //Obtengo todas las reservas que cumplan que su fecha de salida sea menor que mi fecha de entrada
        //y su fecha de entrada sea mayor que mi fecha de salida
        $roomtypes = new Roomtypes();
        $typesList = $roomtypes->all();
        $occupied = null;
        $available = null;

        //Para cada tipo obtengo cuantas estan ocupadas
        if($typesList != null){
            $reserves = new Reserves();
            $reservesList = $reserves->allByDate($starting_date,$ending_date);
            $rooms = new Rooms();
            //Inicializo la lista con el tipo de habitaciones a 0
            foreach($typesList as $type){
                $typename = $type->getName();
                $occupied[$typename] = 0;
                foreach ($reservesList as $reserve){
                    if (array_key_exists($typename, $reserve->getReservedRooms())) {
                        $occupied[$typename] += $reserve->getReservedRooms()[$typename];
                    }
                }
                $available[$typename] = count($rooms->getByType($type->getId())) - $occupied[$typename];
            }
        }

        return $available;
    }
}