<?php
    class Head{
        function printHead($page){

            switch($page){
                case 'homepage':
                    $css = 'index.css';
                    break;
                case 'promotions':
                    $title = '- Promociones';
                    $css = 'promotions.css';
                    break;
                case 'rooms':
                    $title = '- Habitaciones';
                    $css = 'rooms.css';
                    break;
                case 'triple-room':
                    $title = '- Habitación triple';
                    $css = 'rooms.css';
                    break;
                case 'double-room':
                    $title = '- Habitación doble';
                    $css = 'rooms.css';
                    break;
                case 'top-room':
                    $title = '- Habitación superior';
                    $css = 'rooms.css';
                    break;
                case 'services':
                    $title = '- Servicios';
                    $css = 'rooms.css';
                    break;
                case 'gallery':
                    $title = '- Galería';
                    $css = 'gallery.css';
                    break;
                case 'contact':
                    $title = '- Contacto y ubicación';
                    $css = 'contact.css';
                    break;
            }

            echo '
                <head>
                <title>Hotel Plaza Nueva'.$title.'</title>
                <meta charset=\'utf-8\'>
                <meta name=\'viewport\' content=\'width=device-width, initial-scale=1\'>
                <meta http-equiv=\'X-UA-Compatible\' content=\'IE=edge\'>
            
                <link rel=\'shortcut icon\' href=\'img/favicon.ico\'/>
            
                <!-- Latest compiled and minified CSS -->
                <link rel=\'stylesheet\' href=\'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css\'>
                <!-- jQuery library -->
                <script src=\'https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js\'></script>
                <!-- Latest compiled JavaScript -->
                <script src=\'http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js\'></script>
                <!-- Personal scripts -->
    
                <!-- Personal CSS -->
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/body.css\'/>
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/nav.css\'/>
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/'.$css.'\'/>
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/footer.css\'/>
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/font/flaticon.css\'/>
                <link type=\'text/css\' rel=\'stylesheet\' href=\'css/topbar.css\'/>
    
                <!-- GOOGLE FONT -->
                 <link href=\'http://fonts.googleapis.com/css?family=Roboto:500,300,700,400\' rel=\'stylesheet\' type=\'text/css\'>
                 <link href=\'http://fonts.googleapis.com/css?family=Numans\' rel="stylesheet" type=\'text/css\'/>
                <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type=\'text/css\'/>
                <link href=\'https://fonts.googleapis.com/css?family=Droid+Serif:400,400italic\' rel=\'stylesheet\' type=\'text/css\'>
                <link href=\'https://fonts.googleapis.com/css?family=Noto+Serif:400,400italic\' rel=\'stylesheet\' type=\'text/css\'>


                </head>';

        }
    }
?>