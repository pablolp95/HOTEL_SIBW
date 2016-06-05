<?php
include_once '../app/models/Roomtype.php';
class IntranetRoomtypesView {

    public static function print_index($roomtypes){
        echo'
            <section>
                <div class="container">
                    <div class="row padded">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="grey-text text-darken-4">Tipos de habitaciones</h1>
                                    <h5 class="grey-text text-darken-1">Estos son todos los  tipos de habitaciones del sistema ¿quieres crear un <a href="?page=intranet&section=roomtypes&action=create">tipo nuevo?</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <table class="responsive-table hoverable-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th class="center-align">Acciones</th>
                                    </tr>
                                </thead>';
                                $i=1;
                                while($i<=count($roomtypes)) {
                                    echo'
                                      <tr>
                                        <td>'.$roomtypes[$i-1]->getId().'</td>
                                        <td>'.$roomtypes[$i-1]->getName().'</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange tooltipped" href="?page=intranet&section=roomtypes&action=edit&id='.$roomtypes[$i-1]->getId().'" data-position="top" data-delay="50" data-tooltip="Editar tipo"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="?page=intranet&section=roomtypes&id='.$roomtypes[$i-1]->getId().'" data-position="top" data-delay="50" data-tooltip="Mostrar tipo"><i class="material-icons">visibility</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" href="?page=intranet&section=roomtypes&action=delete&id='.$roomtypes[$i-1]->getId().'" data-position="top" data-delay="50" data-tooltip="Eliminar tipo"><i class="material-icons">delete</i></a>
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
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=roomtypes&action=store" ">
                                    <div class="input-field col s12 m6">
                                        <label>Nombre del tipo:</label>
                                        <input class="validate" id="name" type="text" name="name" required>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Precio base:</label>
                                        <input class="validate" id="base_price" type="text" name="base_price" required>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <label>Descripción:</label>
                                        <textarea class="materialize-textarea" type="text" name="description"></textarea>
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

    public static function print_show($roomtype){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Tipo de habitación: '.$roomtype->getName().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12 m6">
                                    <p>Nombre: '.$roomtype->getName().'</p>
                                    <p>Precio base: '.$roomtype->getBasePrice().'</p>
                                    <p>Descripción: '.$roomtype->getDescription().'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_edit($roomtype){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editando tipo de habitación: '.$roomtype->getName().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                 <form  role="form" name="myForm" method="POST" action="?page=intranet&section=roomtypes&action=update&id='.$roomtype->getId().'">
                                    <div class="input-field col s12 m6">
                                        <label>Nombre del tipo:</label>
                                        <input class="validate" id="name" type="text" name="name" value="'.$roomtype->getName().'"required>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Precio base:</label>
                                        <input class="validate" id="base_price" type="text" name="base_price" value="'.$roomtype->getBasePrice().'"required>
                                    </div>
                                    <div class="input-field col s12 m12">
                                        <label>Descripción:</label>
                                        <textarea class="materialize-textarea" type="text" name="description">'.$roomtype->getDescription().'</textarea>
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