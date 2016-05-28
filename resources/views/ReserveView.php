<?php

class ReserveView
{
    function print_reserve($step){
        $this->print_progress($step);
        switch ($step){
            case 'select_room':
                $this->print_select_room();
                break;
            case 'introduce_info':
                $this->print_introduce_info();
                break;
            case 'confirm':
                $this->print_confirm();
                break;
            case 'summary':
                $this->print_summary();
                break;
        }
    }

    private function print_select_room(){
        echo '
            <section>
                <div class="container">
                    <div class="row select-room-title">
                        <div class="col-sm-12 nopadding">
                            <h1>¿Cuando quieres alojarte?</h1>
                        </div>
                    </div>
                    <form role="form" name="myForm" method="get" action="?page=reserve&action=getrooms">
                            <div class="row section">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="stating_date">Entrada</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="stating_date" name="starting_date">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label for="ending_date">Salida</label>
                                        <input type="date" class="datepicker form-control input-lg input-style" id="ending_date" name="ending_date">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Adultos</label>
                                        <select class="form-control input-lg input-style" id="select_adults" name="select_adults">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Niños</label>
                                        <select class="form-control input-lg input-style" id="select_children" name="select_children">
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-sm-2 select-room-submit">
                                    <button type="button" class="button btn-lg" style="text-align: center">Comprobar</button>
                                </div>
                            </div>
                            <div class="row table-room">
                                <div class="panel panel-default">
                                    <table class="table table-roomtypes"> 
                                        <thead> 
                                            <tr> 
                                                <th>Tipo</th> 
                                                <th>Precio</th> 
                                                <th>Cantidad</th> 
                                            </tr> 
                                        </thead> 
                                        <tbody> 
                                            <tr> 
                                                <td>Doble</td> 
                                                <td>65\'99</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_doble" name="select_doble">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </td>
                                            </tr> 
                                            <tr> 
                                                <td>Triple</td> 
                                                <td>95\'99</td>
                                                <td>
                                                    <select class="form-control input-lg input-style" id="select_triple" name="select_triple">
                                                        <option value="0">0</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                        <option value="10">10</option>
                                                    </select>
                                                </td>
                                            </tr> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row next">
                                <div class="col-sm-offset-10 col-sm-2">
                                    <button class="button btn-lg" style="text-align: center">Siguiente</button>
                                </div>
                            </div>
                    </form>
                </div>
            </section>';
    }

    private function print_introduce_info(){

    }

    private function print_confirm(){

    }

    private function print_summary(){

    }

    private function print_progress($step){
        switch ($step){
            case 'select_room':
                $one = 'active';
                $second = 'disabled';
                $third = 'disabled';
                $fourth = 'disabled';
                break;
            case 'introduce_info':
                $one = 'complete';
                $second = 'active';
                $third = 'disabled';
                $fourth = 'disabled';
                break;
            case 'confirm':
                $one = 'complete';
                $second = 'complete';
                $third = 'active';
                $fourth = 'disabled';
                break;
            case 'summary':
                $one = 'complete';
                $second = 'complete';
                $third = 'complete';
                $fourth = 'complete';
                break;
        }

        echo '
        <div class="container-fluid steps">
            <div class="row bs-wizard" style="border-bottom:0;">
                <div class="col-xs-3 bs-wizard-step '.$one.'">
                  <div class="text-center bs-wizard-stepnum">Selecciona tu habitación</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$second.'">
                  <div class="text-center bs-wizard-stepnum">Introduce tus datos</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$third.'">
                  <div class="text-center bs-wizard-stepnum">Confirmación</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
                
                <div class="col-xs-3 bs-wizard-step '.$fourth.'">
                  <div class="text-center bs-wizard-stepnum">Resguardo</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                </div>
            </div>
        </div>
        </div>
        ';
    }
}