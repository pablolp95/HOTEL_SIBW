<?php
include_once '../app/models/Promotion.php';

class IPromotionsView {
    public static function print_index($promotions){

        echo"<div class=\"container\">
        <div class=\"row padded\">
            <div class=\"col s12\">
                <div class=\"row\">
                    <div class=\"col s12\">
                        <h1 class=\"grey-text text-darken-4\">Lista de promociones</h1>
                        <h5 class=\"grey-text text-darken-1\">Estas son todas las promociones del sistema ¿quieres crear una <a href='?page=intranet&section=promotions&action=create'>Promoción?</a></h5>
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
    <th>Code</th>
    <th>Descripción</th>
    <th class=\"center-align\">Acciones</th>
  </tr>
  ";
        $i=1;
        while($i<=count($promotions)) {

            echo "
  <tr>
    <td>{$promotions[$i-1]->get_name()}</td>
    <td>{$promotions[$i-1]->get_code()}</td>
    <td>{$promotions[$i-1]->get_description()}</td>
    <td class=\"center-align\">
                <a class=\"btn-floating btn-large waves-effect waves-light deep-orange\" href='?page=intranet&section=promotions&action=edit&id={$promotions[$i-1]->get_id()}'><i class=\"material-icons\">create</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light red\" href='?page=intranet&section=promotions&id={$promotions[$i-1]->get_id()}'><i class=\"material-icons\">visibility</i></a>
                <a class=\"btn-floating btn-large waves-effect waves-light blue\" href='?page=intranet&section=promotions&action=delete&id={$promotions[$i-1]->get_id()}'><i class=\"material-icons\">delete</i></a>

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
    public static function print_create()
    {
       echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Crear nueva promoción</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm\" method=\"POST\" action='?page=intranet&section=promotions&action=store'>
   <div class=\"input-field col s12 m6\">
        <input class='validate' id='email' type='text' name='name' placeholder='Nombre promoción' required>
    </div>

    <!-- Status field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='text'  name='code' placeholder='Codigo promoción'>
    </div>

    <!-- Name field -->
    <div class=\"input-field col s12 m12\">
        <input class='validate' type='text' name='description' placeholder='Descripción'>
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

    public static function print_show($promotion){
        echo " <div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\"><strong>Promoción </strong> {$promotion->get_name()}</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
        <div class=\"col s12 m6\">
            <p><strong>Nombre:</strong> {$promotion->get_name()}</p>
            <p><strong>Código:</strong> {$promotion->get_code()}</p>
            <p><strong>Descripción:</strong> {$promotion->get_description()}</p>
        </div>
    </div>
            </div>
        </div>
    </div>";
    }

    public static function print_edit($promotion){
        echo"<div class=\"container padded\">
        <div class=\"row\">
            <div class=\"col s12\">
                <h1 class=\"grey-text text-darken-3\">Crear nueva promoción</h1>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col s12\">
                <div class=\"row\">
    <!-- Email field -->
    <form  role=\"form\" name=\"myForm\" method=\"POST\" action='?page=intranet&section=promotions&action=update&id={$promotion->get_id()}' '>
   <div class=\"input-field col s12 m6\">
        <input class='validate' id='email' type='text' name='name1' value='{$promotion->get_name()}' placeholder='Nombre promoción' required>
    </div>

    <!-- Status field -->
    <div class=\"input-field col s12 m6\">
        <input class='validate' type='text'  name='code1'  value='{$promotion->get_code()}' placeholder='Codigo promoción'>
    </div>

    <!-- Name field -->
    <div class=\"input-field col s12 m12\">
        <input class='validate' type='text' name='description1'  value='{$promotion->get_description()}' placeholder='Descripción'>
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
