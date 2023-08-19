<?php
require_once "../controladores/destinosC.php";
require_once "../modelos/destinosM.php";

class AjaxDestinos{
    public $idDestinos;
    public function ajaxEditarDestino(){
        $item = "id_destino";
        $valor = $this->idDestinos;
        $respuesta = DestinosC::ctrMostrarDestino($item, $valor);
        echo json_encode($respuesta);

    }
}
if (isset($_POST["idDestino"])){
    $Destino = new AjaxDestinos();
    $Destino ->idDestinos = $_POST["idDestino"];
    $Destino -> ajaxEditarDestino();
}