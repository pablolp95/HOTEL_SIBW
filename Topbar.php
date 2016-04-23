<?php


class TopBar
{

    function printBar($page){
        echo '<section class="container-fluid topbar">
            <div class="row">
            ';
            $this->printVariableBar($page);
            $this->printSlider();
            $this->printcontact();
        echo '</div>
            </section>';

    }

    function printcontact(){
    echo '<div class="col-sm-4 topbar-right">
                <ul>
                    <li><i class="fa fa-phone"></i>
                    <p>+34 958 215 273</p></li>
                        
                    <li><i class="fa fa-fax"></i>
                    <p>+34 958 225 765</p></li>
            
                    <li><i class="fa fa-envelope"></i>
                    <p><a href="mailto:info@hotel-plazanueva.com">info@hotel-plazanueva.com</a></p></li>
                </ul>
           </div>';
    }

    function printVariableBar($page){
        echo '<div class="col-sm-4">
                         <ul class="topbar-links">';
        switch ($page){
            case 'rooms':
                $this->allref();
                break;
            case 'top-room':
                $this->ref($page);
                break;
            case 'double-room':
                $this->ref($page);
                break;
            case 'triple-room':
                $this->ref($page);
                break;
        }

        echo'</ul>
           </div>';
    }

    function allref(){
        echo '<li><a href=\'index.php?page=double-room\'>Habitación doble</a></li>
        <li><a href=\'index.php?page=triple-room\'>Habitación triple</a></li>
        <li><a href=\'index.php?page=top-room\'>Habitación superior</a></li>';
    }
    
    function ref($page){
        if($page=='double-room'){
            echo '<li><a href=\'index.php?page=triple-room\'>Habitación triple</a></li>
        <li><a href=\'index.php?page=top-room\'>Habitación superior</a></li>';
        }
        else if($page=='triple-room'){
            echo'<li><a href=\'index.php?page=double-room\'>Habitación doble</a></li>
        <li><a href=\'index.php?page=top-room\'>Habitación superior</a></li>';
        }
        else if($page=='top-room'){
            echo '<li><a href=\'index.php?page=triple-room\'>Habitación triple</a></li>
            <li><a href=\'index.php?page=double-room\'>Habitación doble</a></li>';
        }
    }
    function printSlider()
    {
        echo "<div class='col-sm-4'><div id=\"myCarousel\" class=\"carousel slide\" data-ride=\"carousel\">
        <!-- Indicators -->
        <ol class=\"carousel-indicators\">
            <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"3\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"4\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"5\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"6\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"7\"></li>
            <li data-target=\"#myCarousel\" data-slide-to=\"8\"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class=\"carousel-inner\" role=\"listbox\">
            <div class=\"item active\">
                <img src=\"img/promotions/1.png\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/promotions/2.png\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/promotions/3.png\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/promotions/4.png\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/promotions/5.png\" alt=\"Image\">
            </div>

            <div class=\"item\">
                <img src=\"img/promotions/6.png\" alt=\"Image\">
            </div>
            <div class=\"item\">
                <img src=\"img/promotions/7.png\" alt=\"Image\">
            </div>
            <div class=\"item\">
                <img src=\"img/promotions/8.png\" alt=\"Image\">
            </div>

        </div>

        </div>
       </div>
";
    }
}

?>