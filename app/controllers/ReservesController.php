<?php
include_once '../app/controllers/Controller.php';
include_once '../resources/views/intranet/IntranetReservesView.php';
include_once '../app/models/Reserve.php';
include_once '../app/models/Reserves.php';

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

    }

    function show($id){

    }

    function edit($id){

    }

    function update($id){

    }

    function delete($id){

    }

    private function silent_save($reserve){

    }

    function get_rooms_available(){
        //Obtengo todas las reservas
        //Selecciono solo aquellas que cumplan que su fecha de salida sea menor que mi fecha de entrada
        //y su fecha de entrada sea mayor que mi fecha de salida
        //Obtengo las habitaciones asocidadas a cada una de las reservas y devuelvo una lista con el numero
        //de habitaciones asociadas a cada tipo que estan disponibles
    }
}