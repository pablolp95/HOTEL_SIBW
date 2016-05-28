<?php
include_once '../app/models/User.php';

class UsersView {
    public static function print_index($users){

        echo"<div class=\"container\">
        <div class=\"row padded\">
            <div class=\"col s12\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h1 class=\"grey-text text-darken-4\">Lista de Usuarios</h1>
                        <h5 class=\"grey-text text-darken-1\">Estos son todos los usuarios del sistema ¿quieres crear un <a href='?page=intranet&section=users&action=create'>Usuario?</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <nav>
                    <div class=\"nav-wrapper\">
                    </div>
                </nav>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <table class=\"responsive-table hoverable-table\">";
        echo"
  <tr>
    <th>Nombre</th>
    <th>Email</th>
    <th>Contraseña</th>
    <th class=\"center-align\">Acciones</th>
  </tr>
  ";
        $i=1;
        while($i<=count($users)) {

            echo "
  <tr>
    <td>{$users[$i-1]->get_name()}</td>
    <td>{$users[$i-1]->get_email()}</td>
    <td>{$users[$i-1]->get_password()}</td>
    <td class=\"center-align\">
                <a class=\"btn-floating btn-large waves-effect waves-light deep-orange\" href='?page=intranet&section=users&action=edit&id={$users[$i-1]->get_id()}'><i class=\"material-icons\">create</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light red\" href='?page=intranet&section=users&id={$users[$i-1]->get_id()}'><i class=\"material-icons\">visibility</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light blue\" href='?page=intranet&section=users&action=delete&id={$users[$i-1]->get_id()}'><i class=\"material-icons\">delete</i></a>

            </td>
  </tr>";
            $i++;
        }
        echo"</table>
            </div>
        </div>
        <div class=\"col s12\">
            <div class=\"container-fluid\">

            </div>
        </div>
    </div>";

    }
    public static function print_create(){
        echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Crear nuevo usuario</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm\" method=\"POST\" action='?page=intranet&section=users&action=store' '>
   <div class=\"input-field col s12 m6\">
        <input class='validate' id='email' type='email' name='email1' placeholder='Email del usuario' required>
    </div>

    <!-- Status field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='text'  name='password1' placeholder='Contraseña del usuario'>
    </div>

    <!-- Name field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='text' name='name1' placeholder='Nombre'>
    </div>

     <!-- Role dropdown select
    <div class=\"col s12 m6\">
        <label>Rol de Usuario</label>
        <select class='browser-default' name='select'>
            <option value='Recepcionista'>Recepcionista</option>
            <option value='admin'>Administrador</option>
        </select>

    </div>
 -->
    <div class=\"col s12\">
              <button type='submit' class='btn waves-effect waves-light right indigo'>Guardar</button>
    </div>
    <div class=\"col s12\">
        <div class=\"clearfix\"></div>
    </div>
</div>
</form>
            </div>
        </div>
    </div>
";
    }

    public static function print_show($user){
        echo " <div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\"><strong>Usuario</strong> {$user->get_name()}</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
        <div class=\"col s12 m6\">
            <p><strong>Nombre:</strong> {$user->get_name()}</p>
            <p><strong>Email:</strong> {$user->get_email()}</p>
            <p><strong>Contraseña:</strong> {$user->get_password()}</p>
        </div>
    </div>
            </div>
        </div>
    </div>";
    }

    public static function print_edit($user){
        echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Editar usuario</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm2\" method=\"POST\" action='?page=intranet&section=users&action=update&id={$user->get_id()}'>
   <div class=\"input-field col s12 m6\">
        <input class='validate' type='email' name='email2' value='{$user->get_email()}' placeholder='Email del usuario'>
    </div>

    <!-- Status field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='password' name='password2' value='{$user->get_password()}' placeholder='Contraseña del usuario'>
    </div>

    <!-- Name field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='text' name='name2' value='{$user->get_name()}' placeholder='Nombre'>
    </div>

     <!-- Role dropdown select -->
    <div class=\"col s12 m6\">
        <label>Rol de Usuario</label>
        <select class='browser-default' name='select'>
            <option value='Recepcionista'>Recepcionista</option>
            <option value='admin'>Administrador</option>
        </select>

    </div>

    <div class=\"col s12\">
              <button type='submit' class='btn waves-effect waves-light right indigo'>Guardar</button>
    </div>
    <div class=\"col s12\">
        <div class=\"clearfix\"></div>
    </div>
</div>
</form>
            </div>
        </div>
    </div>
";
    }
}