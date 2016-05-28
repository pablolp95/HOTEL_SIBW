<?php
include_once '../app/models/Reserve.php';
include_once '../app/models/Reserves.php';

class IntranetReservesView{
    static function print_index($reserves){
        echo '
            <section>
                <div class="container">
                    <div class="row padded">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="grey-text text-darken-4">Reservas</h1>
                                    <h5 class="grey-text text-darken-1">Estas son todas las reservas, ¿quieres realizar una <a href="?page=intranet&section=reserves&action=create">nueva reserva</a>?</h5>
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
                                        <th>Apellido</th>
                                        <th>Fecha entrada</th>
                                        <th>Fecha salida</th>
                                        <th class="center-align">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>';
                                foreach($reserves as $reserve) {
                                    echo '<tr>
                                        <td>'.$reserve->id.'</td>
                                        <td>'.$reserve->name.'</td>
                                        <td>'.$reserve->surname.'</td>
                                        <td>'.$reserve->starting_date.'</td>
                                        <td>'.$reserve->ending_date.'</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange" href="?page=intranet&section=reserves&id='.$reserve->id.'&action=edit"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red" href="?page=intranet&section=reserves&id='.$reserve->id.'"><i class="material-icons">visibility</i></a>
                                        </td>
                                    </tr>';
                                }
                                echo'
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        ';
    }

    static function print_create(){
        echo '
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Realizar una reserva</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <form method="POST" action="?page=intranet&section=reserves&action=store" accept-charset="UTF-8">                            
                                <div class="row">
                                    <!-- Name field -->
                                    <div class="input-field col s12 m6">
                                        {!! Form::text("name", null, ["id" => "name","class" => "validate"]) !!}
                                        {!! Form::label("name", "Nombre de producto:*") !!}
                                    </div>
                                
                                    <!-- Price field -->
                                    <div class="input-field col s12 m6">
                                        {!! Form::text("price", null, ["id" => "price","class" => "validate"]) !!}
                                        {!! Form::label("price", "Precio:*") !!}
                                    </div>
                                
                                    <!-- Description field -->
                                    <div class="input-field col s12">
                                        {!! Form::textarea("description", null, ["id" => "description","class" => "materialize-textarea"]) !!}
                                        {!! Form::label("description", "Descripción de producto") !!}
                                    </div>
                                
                                    <!-- IMG_URL field -->
                                    <div class="input-field col s12 m6">
                                        {!! Form::text("img_url", null, ["id" => "img_url","class" => "validate"]) !!}
                                        {!! Form::label("img_url", "URL de imagen:") !!}
                                    </div>
                                
                                    <!-- DEvelopment Time field -->
                                    <div class="input-field col s12 m6">
                                        {!! Form::text("development_time", null, ["id" => "development_time","class" => "validate"]) !!}
                                        {!! Form::label("development_time", "Tiempo de desarrollo:") !!}
                                    </div>
                                
                                    <!-- Status field -->
                                    <div class="input-field col s12">
                                        {!! Form::text("status", null, ["id" => "status","class" => "validate"]) !!}
                                        {!! Form::label("status", "Estado del producto:") !!}
                                    </div>
                                    
                                    <div class="col s12">
                                        {!! Form::button("Guardar", ["type" => "submit", "class" => "btn waves-effect waves-light right indigo"]) !!}
                                    </div>
                                
                                    <div class="col s12">
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        ';
    }

    static function print_show($reserve){

    }

    static function print_edit($reserve){

    }
}