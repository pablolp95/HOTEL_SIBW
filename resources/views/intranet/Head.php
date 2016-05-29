<?php

class IntranetHead{
    function print_head(){
        if(isset($_REQUEST['section'])) {
            switch ($_REQUEST['section']) {
                case 'promotions':
                    if(isset($_REQUEST['action'])){
                        switch ($_REQUEST['action']){
                            case 'create':
                                $title = 'Crear promoción';
                                break;
                            case 'edit':
                                $title = 'Editando promoción '.$_REQUEST['id'];
                                break;
                        }
                    }
                    else if(isset($_REQUEST['id'])) {
                        $title = 'Mostrando promoción '.$_REQUEST['id'];
                    }
                    else {
                        $title = 'Lista de promociones';
                    }
                    break;
                case 'reserves':
                    if(isset($_REQUEST['action'])){
                        switch ($_REQUEST['action']){
                            case 'create':
                                $title = 'Realizar reserva';
                                break;
                            case 'edit':
                                $title = 'Editando reserva '.$_REQUEST['id'];
                                break;
                        }
                    }
                    else if(isset($_REQUEST['id'])) {
                        $title = 'Mostrando reserva '.$_REQUEST['id'];
                    }
                    else {
                        $title = 'Lista de reservas';
                    }
                    break;;
                case 'rooms':
                    if(isset($_REQUEST['action'])){
                        switch ($_REQUEST['action']){
                            case 'create':
                                $title = 'Crear habitación';
                                break;
                            case 'edit':
                                $title = 'Editando habitación '.$_REQUEST['id'];
                                break;
                        }
                    }
                    else if(isset($_REQUEST['id'])) {
                        $title = 'Mostrando habitación '.$_REQUEST['id'];
                    }
                    else {
                        $title = 'Lista de habitaciones';
                    }
                    break;;
                case 'users':
                    if(isset($_REQUEST['action'])){
                        switch ($_REQUEST['action']){
                            case 'create':
                                $title = 'Crear usuario';
                                break;
                            case 'edit':
                                $title = 'Editando usuario '.$_REQUEST['id'];
                                break;
                        }
                    }
                    else if(isset($_REQUEST['id'])) {
                        $title = 'Mostrando usuario '.$_REQUEST['id'];
                    }
                    else {
                        $title = 'Lista de usuarios';
                    }
                    break;
                case 'roomtypes':
                    if(isset($_REQUEST['action'])){
                        switch ($_REQUEST['action']){
                            case 'create':
                                $title = 'Crear tipo de habitación';
                                break;
                            case 'edit':
                                $title = 'Editando tipo de habitación '.$_REQUEST['id'];
                                break;
                        }
                    }
                    else if(isset($_REQUEST['id'])) {
                        $title = 'Mostrando tipo de habitación '.$_REQUEST['id'];
                    }
                    else {
                        $title = 'Lista de tipos de habitaciones';
                    }
                    break;
            }
        }
        else{
            $title = 'Dashboard';
        }

        echo '
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
            <title>'.$title.'</title>
            <link rel="icon" type="image/png" href="img/favicon64.png" />
            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="components/Materialize/dist/css/materialize.css" type="text/css" rel="stylesheet"  media="screen"/>
            <link href="css/intranet/style.css" type="text/css" rel="stylesheet" media="screen"/>
            <link href="css/font/flaticon.css" type="text/css" rel="stylesheet"/>
        
            <!--  Scripts-->
            <script src="components/jquery/dist/jquery.min.js"></script>
            <script src="components/Materialize/dist/js/materialize.js"></script>
            <script src="components/pickadate/lib/compressed/picker.js"></script>
            <script src="components/pickadate/lib/compressed/picker.date.js"></script>
            <script src="components/pickadate/lib/compressed/translations/es_ES.js"></script>
            <script src="js/intranet.js"></script>
        
        </head>
        ';
    }
}