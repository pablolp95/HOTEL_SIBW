<?php
class content{

    function printPromotions(){//Promociones
        echo "<section>
    <div class=\"container-fluid promotions-container\">
        <div class=\"row promotions\">
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/1.png\" alt=\"Promocion número uno\">
                    <div class=\"caption\">
                        <h3>Oferta de dos noches</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#myModal\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"myModal\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Oferta de dos noches</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Disfrute de un 10% de descuento en estancias de un mínimo de dos noches.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/2.png\" alt=\"Promocion número dos\">
                    <div class=\"caption\">
                        <h3>Oferta de 10% de descuento</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion1\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion1\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Oferta de 10% de descuento</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Disfrute de un 10% de descuento con esta tarifa no reembolsable.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/3.png\" alt=\"Promocion número tres\">
                    <div class=\"caption\">
                        <h3>Reserva anticipada</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion2\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion2\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Reserva anticipada</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Disfruta de un 10% de descuento reservando con 21 días de antelación.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row promotions\">
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/4.png\" alt=\"Promocion número cuatro\">
                    <div class=\"caption\">
                        <h3>Habitación doble junto con tren turístico</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion3\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion3\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Habitación doble junto con tren turístico</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Esta oferta incluye:</p>
                                        <ul>
                                            <li>Dos noche en una habitación estandar con desayuno continental incluido.</li>
                                            <li>Dos tickers para el tren turístico.</li>
                                        </ul>

                                        <p>Granada Tourist Train:</p>

                                        <p>Gracias a este servicio, que recorre la ciudad, usted podrá ver la Alhambra, el barrio del Albaicín, el centro comercial de la ciudad y el barrio del Realejo. El servicio está disponible cada 15-20 minutos.</p>
                                        <ul>
                                            <li>La duración total del recorrido es de una hora y cuarto aproximadamente.</li>
                                            <li>Incluye una audioguía individual</li>
                                            <li>Hora de apertura: desde las nueve de la mañana hasta las diez de la noche.</li>
                                        </ul>

                                        <p>Itinerarío: Alhambra-Cuesta Gomerez-Plaza Nueva-Paseo de los Tristes-Plaza Abad/Mirador de San Nicolás-Plaza San Miguel Bajo- Plaza Romanilla/Catedral-Calle Alhóndiga-Plaza Mariana Pineda-Calle Molinos / Campo del Prínicpe-Alhambra Palace.<p></p>

                                        <p>De Lunes a Jueves, 119 €</p>
                                        <p>Viernes y Sábado, 139 €</p>

                                        <p>Release 48 h</p>
                                        <p>La cancelación debe comunicarse con 72 horas de antelación.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/5.png\" alt=\"Promocion número cinco\">
                    <div class=\"caption\">
                        <h3>Habitación doble junto con sesión de baños árabes</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion5\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion5\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Habitación doble junto con sesión de baños árabes</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Esta oferta incluye:</p>

                                        <ul>
                                            <li>Dos noche en una habitación estandar con desayuno continental incluido.</li>
                                            <li>Una sesión de baños árabes en Hammam Al Ándalus Granada.</li>
                                        </ul>

                                        <p>Hammam Al Ándalus Granada:</p>

                                        <p>Trayendo de nuevo la antigua tradición del Hamman, ofrece un nuevo concepto de baño enfocado al cuidado general del cuerpo en una atmósfera de tranquilidad.</p>

                                        <p>Incluye: una sesión de baño de contrastes, alternando frío y calor. No se recomienda pasar más de 10 minutos en el baño caliente.</p>

                                        <p>Detalles: es necesario un traje de baño y calzado adecuado. Cada sesión dura una hora y media.</p>

                                        <p>Programación: hay sesiones a las 10, 12, 14, 16, 18, 20 and 22. Habierto toda la semana incluyendo festivos.</p>

                                        <p>De Lunes a Jueves, € 154</p>
                                        <p>Viernes y Sábado, € 174</p>

                                        <p>Release: 48 h</p>
                                        <p>La cancelación debe comunicarse con 72 horas de antelación.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/6.png\" alt=\"Promocion número seis\">
                    <div class=\"caption\">
                        <h3>Habitación doble junto con espectáculo de flamenco</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion6\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion6\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Oferta de dos noches</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Incluye:</p>
                                        <ul>
                                            <li>2 noches de alojamiento en habitaciones estándar</li>
                                            <li>Desayuno continental</li>
                                            <li>Espectaculo flamenco</li>
                                        </ul>

                                        <p>El templo del flamenco:</p>
                                        <p>El Flamenco más puro nacido del corazón del monte Albayzín, vive un recuerdo de vida en la cueva flamenca más bonita de Andalucía de la que cuenta la leyenda que fue templo clandestino de cultos religiosos y donde ahora rendimos culto a nuestro arte.</p>

                                        <p>Lugar: Cerca de la parada del tren en Plaza San Miguel Bajo</p>

                                        <p>Incluye: Espectáculo y una consumición.</p>

                                        <p>Duración: 1 hora aproximadamente de cuadro flamenco</p>

                                        <p>Horario: Comienzo: 21:30 h, durante todos los días del año, excepto el 24 y 31 de diciembre.</p>

                                        <p>De domingo a jueves 154 €</p>
                                        <p>Viernes y sábado 174 €</p>

                                        <p>Release 48 h</p>
                                        <p>La cancelación debe comunicarse con 72 horas de antelación.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row table-row promotions\">
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/7.png\" alt=\"Promocion número siete\">
                    <div class=\"caption\">
                        <h3>Habitación doble y visita guiada a la Alhambra</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion7\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion7\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Habitación doble y visita guiada a la Alhambra</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Incluye:</p>
                                        <ul>
                                            <li>2 noches de alojamiento en habitaciones estándar</li>
                                            <li>Desayuno continental</li>
                                            <li>Visita guiada a la Alhambra</li>
                                        </ul>

                                        <p>La Alhambra:</p>
                                        <p>
                                            Descubrirá con nostros la única Ciudad Medieval Musulmana mejor conservada del mundo, la Alhambra;
                                            visitando sus palacios, Mexuar, Comares, Leones, Generalife; paseando por sus patios, de los Arrayenes,
                                            la Reja, la Acequia, la Sultana; y disfrutando de sus jardines, de Partal, de la Medina y por suspuesto del Generalife
                                            con sus gracioso juegos de agua, y su laberintico diseño.
                                        </p>

                                        <p>Incluye: Recogida, ida y vuelta, en bus en el hotel, azafata acompañante, entradas al monumento y guía oficial.</p>

                                        <p>Duración:aproximadamente 3 h.</p>

                                        <p>Horario: Según disponibilidad a la hora de la reserva.</p>

                                        <p>De domingo a jueves 204 €</p>
                                        <p>Viernes y sábado 224 €</p>

                                        <p>Release 48 h</p>
                                        <p>La cancelación debe comunicarse con 72 horas de antelación.</p>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"thumbnail\">
                    <img class=\"img-responsive\" src=\"img/promotions/8.png\" alt=\"Promocion número ocho\">
                    <div class=\"caption\">
                        <h3>Habitación doble junto con trén y espectáculo de flamenco</h3>
                        <div class=\"promotion-more\">
                            <!-- Trigger the modal with a button -->
                            <button type=\"button\" class=\"button\" data-toggle=\"modal\" data-target=\"#promotion8\">Leer más</button>
                        </div>

                        <!-- Modal -->
                        <div class=\"modal fade\" id=\"promotion8\" role=\"dialog\">
                            <div class=\"modal-dialog\">

                                <!-- Modal content-->
                                <div class=\"modal-content\">
                                    <div class=\"modal-header\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>
                                        <h4 class=\"modal-title\">Oferta de dos noches</h4>
                                    </div>
                                    <div class=\"modal-body\">
                                        <p>Incluye:</p>
                                        <ul>
                                            <li>2 noches de alojamiento en habitaciones estándar</li>
                                            <li>Desayuno continental</li>
                                            <li>Espectáculo flamenco</li>
                                            <li>2 Tickets para uso del tren durante todo el día. Hop on - Hop off.</li>
                                        </ul>
                                    </div>
                                    <div class=\"modal-footer\">
                                        <button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Cerrar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>";
    }
    function printAllRooms(){
        echo "<section class=\"section\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-sm-6 text-center description\">
                <h1>Habitación doble</h1>
                <p>En nuestras habitaciones<strong> standard</strong> disfrutará de todo el equipamiento
                    y comodidades que su estancia en Granada merece.</p>
            </div>
            <div class=\"col-sm-6\">
                <figure>
                    <img class=\"img-responsive\" src=\"img/doble.jpg\" alt=\"Habitación doble\">
                </figure>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-6\">
                <figure>
                    <img class=\"img-responsive\" src=\"img/triple.jpg\" alt=\"Habitación triple\">
                </figure>
            </div>
            <div class=\"col-sm-6 text-center description\">
                <h1>Habitación triple</h1>
                <p>En nuestras <strong>habitaciones triples</strong> podrá disfrutar de sus vacaciones
                    en familia o con amigos en el centro de Granada.</p>
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-6 text-center description\">
                <h1>Habitación superior</h1>
                <p>Disfrute de una<strong> magnifica vista de Plaza Nueva</strong> y
                    el centro de Granada desde nuestras habitaciones superiores.</p>
            </div>
            <div class=\"col-sm-6\">
                <figure>
                    <img class=\"img-responsive\" src=\"img/superior.jpg\" alt=\"Habitación superior\">
                </figure>
            </div>
        </div>
    </div>
</section>";
    }
    function printRoom($room){
        switch ($room){
            case 'doble':
                echo "<section class=\"section\">
                        <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"col-sm-6 text-center description\">
                                    <h1>Habitación doble</h1>
                                    <p>En nuestras habitaciones<strong> standard</strong> disfrutará de todo el equipamiento
                                        y comodidades que su estancia en Granada merece.</p>
                                </div>
                                <div class=\"col-sm-6\">
                                    <figure>
                                        <img class=\"img-responsive\" src=\"img/doble.jpg\" alt=\"Habitación doble\">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    </section>";
                break;
            case 'triple':
                echo "<section class=\"section\">
                        <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"col-sm-6 text-center description\">
                                    <h1>Habitación triple</h1>
                                    <p>En nuestras <strong>habitaciones triples</strong> podrá disfrutar de sus vacaciones
                                        en familia o con amigos en el centro de Granada.</p>
                                </div>
                                <div class=\"col-sm-6\">
                                    <figure>
                                        <img class=\"img-responsive\" src=\"img/triple.jpg\" alt=\"Habitación triple\">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>";
                break;
            case 'superior':
                echo "<section class=\"section\">
                        <div class=\"container\">
                            <div class=\"row\">
                                <div class=\"col-sm-6 text-center description\">
                                    <h1>Habitación superior</h1>
                                    <p>Disfrute de una<strong> magnifica vista de Plaza Nueva</strong> y
                                        el centro de Granada desde nuestras habitaciones superiores.</p>
                                </div>
                                <div class=\"col-sm-6\">
                                    <figure>
                                        <img class=\"img-responsive\" src=\"img/superior.jpg\" alt=\"Habitación superior\">
                                    </figure>
                                </div>
                            </div>
                        </div>
                </section>";
                break;
        }
    }
    function printgallery(){

        echo "<section>
    <div class=\"container-fluid\">
        <div class=\"row padding\">
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/doble.jpg\" alt=\"doble\" >
                        <div class=\"desc\">Habitación doble</div>
                    </div>
                </div>
            </div>

            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/doble1.jpg\" alt=\"doble1\">
                        <div class=\"desc\">Habitación doble</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/doble3.png\" alt=\"doble3\">
                        <div class=\"desc\">Habitación Doble</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row padding\">
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/triple.jpg\" alt=\"triple\">
                        <div class=\"desc\">Habitación triple</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/superior.jpg\" alt=\"superior\">
                        <div class=\"desc\">Habitación superior</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/superior1.jpg\" alt=\"superior1\">
                        <div class=\"desc\">Habitación superior</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row padding\">
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/Hamman.1800.jpg\" alt=\"hamman\">
                        <div class=\"desc\">Hamman</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/patio.jpg\" alt=\"patio\">
                        <div class=\"desc\">Patio</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/fachada.jpeg\" alt=\"fachada\">
                        <div class=\"desc\">Fachada</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row padding\">
                <div class=\"col-sm-4\">
                    <div class=\"responsive\">
                        <div class=\"img\">
                            <img src=\"img/s3.png\" alt=\"buffet\">
                            <div class=\"Buffet\">Patio interior</div>
                        </div>
                    </div>
                </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/s2.png\" alt=\"servicios\">
                        <div class=\"desc\">Servicios</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/s1.png\" alt=\"servicios\">
                        <div class=\"desc\">Servicios</div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row padding\">
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/3.jpg\" alt=\"patioi\">
                        <div class=\"Patio interior\">Patio interior</div>
                    </div>
                </div>
            </div>
            <div class=\"col-sm-4\">
                <div class=\"responsive\">
                    <div class=\"img\">
                        <img src=\"img/patio_interior.png\" alt=\"patio\">
                        <div class=\"desc\">Patio interior</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div class=\"clearfix\"></div>

    <!-- The Modal -->
    <div id=\"myModal\" class=\"modal\">
        <span class=\"close\">×</span>
        <img class=\"modal-content\" id=\"img01\">
        <div id=\"caption\"></div>
    </div>






</section>";
    }
    function home(){
        echo "<section class=\"first-section\">
    <!-- Slide de imagenes -->
        <div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
        <!-- Indicators -->
        <ol class=\"carousel-indicators\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"3\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"4\"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class=\"carousel-inner\" role=\"listbox\">
            <div class=\"item active\">
                <img src=\"img/1.jpg\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/2.jpg\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/3.jpg\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/4.jpg\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/5.jpg\" alt=\"Image\">
                <div class=\"main-text hidden-xs\">
                    <div class=\"col-sm-12 text-center\">
                        <h1 class=\"static-welcome\">Bienvenido al<br/> hotel Plaza Nueva</h1>
                    </div>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class=\"left carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">
            <span class=\"glyphicon glyphicon-chevron-left\" aria-hidden=\"true\"></span>
            <!-- Ocultar informacion para lectores de pantalla-->
            <span class=\"sr-only\">Previous</span>
        </a>
        <a class=\"right carousel-control\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">
            <span class=\"glyphicon glyphicon-chevron-right\" aria-hidden=\"true\"></span>
            <!-- Ocultar informacion para lectores de pantalla-->
            <span class=\"sr-only\">Next</span>
        </a>
    </div>

        <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-sm-6 description\">
                <h1 id=\"description-header\">Hotel Plaza Nueva</h1>
                <p id=\"description-text\">Situado en pleno centro monumental, comercial y administrativo de Granada,
                    nuestro hotel ofrece una gran variedad de servicios que satisfarán cualquier necesidad que le surja.
                </p>
                <a id=\"description-link\" href=\"#\">Leer más</a>
            </div>
            <div class=\"col-sm-6 characteristics\" id=\"service\">
                <p>Tiene a su disposición los siguientes servicios:</p>
                <div class=\"service\">
                    <i class=\"flaticon-icon-62768\"></i>
                    <p>Recepción 24 horas</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-connection\"></i>
                    <p>Conexión wifi a Internet</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-circle\"></i>
                    <p>Bar-Cafetería</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-icon-101197\"></i>
                    <p>Consigna de equipajes</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-weather\"></i>
                    <p>Aire acondicionado</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-car\"></i>
                    <p>Parking cubierto</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-hospital\"></i>
                    <p>Accesos adaptados</p>
                </div>
                <div class=\"service\">
                    <i class=\"flaticon-icon-60435\"></i>
                    <p>Servicio de habitaciones</p>
                </div>
            </div>
        </div>
    </div>
    </section>
        <section class=\"parallax-index\">
        </section>
        <section class=\"second-section\">
    <!-- Habitaciones -->
    <div class=\"container-fluid\" id=\"rooms\">
        <div class=\"row\">
            <a href=\"rooms.html\">
                <div class=\"col-sm-12 nopadding\">
                    <h1 class=\"rooms-header\">Habitaciones</h1>
                </div>
            </a>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-4 room\">
                <a href=\"rooms.html#hd\">
                    <img class=\"img-responsive\" src=\"img/doble.jpg\"/>
                </a>
                <h1 class=\"room-header\">Habitación triple</h1>
            </div>
            <div class=\"col-sm-4 room\">
                <a href=\"rooms.html#ht\">
                    <img class=\"img-responsive\" src=\"img/triple.jpg\"/>
                </a>
                <h1 class=\"room-header\">Habitación superior</h1>
            </div>
            <div class=\"col-sm-4 room\">
                <a href=\"rooms.html#hs\">
                    <img class=\"img-responsive\" src=\"img/superior.jpg\"/>
                </a>
                <h1 class=\"room-header\">Habitación doble</h1>
            </div>
        </div>
    </div>
    <div class=\"container-fluid\">
        <div class=\"row\" id=\"map\">
            <a href=\"contact.html\">
                <div class=\"col-sm-12 nopadding\">
                    <h1 class=\"map-header\">¿Dónde nos encontramos?</h1>
                </div>
            </a>
        </div>
        <div class=\"row\">
            <div class=\"col-sm-12 nopadding\">
                <div class=\"map\" id=\"googleMap\"></div>
            </div>
        </div>
    </div>
</section>";
    }
    function contact(){
            echo "<section class=\"parallax-contact\">
                    <div class=\"row\">
                        <div class=\"col-sm-12\">
                            <h1>Contacto y ubicación</h1>
                        </div>
                    </div>
                </section>
                
                <section>
                    <div class=\"container\">
                        <div class=\"row\">
                            <div class=\"col-sm-12 center-align\">
                                <h1>¿En qué podemos ayudarte?</h1>
                            </div>
                        </div>
                        <div class=\"row section\">
                            <div class=\"col-sm-12\">
                                <form  role=\"form\" name=\"myForm\" onsubmit=\"return validateForm()\">
                                    <div class=\"col-sm-4\">
                                        <div class=\"form-group\">
                                            <input type=\"text\" class=\"form-control input-lg input-style\" id=\"name\" placeholder=\"Nombre\" required>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-4\">
                                        <div class=\"form-group\">
                                            <input type=\"email\" class=\"form-control input-lg input-style\" id=\"email\" placeholder=\"E-mail\" required>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-4\">
                                        <div class=\"form-group\">
                                            <input type=\"phone\" class=\"form-control input-lg input-style\" id=\"phone\" name=\"fphone\" placeholder=\"Teléfono\">
                                        </div>
                                    </div>
                                    <div class=\"col-sm-12\">
                                        <div class=\"form-group\">
                                            <textarea class=\"form-control input-lg noresize input-style\" rows=\"5\" id=\"comment\" placeholder=\"Mensaje\" required></textarea>
                                        </div>
                                    </div>
                                    <div class=\"col-sm-12 text-center\">
                                        <button type=\"submit\" class=\"button btn-lg\" style=\"text-align: center\">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class=\"container-fluid\">
                        <div class=\"row\">
                            <div class=\"col-sm-12 nopadding\">
                                <div class=\"map\" id=\"googleMap\"></div>
                            </div>
                        </div>
                    </div>
                </section>";
    }
    function printBar(){
        
    }
}


?>