<?php
include_once '../app/models/Reserve.php';
include_once '../app/models/Reserves.php';
include_once '../app/models/Room.php';
include_once '../app/models/Rooms.php';
include_once '../app/models/Roomtypes.php';

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
                            <nav>
                                <div class="nav-wrapper">
                                    <form id="search-form">
                                        <div class="input-field">
                                            <input class="index-search-bar indigo white-text" id="search" name="search" onkeyup="showReserves(this.value)" type="search" required placeholder="Buscar...">
                                            <label for="search"><i class="material-icons white-text">search</i></label>
                                        </div>
                                    <form>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12" id="reserveslist">
                            <table class="responsive-table hoverable-table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>DNI</th>
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
                                        <td>'.$reserve->getId().'</td>
                                        <td>'.$reserve->getDni().'</td>
                                        <td>'.$reserve->getName().'</td>
                                        <td>'.$reserve->getSurname().'</td>
                                        <td>'.$reserve->getStartingDate().'</td>
                                        <td>'.$reserve->getEndingDate().'</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange tooltipped" href="?page=intranet&section=reserves&id='.$reserve->getId().'&action=edit" data-position="top" data-delay="50" data-tooltip="Editar reserva"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="?page=intranet&section=reserves&id='.$reserve->getId().'" data-position="top" data-delay="50" data-tooltip="Mostrar reserva"><i class="material-icons">visibility</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" href="?page=intranet&section=reserves&action=delete&id='.$reserve->getId().'" data-position="top" data-delay="50" data-tooltip="Cancelar reserva"><i class="material-icons">delete</i></a>
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
        $isset = false;
        if(isset($_POST['starting_date_submit'],$_POST['ending_date_submit'])){
            $_SESSION['starting_date'] = $_POST['starting_date_submit'];
            $_SESSION['ending_date'] = $_POST['ending_date_submit'];
            $isset = true;
        }
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Realizar una reserva</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=create">
                                    <div class="input-field col s12 m4">
                                        <label for="starting_date">Entrada:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="starting_date" name="starting_date" value="'.$_SESSION['starting_date'].'" required>
                                    </div>
                                    <div class="input-field col s12 m4">
                                        <label for="ending_date">Salida:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="ending_date" name="ending_date" value="'.$_SESSION['ending_date'].'" required>
                                    </div>
                                    <div class="input-field col s12 m4">
                                        <button class="btn waves-effect waves-light right indigo" style="text-align: center">Comprobar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
        if($isset){
            $reserves = new ReservesController();
            $availables = $reserves->getRoomsAvailable($_POST['starting_date_submit'],$_POST['ending_date_submit']);//Obtengo para cada tipo el número de habitaciones disponibles
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
            if($available){
                echo'
                <div class="row">    
                    <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=store">
                        <div class="row table-room">
                            <div class="panel panel-default">
                                <table class="table table-roomtypes"> 
                                    <thead> 
                                        <tr> 
                                            <th>Tipo</th> 
                                            <th>Precio</th> 
                                            <th>Cantidad</th> 
                                        </tr> 
                                    </thead> 
                                    <tbody>';
                                    foreach ($roomtype_list as $roomtype){
                                        if($availables[$roomtype->getName()] > 0){
                                        echo '
                                            <tr> 
                                                <td>'.$roomtype->getName().'</td> 
                                                <td id="price_'.$roomtype->getName().'">'.$roomtype->getBasePrice().'</td>
                                                <td>
                                                    <select id="select_'.$roomtype->getName().'" name="select_'.$roomtype->getName().'">';
                                                        echo '<option value="0">0</option>';
                                                    for($i=1;$i<=$availables[$roomtype->getName()];$i++){
                                                        echo '<option value="'.$i.'">'.$i.'</option>';
                                                        }
                                                    echo'
                                                    </select>
                                                </td>
                                            </tr>';
                                        }
                                    }
                                echo'
                                    </tbody>
                                </table>
                            </div>
                        </div><!--Fin row table-room-->
                        <input name="starting_date" type="hidden" value="'.$_SESSION['starting_date'].'">
                        <input name="ending_date" type="hidden" value="'.$_SESSION['ending_date'].'">
                        <div class="row next">
                            <div class="col-sm-2 nopadding">
                                <p>TOTAL: <span id="total_amount">0</span>€</p>
                                <input type="hidden" id="total_amount_submit" name="total_amount_submit">
                            </div>
                        </div>
                                
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <select name="adults_number">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label>Número de adultos:*</label>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <select name="children_number">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                                <label>Número de niños:*</label>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Nombre:*</label>
                                <input class="validate" type="text" name="name" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Apellidos:*</label>
                                <input class="validate" type="text" name="surname" required>
                            </div>
                            
                            <div class="input-field col s12 m6">
                                <label>DNI:*</label>
                                <input class="validate" type="text" name="dni" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Email:*</label>
                                <input class="validate" type="text" name="email" required>
                            </div>
                                    
                            <div class="input-field col s12 m12">
                                <label>Observaciones:</label>
                                <textarea class="materialize-textarea" type="text" name="observations"></textarea>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Dirección:*</label>
                                <input class="validate" type="text" name="address" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Ciudad:*</label>
                                <input class="validate" type="text" name="city" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Teléfono:*</label>
                                <input class="validate" type="text" name="phone" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Titular de la tarjeta:*</label>
                                <input class="validate" type="text" name="cardholder" required>
                            </div>
                                   
                            <div class="input-field col s12 m6">
                                <label>Número de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_number" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <select type="text" id="card_type" name="card_type">
                                    <option value="VISA">VISA</option>
                                    <option value="MasterCard">MasterCard</option>
                                    <option value="AmericanExpress">American Express</option>
                                </select>
                                <label>Tipo de tarjeta:*</label>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <select name="card_expiration_month" >
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <label for="card_expiration_month">Mes de caducidad de la tarjeta:*</label>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <select id="card_expiration_year" name="card_expiration_year" >
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                </select>
                                <label for="card_expiration_year">Año de caducidad de la tarjeta:*</label>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>CVC de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_cvc" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Código de promoción:</label>
                                <input class="validate" type="text" name="promotion_code">
                            </div>
                                    
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light right indigo">Guardar</button>
                            </div>
                                    
                            <div class="col s12">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>';
            }
        }
        echo'
                </div>
            </section>';
    }

    static function print_show($reserve){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Reserva #'.$reserve->getId().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <p><strong>Fecha de entrada:</strong> '.$reserve->getStartingDate().'</p>
                            <p><strong>Fecha de salida:</strong> '.$reserve->getEndingDate().'</p>
                            <p><strong>Número de adultos:</strong> '.$reserve->getAdultsNumber().'</p>
                            <p><strong>Número de niños:</strong> '.$reserve->getChildrenNumber().'</p>
                        </div>
                        <div class="col m6">
                            <p><strong>Nombre:</strong> '.$reserve->getName().'</p>
                            <p><strong>Apellidos:</strong> '.$reserve->getSurname().'</p>
                            <p><strong>Ciudad:</strong> '.$reserve->getCity().'</p>
                            <p><strong>Dirección:</strong> '.$reserve->getAddress().'</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <p><strong>DNI:</strong> '.$reserve->getDni().'</p>
                            <p><strong>Teléfono:</strong> '.$reserve->getPhone().'</p>
                            <p><strong>Email:</strong> '.$reserve->getEmail().'</p>
                            <p><strong>Titular de la tarjeta:</strong> '.$reserve->getCardholder().'</p>
                        </div>
                        <div class="col s12 m6">
                            <p><strong>Tipo de tarjeta:</strong> '.$reserve->getCardType().'</p>
                            <p><strong>Mes de caducidad de la tarjeta:</strong> '.$reserve->getCardExpirationMonth().'</p>
                            <p><strong>Año de caducidad de la tarjeta:</strong> '.$reserve->getCardExpirationYear().'</p>
                            <p><strong>CVC de la tarjeta:</strong> '.$reserve->getCardCvc().'</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <div class="card indigo darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">Habitaciones reservadas:</span>
                                </div>
                                <div class="card-action indigo lighten-5 indigo-text">
                                    <div class="row ">
                                        <div class="col s12">';
                                            foreach($reserve->getReservedRooms() as $roomtype => $num) {
                                                echo '<p style="font-size: 1.5em">'.$roomtype.': '.$num.'</p>';
                                            }
                                        echo'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s6">
                            <div class="card indigo darken-1">
                                <div class="card-content white-text">
                                    <span class="card-title">Habitaciones asignadas:</span>
                                </div>
                                <div class="card-action indigo lighten-5 indigo-text">
                                    <div class="row ">
                                        <div class="col s12">';
                                            foreach($reserve->getAssignedRooms() as $roomtype => $num) {
                                                echo '<p style="font-size: 1.5em">Número de habitación: '.$num.'</p>';
                                            }
                                    echo'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <p style="font-size: 2em">TOTAL: '.$reserve->getTotalAmount().' €</p>
                        </div>
                    </div>
                </div>
            </section>';
    }

    static function print_edit($reserve){
        $isset = false;
        if(isset($_POST['starting_date_submit'],$_POST['ending_date_submit'])){
            $_SESSION['starting_date'] = $_POST['starting_date_submit'];
            $_SESSION['ending_date'] = $_POST['ending_date_submit'];
            $starting_date = $_SESSION['starting_date'];
            $ending_date = $_SESSION['ending_date'];
            $isset = true;
        }
        else{
            $starting_date = $reserve->getStartingDate();
            $ending_date = $reserve->getEndingDate();
        }
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editando reserva #'.$reserve->getId().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=edit&id='.$reserve->getId().'">
                                    <div class="input-field col s12 m4">
                                        <label for="starting_date">Entrada:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="starting_date" name="starting_date" value="'.$starting_date.'" required>
                                    </div>
                                    <div class="input-field col s12 m4">
                                        <label for="ending_date">Salida:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="ending_date" name="ending_date" value="'.$ending_date.'" required>
                                    </div>
                                    <div class="input-field col s12 m4">
                                        <button class="btn waves-effect waves-light right indigo" style="text-align: center">Comprobar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>';
        if($isset) {
            $reserves = new ReservesController();
            $availables = $reserves->getRoomsAvailable($_POST['starting_date_submit'], $_POST['ending_date_submit']);//Obtengo para cada tipo el número de habitaciones disponibles
            $roomtypes = new Roomtypes();//Objeto contendor de tipos de habitaciones
            $roomtype_list = array();//Esta variable almaenara los tipos de habitaciones
            //Para cada tipo de habitacion obtengo su objeto para manejar la información relacionada a ella
            while ($element = current($availables)) {
                $roomtype = $roomtypes->findByName(key($availables));
                array_push($roomtype_list, $roomtype);
                next($availables);
            }
            $available = false;
            foreach ($availables as $type => $number) {
                if ($number > 0) {
                    $available = true;
                }
            }
        }

                echo '
                <div class="row">    
                    <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=update&id='.$reserve->getId().'">';
                    if($available) {
                        echo '
                        <div class="row table-room">
                            <div class="panel panel-default">
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
                                echo '
                                            <tr> 
                                                <td>' . $roomtype->getName() . '</td> 
                                                <td id="price_' . $roomtype->getName() . '">' . $roomtype->getBasePrice() . '</td>
                                                <td>
                                                    <select id="select_' . $roomtype->getName() . '" name="select_' . $roomtype->getName() . '">';
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

                        echo '
                                    </tbody>
                                </table>
                            </div>
                        </div><!--Fin row table-room-->

                        <div class="row next">
                            <div class="col-sm-2 nopadding">
                                <p>TOTAL: <span id="total_amount">0</span>€</p>
                                <input type="hidden" id="total_amount_submit" name="total_amount_submit">
                            </div>
                        </div>';
                    }

                    echo '
                        <input name="starting_date" type="hidden" value="' . $starting_date. '">
                        <input name="ending_date" type="hidden" value="' . $ending_date .'">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <label>Número de adultos:*</label>
                                <input class="validate" type="text" name="adults_number" value="' . $reserve->getAdultsNumber() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Número de niños:*</label>
                                <input class="validate" type="text" name="children_number" value="' . $reserve->getChildrenNumber() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Nombre:*</label>
                                <input class="validate" type="text" name="name" value="' . $reserve->getName() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Apellidos:*</label>
                                <input class="validate" type="text" name="surname" value="' . $reserve->getSurname() . '" required>
                            </div>
                            
                            <div class="input-field col s12 m6">
                                <label>DNI:*</label>
                                <input class="validate" type="text" name="dni" value="' . $reserve->getDni() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Email:*</label>
                                <input class="validate" type="text" name="email" value="' . $reserve->getEmail() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m12">
                                <label>Observaciones:</label>
                                <textarea class="materialize-textarea" type="text" name="observations">' . $reserve->getObservations() . '</textarea>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Dirección:*</label>
                                <input class="validate" type="text" name="address" value="' . $reserve->getAddress() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Ciudad:*</label>
                                <input class="validate" type="text" name="city" value="' . $reserve->getCity() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Teléfono:*</label>
                                <input class="validate" type="text" name="phone" value="' . $reserve->getPhone() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Titular de la tarjeta:*</label>
                                <input class="validate" type="text" name="cardholder" value="' . $reserve->getCardholder() . '" required>
                            </div>
                                   
                            <div class="input-field col s12 m6">
                                <label>Número de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_number" value="' . $reserve->getCardNumber() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Tipo de tarjeta:*</label>
                                <input class="validate" type="text" name="card_type" value="' . $reserve->getCardType() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Mes de caducidad de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_expiration_month" value="' . $reserve->getCardExpirationMonth() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Año de caducidad de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_expiration_year" value="' . $reserve->getCardExpirationYear() . '" required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>CVC de la tarjeta:*</label>
                                <input class="validate" type="text" name="card_cvc" value="' . $reserve->getCardCvc() . '"required>
                            </div>
                                    
                            <div class="input-field col s12 m6">
                                <label>Código de promoción:*</label>
                                <input class="validate" type="text" name="promotion_code" value="' . $reserve->getPromotionCode() . '">
                            </div>
                                    
                            <div class="col s12">
                                <button type="submit" class="btn waves-effect waves-light right indigo">Guardar</button>
                            </div>
                                    
                            <div class="col s12">
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>';

        echo'
                </div>
            </section>';
    }
}