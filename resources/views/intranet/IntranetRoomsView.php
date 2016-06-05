<?php
include_once '../app/models/Room.php';
class IRoomsView {

    public static function print_index($rooms){
        echo'
            <section>
                <div class="container">
                    <div class="row padded">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="grey-text text-darken-4">Habitaciones</h1>
                                    <h5 class="grey-text text-darken-1">Estas son todas las habitaciones del sistema ¿quieres crear una <a href="?page=intranet&section=rooms&action=create">habitación?</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <table class="responsive-table hoverable-table">
                                <thead>
                                    <tr>
                                        <th>Numero habitación</th>
                                        <th>Tipo</th>
                                        <th class="center-align">Acciones</th>
                                    </tr>
                                </thead>';
                                $i=1;
                                while($i<=count($rooms)) {
                                    echo'
                                      <tr>
                                        <td>'.$rooms[$i-1]->get_number().'</td>
                                        <td>'.$rooms[$i-1]->get_type().'</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange tooltipped" href="?page=intranet&section=rooms&action=edit&id='.$rooms[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Editar habitación"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="?page=intranet&section=rooms&id='.$rooms[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Mostrar habitación"><i class="material-icons">visibility</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" href="?page=intranet&section=rooms&action=delete&id='.$rooms[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Eliminar habitación"><i class="material-icons">delete</i></a>
                                        </td>
                                      </tr>';
                                    $i++;
                                }
                        echo'
                            </table>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_create(){
        $roomtypes = new Roomtypes();//Objeto contendor de tipos de habitaciones
        $roomtype_list = $roomtypes->all();
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Crear nueva habitación</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <!-- Email field -->
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=rooms&action=store" ">
                                     <div class="col s12 m6">
                                        <label>Tipo de habitación </label>
                                        <select name="select">';
                                        foreach($roomtype_list as $roomstype){
                                            echo '<option value="'.$roomstype->getId().'">'.$roomstype->getName().'</option>';
                                        }
                                        echo'
                                        </select>
                                    </div>
                                    <!-- Name field -->
                                    <div class="input-field col s12 m6">
                                        <label>Numero de habitación</label>
                                        <input class="validate" type="number" name="number_room">
                                    </div>
                                    <div class="col s12">
                                        <button type="submit" class="btn waves-effect waves-light right indigo">Guardar</button>
                                    </div>
                                    <div class="col s12">
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_room($room){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Habitacion número '.$room->get_number().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12 m6">
                                    <p><strong>Tipo:</strong> '.$room->get_type().'</p>
                                    <p><strong>Número habitación:</strong> '.$room->get_number().'</p>
                                    <p><strong>Reserva asignada en la habitación:</strong> '.$room->get_reserve_associated().'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_edit($room){
        $roomtypes = new Roomtypes();//Objeto contendor de tipos de habitaciones
        $roomtype_list = $roomtypes->all();

        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editar habitación número '.$room->get_number().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                 <form  role="form" name="myForm" method="POST" action="?page=intranet&section=rooms&action=update&id='.$room->get_id().'">
                                    <div class="col s12 m6">
                                        <label>Tipo de habitación </label>
                                        <select name="select" required>';
                                        foreach($roomtype_list as $roomstype){
                                            echo '<option value="'.$roomstype->getId().'"';
                                            if($room->get_type() == $roomstype->getName()){
                                                echo 'selected';
                                            }
                                            echo'>'.$roomstype->getName().'</option>';
                                        }
                                        echo'</select>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Numero de habitación</label>
                                        <input class="validate" type="number" value="'.$room->get_number().'" name="number_room" min=1>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Asignar reserva a la habitación:</label>
                                        <input class="validate" type="number" value="'.$room->get_reserve_associated().'" name="reserve_associated" min=1>
                                    </div>
                                    <div class="col s12">
                                        <button type="submit" class="btn waves-effect waves-light right indigo">Guardar</button>
                                    </div>
                                    <div class="col s12">
                                            <div class="clearfix"></div>
                                    </div>
                                 </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }
}
?>