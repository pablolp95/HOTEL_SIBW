<?php


class TopBar
{
    function printBar($page){
        echo '<section class="container-fluid topbar">
            <div class="row">
            ';
            $this->printVariableBar($page);
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
        echo '<div class="col-sm-8">
                         <ul class="topbar-links">';
        switch ($page){
            case 'rooms':
                $this->allref();
                break;
            case 'rop-room':
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
}

?>