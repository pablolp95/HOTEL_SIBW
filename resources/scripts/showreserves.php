<?php
include_once '../app/models/Reserves.php';
include_once '../app/models/Reserve.php';

$q = $_GET['query'];
$reserves = new Reserves();
$list = $reserves->searchParam($q);
if($list != null){
    echo '<table class="responsive-table hoverable-table">
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
                                foreach($list as $reserve) {
                                    echo '<tr>
                                        <td>'.$reserve->id.'</td>
                                        <td>'.$reserve->dni.'</td>
                                        <td>'.$reserve->name.'</td>
                                        <td>'.$reserve->surname.'</td>
                                        <td>'.$reserve->starting_date.'</td>
                                        <td>'.$reserve->ending_date.'</td>
                                        <td class="center-align">
                                            <a class="btn-floating btn-large waves-effect waves-light deep-orange tooltipped" href="?page=intranet&section=reserves&id='.$reserve->getId().'&action=edit" data-position="top" data-delay="50" data-tooltip="Editar reserva"><i class="material-icons">edit</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light red tooltipped" href="?page=intranet&section=reserves&id='.$reserve->getId().'" data-position="top" data-delay="50" data-tooltip="Mostrar reserva"><i class="material-icons">visibility</i></a>
                                            <a class="btn-floating btn-large waves-effect waves-light blue tooltipped" href="?page=intranet&section=reserves&action=delete&id='.$reserve->getId().'" data-position="top" data-delay="50" data-tooltip="Cancelar reserva"><i class="material-icons">delete</i></a>
                                        </td>
                                    </tr>';
    }
    echo'
                                </tbody>
                            </table>';
}

?>