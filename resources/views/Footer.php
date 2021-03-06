<?php
    class Footer{
        function print_footer(){
            echo '<footer class="container-fluid footer" id="footer">
                    <div class="row">
                        <div class="col-sm-8">
                            <a href="/"><img src="img/logo.png" class="img-responsive footer-logo" alt="Logo del pie de pagina"/></a>
                            <ul class="footer-links">
                                <li><a href="?page=promotions">Promociones</a></li>
                                <li><a href="?page=rooms">· Habitaciones</a></li>
                                <li><a href="#service">· Servicios</a></li>
                                <li><a href="?page=gallery">· Galería</a></li>
                                <li><a href="?page=contact">· Contacto y ubicación</a></li>
                                <li><a href="?page=opinions">· Opiniones</a></li>
                                <li><a href="?page=myreserve">· Mi reserva</a></li>
                                <li><a href="?page=intranet">· Intranet</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-4 footer-right">
                            <div>
                                <i class="fa fa-map-marker"></i>
                                <p><span>c/ Imprenta Nº2</span> 18010 Granada, España</p>
                            </div>
                            <div>
                                <i class="fa fa-phone"></i>
                                <p>+34 958 215 273</p>
                            </div>
                            <div>
                                <i class="fa fa-fax"></i>
                                <p>+34 958 225 765</p>
                            </div>
                            <div>
                                <i class="fa fa-envelope"></i>
                                <p><a href="mailto:info@hotel-plazanueva.com">info@hotel-plazanueva.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 company">
                            <p class="footer-company-name">Desarrollado con <i class="fa fa-fw fa-coffee"></i> y <i class="fa fa-fw fa-heart"></i> por José Conejero y Pablo Lara</p>
                        </div>
                    </div>
                </footer>';
        }
    }
?>