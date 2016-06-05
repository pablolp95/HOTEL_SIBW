<?php
include_once '../app/models/Promotion.php';

class IPromotionsView {
    
    public static function print_index($promotions){
        echo'
            <section>
                <div class="container">
                    <div class="row padded">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="grey-text text-darken-4">Promociones</h1>
                                    <h5 class="grey-text text-darken-1">Estas son todas las promociones del sistema ¿quieres crear una <a href="?page=intranet&section=promotions&action=create">promoción?</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <table class="responsive-table hoverable-table">
                                <thead>
                                  <tr>
                                    <th>Nombre</th>
                                    <th>Código</th>
                                    <th class="center-align">Acciones</th>
                                  </tr>
                                </thead>';
                            $i=1;
                            while($i<=count($promotions)) {
                                echo '
                                  <tr>
                                    <td>'.$promotions[$i-1]->get_name().'</td>
                                    <td>'.$promotions[$i-1]->get_code().'</td>
                                    <td class="center-align">
                                        <a class="btn-floating btn-large waves-effect waves-light deep-orange tooltipped" href="?page=intranet&section=promotions&action=edit&id='.$promotions[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Editar promoción"><i class="material-icons">edit</i></a>
                                        <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="?page=intranet&section=promotions&id='.$promotions[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Mostrar promoción"><i class="material-icons">visibility</i></a>
                                        <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" href="?page=intranet&section=promotions&action=delete&id='.$promotions[$i-1]->get_id().'" data-position="top" data-delay="50" data-tooltip="Eliminar promoción"><i class="material-icons">delete</i></a>
                                    </td>
                                  </tr>';
                                $i++;
                            }
                        echo'</table>
                        </div>
                    </div>
                </div>
            </section>';

    }
    public static function print_create()
    {
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Crear nueva promoción</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=promotions&action=store">
                                    <div class="input-field col s12 m6">
                                        <label>Nombre promoción:</label>
                                        <input class="validate" id="email" type="text" name="name" required>
                                    </div>
                                
                                    <div class="input-field col s12 m6">
                                        <label>Codigo promoción:</label>
                                        <input class="validate" type="text" name="code">
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

    public static function print_show($promotion){
        echo '
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Promoción '.$promotion->get_name().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12 m6">
                                    <p><strong>Nombre: </strong>'.$promotion->get_name().'</p>
                                    <p><strong>Código: </strong>'.$promotion->get_code().'</p>
                                    <p><strong>Descripción: </strong>'.$promotion->get_description().'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_edit($promotion){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editando promoción: '.$promotion->get_name().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <!-- Email field -->
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=promotions&action=update&id='.$promotion->get_id().'" ">
                                    <div class="input-field col s12 m6">
                                        <label>Nombre:</label>
                                        <input class="validate" id="email" type="text" name="name1" value="'.$promotion->get_name().'"required>
                                    </div>
                                
                                    <!-- Status field -->
                                    <div class="input-field col s12 m6">
                                        <label>Codigo promoción:</label>
                                        <input class="validate" type="text"  name="code1"  value="'.$promotion->get_code().'">
                                    </div>
                                
                                    <!-- Name field -->
                                    <div class="input-field col s12 m12">
                                        <label>Descripción:</label>
                                        <textarea class="materialize-textarea" type="text" name="description1">'.$promotion->get_description().'</textarea>
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
