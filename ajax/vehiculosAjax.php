<?php
require_once "../controladores/vehiculosC.php";
require_once "../modelos/vehiculosM.php";

class AjaxVehiculos{
    /*------------------------
     *      EDITAR VEHICULO
     --------------------------*/
    public $idVehiculo;
    public function ajaxEditarVehiculo(){
        $item = "id_vehiculo";
        $valor = $this->idVehiculo;
        $respuesta = vehiculosC::ctrMostarVehiculos($item, $valor);
        echo json_encode($respuesta);
    }

    public $idTipoVehiculo;
    public function ajaxEditarTipoVehiculo(){
        $item = "id_tipo_vehiculo";
        $valor = $this->idTipoVehiculo;
        $respuesta = vehiculosC::ctrMostrarTipoVehiculo($item, $valor);
        echo json_encode($respuesta);

    }
    public $idMarcaVehiculo;
    public function ajaxEditarMarcaVehiculo(){
        $item = "id_marca_vehiculo";
        $valor = $this->idMarcaVehiculo;
        $respuesta = vehiculosC::ctrMostrarMarcaVehiculo($item, $valor);
        echo json_encode($respuesta);
    }

    public $idModeloVehiculo;
    public function ajaxEditarModeloVehiculo(){
        $item = "id_modelo";
        $valor = $this->idModeloVehiculo;
        $respuesta = vehiculosC::ctrMostrarModeloVehiculo($item, $valor);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["idVehiculo"])){
    $vehiculo = new AjaxVehiculos();
    $vehiculo -> idVehiculo = $_POST["idVehiculo"];
    $vehiculo -> ajaxEditarVehiculo();
}

if (isset($_POST["idTipoVehiculo"])){
    $tipoVehiculo = new AjaxVehiculos();
    $tipoVehiculo ->idTipoVehiculo = $_POST["idTipoVehiculo"];
    $tipoVehiculo -> ajaxEditarTipoVehiculo();
}

if (isset($_POST["idMarcaVehiculo"])){
    $marcaVehiculo = new AjaxVehiculos();
    $marcaVehiculo ->idMarcaVehiculo = $_POST["idMarcaVehiculo"];
    $marcaVehiculo -> ajaxEditarMarcaVehiculo();
}
if (isset($_POST["idModeloVehiculo"])){
    $modeloVehiculo = new AjaxVehiculos();
    $modeloVehiculo ->idModeloVehiculo = $_POST["idModeloVehiculo"];
    $modeloVehiculo -> ajaxEditarModeloVehiculo();
}