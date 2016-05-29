<?php
include_once '../app/models/User.php';

class UsersView {
    
    public static function print_index($users){
        echo'
            <section>
                <div class="container">
                    <div class="row padded">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12">
                                    <h1 class="grey-text text-darken-4">Usuarios</h1>
                                    <h5 class="grey-text text-darken-1">Estos son todos los usuarios del sistema ¿quieres crear un <a href="?page=intranet&section=users&action=create">usuario?</a></h5>
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
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th class="center-align">Acciones</th>
                                  </tr>
                                </thead>';
                                $i=1;
                                while($i<=count($users)) {
                                    echo'
                                      <tr>
                                        <td>'.$users[$i-1]->get_name().'</td>
                                        <td>'.$users[$i-1]->get_email().'</td>
                                        <td>rol</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange" href="?page=intranet&section=users&action=edit&id='.$users[$i-1]->get_id().'"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red" href="?page=intranet&section=users&id='.$users[$i-1]->get_id().'"><i class="material-icons">visibility</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light blue" href="?page=intranet&section=users&action=delete&id='.$users[$i-1]->get_id().'"><i class="material-icons">delete</i></a>
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
    
    public static function print_create(){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Crear nuevo usuario</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=users&action=store" ">
                                    <div class="input-field col s12 m6">
                                        <label>Email:</label>
                                        <input class="validate" id="email" type="email" name="email1" required>
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Contraseña</label>
                                        <input class="validate" type="text"  name="password1">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <label>Nombre</label>
                                        <input class="validate" type="text" name="name1">
                                    </div>
                                    <!--Role dropdown select-->
                                    <div class="col s12 m6">
                                        <label>Rol de Usuario</label>
                                        <select class="browser-default" name="select">
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="admin">Administrador</option>
                                        </select>
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

    public static function print_show($user){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Usuario '.$user->get_name().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="col s12 m6">
                                    <p><strong>Nombre:</strong> '.$user->get_name().'</p>
                                    <p><strong>Email:</strong> '.$user->get_email().'</p>
                                    <p><strong>Contraseña:</strong> '.$user->get_password().'</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>';
    }

    public static function print_edit($user){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editando al usuario '.$user->get_name().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <!-- Email field -->
                                <form  role="form" name="myForm2" method="POST" action="?page=intranet&section=users&action=update&id='.$user->get_id().'">
                                    <div class="input-field col s12 m6">
                                        <label>Email:</label>
                                        <input class="validate" type="email" name="email2" value="'.$user->get_email().'" required>
                                    </div>
                                    <!-- Status field -->
                                    <div class="input-field col s12 m6">
                                        <label>Contraseña:</label>
                                        <input class="validate" type="password" name="password2" required>
                                    </div>
                                    <!-- Name field -->
                                    <div class="input-field col s12 m6">
                                        <label>Nombre:</label>
                                        <input class="validate" type="text" name="name2" value="'.$user->get_name().'">
                                    </div>
                                
                                     <!-- Role dropdown select -->
                                    <div class="col s12 m6">
                                        <label>Rol de Usuario</label>
                                        <select class="browser-default" name="select">
                                            <option value="Recepcionista">Recepcionista</option>
                                            <option value="admin">Administrador</option>
                                        </select>
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