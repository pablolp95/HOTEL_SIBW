<?php

class nav{
    function printNav(){
        echo "<nav class=\"navbar navbar-default\" role=\"navigation\">
                <div class=\"container-fluid\">
                    <div class=\"navbar-header\">
                        <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#myNavbar\">
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                        <a class=\"navbar-brand\" href=\"index.html\"><img class=\"img-responsive\" src=\"img/logo.png\" alt=\"logo de la pagina\"></a>
                    </div>
                    <div class=\"collapse navbar-collapse\" id=\"myNavbar\">
                        <ul class=\"nav navbar-nav navbar-right\">
                            <li><a href=\"index.php?page=promotions\">Promociones</a></li>
                            <li class=\"dropdown\">
                                <a href=\"index.php?page=rooms\">Habitaciones</a>
                                <ul class=\"dropdown-menu dropdown-menu-left\">
                                    <li><a href=\"index.php?page=double-room\">Habitación doble</a></li>
                                    <li><a href=\"index.php?page=triple-room\">Habitación triple</a></li>
                                    <li><a href=\"index.php?page=top-room\">Habitación superior</a></li>
                                </ul>
                            <li><a href=\"index.html#service\">Servicios</a></li>
                            <li><a href=\"index.php?page=gallery\">Galería</a></li>
                            <li><a href=\"index.php?page=contact\">Contacto y ubicación</a></li>
                            <li><a href=\"#\">Opiniones</a></li>
                            <li><a href=\"#\">Mi reserva</a></li>
                            <li id=\"active\"><a href=\"#\">RESERVAR AHORA</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            ";
    }
}

?>