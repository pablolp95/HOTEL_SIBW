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
                                <!-- Email field -->
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=store" ">
                                    <div class="input-field col s12 m6">
                                        <label for="stating_date">Entrada:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="stating_date" name="starting_date" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label for="stating_date">Salida:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="ending_date" name="ending_date" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Número de adultos:*</label>
                                        <input class="validate" type="text" name="adults_number" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Número de niños:*</label>
                                        <input class="validate" type="text" name="children_number" required>
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
                                        <label>Tipo de tarjeta:*</label>
                                        <input class="validate" type="text" name="card_type" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Mes de caducidad de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_expiration_month" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Año de caducidad de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_expiration_year" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>CVC de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_cvc" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Código de promoción:*</label>
                                        <input class="validate" type="text" name="promotion_code" required>
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
                            <p><strong>Teléfono:</strong> '.$reserve->getPhone().'</p>
                            <p><strong>Email:</strong> '.$reserve->getEmail().'</p>
                            <p><strong>Titular de la tarjeta:</strong> '.$reserve->getCardholder().'</p>
                            <p><strong>Número de tarjeta:</strong> '.$reserve->getCardNumber().'</p>
                        </div>
                        <div class="col s12 m6">
                            <p><strong>Tipo de tarjeta:</strong> '.$reserve->getCardType().'</p>
                            <p><strong>Mes de caducidad de la tarjeta:</strong> '.$reserve->getCardExpirationMonth().'</p>
                            <p><strong>Año de caducidad de la tarjeta:</strong> '.$reserve->getCardExpirationYear().'</p>
                            <p><strong>CVC de la tarjeta:</strong> '.$reserve->getCardCvc().'</p>
                        </div>
                    </div>
                </div>
            </section>';
    }

    static function print_edit($reserve){
        echo'
            <section>
                <div class="container padded">
                    <div class="row">
                        <div class="col s12">
                            <h1 class="grey-text text-darken-3">Editar reserva #'.$reserve->getId().'</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <!-- Email field -->
                                <form  role="form" name="myForm" method="POST" action="?page=intranet&section=reserves&action=store" ">
                                    <div class="input-field col s12 m6">
                                        <label for="stating_date">Entrada:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="stating_date" name="starting_date" value="'.$reserve->getStartingDate().'"required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label for="stating_date">Salida:*</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="ending_date" name="ending_date" value="'.$reserve->getEndingDate().'"required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Número de adultos:*</label>
                                        <input class="validate" type="text" name="adults_number" value="'.$reserve->getAdultsNumber().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Número de niños:*</label>
                                        <input class="validate" type="text" name="children_number" value="'.$reserve->getChildrenNumber().'"required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Nombre:*</label>
                                        <input class="validate" type="text" name="name" value="'.$reserve->getName().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Apellidos:*</label>
                                        <input class="validate" type="text" name="surname" value="'.$reserve->getSurname().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Email:*</label>
                                        <input class="validate" type="text" name="email" value="'.$reserve->getEmail().'"required>
                                    </div>
                                    
                                    <div class="input-field col s12 m12">
                                        <label>Observaciones:</label>
                                        <textarea class="materialize-textarea" type="text" name="observations">'.$reserve->getObservations().'</textarea>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Dirección:*</label>
                                        <input class="validate" type="text" name="address" value="'.$reserve->getAddress().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Ciudad:*</label>
                                        <input class="validate" type="text" name="city" value="'.$reserve->getCity().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Teléfono:*</label>
                                        <input class="validate" type="text" name="phone" value="'.$reserve->getPhone().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Titular de la tarjeta:*</label>
                                        <input class="validate" type="text" name="cardholder" value="'.$reserve->getCardholder().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Número de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_number" value="'.$reserve->getCardNumber().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Tipo de tarjeta:*</label>
                                        <input class="validate" type="text" name="card_type" value="'.$reserve->getCardType().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Mes de caducidad de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_expiration_month" value="'.$reserve->getCardExpirationMonth().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Año de caducidad de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_expiration_year" value="'.$reserve->getCardExpirationYear().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>CVC de la tarjeta:*</label>
                                        <input class="validate" type="text" name="card_cvc" value="'.$reserve->getCardCvc().'" required>
                                    </div>
                                    
                                    <div class="input-field col s12 m6">
                                        <label>Código de promoción:*</label>
                                        <input class="validate" type="text" name="promotion_code" value="'.$reserve->getPromotionCode().'" required>
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