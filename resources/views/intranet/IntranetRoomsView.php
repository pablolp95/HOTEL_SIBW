<?php
include_once '../app/models/Room.php';

class RoomsView {
    public static function print_create(){
        echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Crear nueva habitación</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm\" method=\"POST\" action='?page=intranet&section=rooms&action=store' '>
   <div class=\"col s12 m6\">
        <label>Tipo de habitación </label>
        <select class='browser-default' name='select'>
            <option value='1'>Doble</option>
            <option value='2'>Triple</option>
            <option value='3'>Familiar</option>
        </select>

    </div>
    <!-- Name field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='number' name='number_room' min=5 placeholder='Numero de habitación'>
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

    public static function print_index($rooms){
        echo"<div class=\"container\">
        <div class=\"row padded\">
            <div class=\"col s12\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h1 class=\"grey-text text-darken-4\">Lista de habitaciones</h1>
                        <h5 class=\"grey-text text-darken-1\">Estos son todos los habitaciones del sistema ¿quieres crear una <a href='?page=intranet&section=rooms&action=create'>habitación?</a></h5>
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
    <th>Tipo</th>
    <th>Numero habitación</th>
    <th class=\"center-align\">Acciones</th>
  </tr>
  ";
        $i=1;
        while($i<=count($rooms)) {

            echo "
  <tr>
    <td>{$rooms[$i-1]->get_type()}</td>
    <td>{$rooms[$i-1]->get_number()}</td>
    <td class=\"center-align\">
                <a class=\"btn-floating btn-large waves-effect waves-light deep-orange\" href='?page=intranet&section=rooms&action=edit&id={$rooms[$i-1]->get_id()}'><i class=\"material-icons\">create</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light red\" href='?page=intranet&section=rooms&id={$rooms[$i-1]->get_id()}'><i class=\"material-icons\">visibility</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light blue\" href='?page=intranet&section=rooms&action=delete&id={$rooms[$i-1]->get_id()}'><i class=\"material-icons\">delete</i></a>

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
    public static function print_room($room){
        echo " <div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\"><strong>Habitacion</strong> {$room->get_type()}</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
        <div class=\"col s12 m6\">
            <p><strong>Nombre:</strong> {$room->get_type()}</p>
            <p><strong>Numero habitación:</strong> {$room->get_number()}</p>
        </div>
    </div>
            </div>
        </div>
    </div>";
    }

    public static function print_edit($room){
        if($room->get_type()=='Doble'){
            $val=1;
        }
        else if($room->get_type()=='Triple'){
            $val=2;
        }
        else
            $val=3;

        echo $val;

        echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Editar habitación</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm\" method=\"POST\" action='?page=intranet&section=rooms&action=update&id={$room->get_id()}'>
   <div class=\"col s12 m6\">
        <label>Tipo de habitación </label>
        <select class='browser-default' name='select1' required>
            <option></option>
            <option value='1'";if($val==1){echo "selected";}echo">Doble</option>
            <option value='2'";if($val==2){echo "selected";}echo">Triple</option>
            <option value='3'";if($val==3){echo "selected";}echo">Familiar</option>
        </select>

    </div>
    <!-- Name field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='number' value='{$room->get_number()}' name='number_room1' min=5 placeholder='Numero de habitación'>
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
?>