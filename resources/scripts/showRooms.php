<?php
include_once "../app/models/Reserve.php";
include_once "../app/models/Reserves.php";
include_once '../app/models/Roomtype.php';
include_once '../app/models/Roomtypes.php';


$starting_date=$_GET['start'];
$ending_date=$_GET['end'];
$adult=$_GET['adult'];
$reserves = new ReservesController();
$availables = $reserves->getRoomsAvailable($starting_date,$ending_date);//Obtengo para cada tipo el número de habitaciones disponibles
$roomtypes = new Roomtypes();//Objeto contendor de tipos de habitaciones
$roomtype_list = array();//Esta variable almaenara los tipos de habitaciones
//Para cada tipo de habitacion obtengo su objeto para manejar la información relacionada a ella
while($element = current($availables)) {
    $roomtype = $roomtypes->findByName(key($availables));
    array_push($roomtype_list,$roomtype);
    next($availables);
}
$available = false;
foreach ($availables as $type=>$number){
    if($number > 0){
        $available = true;
    }
}

if($available) {
    echo '<div class="panel panel-default">
                                <table class="table table-roomtypes">
                                    <thead>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                             foreach ($roomtype_list as $roomtype) {
                               if ($availables[$roomtype->getName()] > 0) {
                                   if($adult==1 && $roomtype->getName()=="Individual"){
                                       echo '
                                            <tr>
                                                <td>' . $roomtype->getName() . '</td>
                                                <td id="price_' . $roomtype->getName() . '">' . $roomtype->getBasePrice() . '</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_' . $roomtype->getName() . '" name="select_' . $roomtype->getName() . '">';
                                       echo '<option value="0">0</option>';
                                       for ($i = 1; $i <= $availables[$roomtype->getName()]; $i++) {
                                           echo '<option value="' . $i . '">' . $i . '</option>';
                                       }
                                       echo '
                                                    </select>
                                                </td>
                                            </tr>';
                                   }
                                   else if($adult==2 && ($roomtype->getName()=="Individual" || $roomtype->getName()=="Doble")){
                                       echo '
                                            <tr>
                                                <td>' . $roomtype->getName() . '</td>
                                                <td id="price_' . $roomtype->getName() . '">' . $roomtype->getBasePrice() . '</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_' . $roomtype->getName() . '" name="select_' . $roomtype->getName() . '">';
                                       echo '<option value="0">0</option>';
                                       for ($i = 1; $i <= $availables[$roomtype->getName()]; $i++) {
                                           echo '<option value="' . $i . '">' . $i . '</option>';
                                       }
                                       echo '
                                                    </select>
                                                </td>
                                            </tr>';
                                   }
                                   else if($adult==3 && ($roomtype->getName()=="Individual" || $roomtype->getName()=="Doble" || $roomtype->getName()=="Triple")){
                                       echo '
                                            <tr>
                                                <td>' . $roomtype->getName() . '</td>
                                                <td id="price_' . $roomtype->getName() . '">' . $roomtype->getBasePrice() . '</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_' . $roomtype->getName() . '" name="select_' . $roomtype->getName() . '">';
                                       echo '<option value="0">0</option>';
                                       for ($i = 1; $i <= $availables[$roomtype->getName()]; $i++) {
                                           echo '<option value="' . $i . '">' . $i . '</option>';
                                       }
                                       echo '
                                                    </select>
                                                </td>
                                            </tr>';
                                   }
                                   else if($adult>3){
                                       echo '
                                            <tr>
                                                <td>' . $roomtype->getName() . '</td>
                                                <td id="price_' . $roomtype->getName() . '">' . $roomtype->getBasePrice() . '</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_' . $roomtype->getName() . '" name="select_' . $roomtype->getName() . '">';
                                       echo '<option value="0">0</option>';
                                       for ($i = 1; $i <= $availables[$roomtype->getName()]; $i++) {
                                           echo '<option value="' . $i . '">' . $i . '</option>';
                                       }
                                       echo '
                                                    </select>
                                                </td>
                                            </tr>';
                                   }

        }
    }
    echo '
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row next">
                            <div class="col-sm-2 nopadding">
                                <p>TOTAL: <span id="total_amount">0</span>€</p>
                                <input type="hidden" id="total_amount_submit" name="total_amount_submit">
                            </div>
                            <div class="col-sm-offset-8 col-sm-2">
                                <button class="button btn-lg" style="text-align: center">Siguiente</button>
                            </div>
                        </div>';
}
else{
    echo '
                    <div class="row">
                        <div class="col-sm-12 noroom-message text-center">
                            <h3>Lo sentimos, no tenemos habitaciones disponibles para estas fechas.</h3>
                        </div>
                    </div>';
}
?>