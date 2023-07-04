<?php
require_once "../controladores/colorC.php";
require_once "../modelos/colorM.php";

class AjaxColor{

    /*
     *  EDITAR COLOR
     * */
    public $idColor;
    public function ajaxEditarColor(){
        $item = "id_color";
        $valor = $this->idColor;
        $respuesta = colorC::ctrMostarColor($item, $valor);
        echo json_encode($respuesta);
    }
}
if (isset($_POST["idColor"])){
    $modeloVehiculo = new AjaxColor();
    $modeloVehiculo ->idColor = $_POST["idColor"];
    $modeloVehiculo -> ajaxEditarColor();
}