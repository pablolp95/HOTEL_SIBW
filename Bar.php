<?php

class Bar
{
    function roomsBar(){
        echo'
        <div class=container-fluid>
            <div class="row row-eq-height">
                <div class="col-sm-8">
        ';
        $this->promotionsSlider('rooms');
        echo'
                </div>
                <div class="col-sm-4 contact">
        ';
        $this->contact();
        echo'                    
                </div>
            </div>
        </div>
        ';
    }

    function contextBar($page){
        echo'
        <div class=container-fluid>
            <div class="row row-eq-height">
                <div class="col-sm-3">
        ';
        $this->menu($page);
        echo '
                </div>
                <div class="col-sm-6">
        ';
        $this->promotionsSlider();
        echo'
                </div>
                <div class="col-sm-3 contact">
        ';
        $this->contact();
        echo'                    
                </div>
            </div>
        </div>
        ';
    }

    private function menu($page){
        switch ($page) {
            case 'double-room':
                echo '
                <ul>
                    <li><a href="index.php?page=triple-room">Habitación triple</a></li>
                    <li><a href="index.php?page=superior-room">Habitación superior</a></li>
                <ul>
                ';
                break;
            case 'triple-room':
                echo '
                <ul>
                    <li><a href="index.php?page=double-room">Habitación doble</a></li>
                    <li><a href="index.php?page=superior-room">Habitación superior</a></li>
                <ul>
                ';
                break;
            case 'superior-room':
                echo '
                <ul>
                    <li><a href="index.php?page=double-room">Habitación doble</a></li>
                    <li><a href="index.php?page=triple-room">Habitación triple</a></li>
                <ul>
                ';
                break;
            case 'promotions':
                echo '
                <ul>
                    <li><a href="index.php?page=rooms">Habitaciones</a></li>
                    <li><a href="index.php?page=gallery">Galería</a></li>
                    <li><a href="index.php?page=contact">Contacto</a></li>
                <ul>
                ';
                break;
            case 'gallery':
                echo '
                <ul>
                    <li><a href="index.php?page=triple-room">Habitación triple</a></li>
                    <li><a href="index.php?page=superior-room">Habitación superior</a></li>
                <ul>
                ';
                break;
        }
    }

    private function promotionsSlider($page){
        echo'
            <div class="row">
                <a href="index.php?page=promotions">
                    <div class="col-sm-12 nopadding">
                        <h1 class="promotions-header">Promociones destacadas</h1>
                    </div>
                </a>
            </div>
            <div id="bar-promotionSlider" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
                        <div class="row bar-promotion-slider">
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="row background row-eq-height">
                                    <div class="col-sm-6 nopadding">
                                        <img class="img-responsive" src="img/promotions/5.png" alt="Promocion número cinco">
                                    </div>
                                    <div class="col-sm-6 bar-promotion-description">
                                        <h1 class="bar-promotion-header">Habitación doble junto con sesión de baños árabes</h1>';
                                        if($page == 'rooms')
                                            echo'
                                        <p class="bar-promotion-text">Gracias a esta promoción podrá disfrutar de dos noches en una habitacion estandar acompañadas
                                        de una sesión de baños árabes en Hammam Al Ándalus Granada, en la que podrá disfrutar de la antigua tradición del Hamman.</p>';
                                    echo'
                                    </div>
                                </div>
                            </div>
        
                            <div class="item">
                                <div class="row background row-eq-height">
                                    <div class="col-sm-6 nopadding">
                                        <img class="img-responsive" src="img/promotions/espectaculo.jpg" alt="Promocion número seis">
                                    </div>
                                    <div class="col-sm-6 bar-promotion-description">
                                        <h1 class="bar-promotion-header">Habitación doble junto con espectáculo de flamenco</h1>';
                                        if($page == 'rooms')
                                            echo'
                                        <p class="bar-promotion-text">Con esta promoción disfrutaras de dos noches en nuestro hotel y además
                                         podrás presenciar uno de los mayores espectáculos de flamenco de la ciudad de Granada.</p>';
                                    echo'</div>
                                </div>
                            </div>
        
                            <div class="item">
                                <div class="row background row-eq-height">
                                    <div class="col-sm-6 nopadding">
                                        <img class="img-responsive" src="img/promotions/7.png" alt="Promocion número siete">
                                    </div>
                                    <div class="col-sm-6 bar-promotion-description">
                                        <h1 class="bar-promotion-header">Habitación doble y visita guiada a la Alhambra</h1>';
                                        if($page == 'rooms')
                                            echo'
                                        <p class="bar-promotion-text">Gracias a esta promoción podrá disfrutar de dos noches en una habitacion estandar y 
                                        descubrirá con nosotros la única ciudad medieval musulmana mejor conservada del mundo, la Alhambra</p>';
                                        echo '
                                    </div>
                                </div>
                            </div>
        
                        </div>
                        </div>
                        <!-- Left and right controls -->
                        <a class="left carousel-control bar-promotions-button" href="#bar-promotionSlider" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <!-- Ocultar informacion para lectores de pantalla-->
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control bar-promotions-button" href="#bar-promotionSlider" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <!-- Ocultar informacion para lectores de pantalla-->
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
        ';
    }
    private function contact(){
        echo '
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
        ';
    }

}