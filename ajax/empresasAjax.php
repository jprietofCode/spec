<?php
require_once "../controladores/empresasC.php";
require_once "../modelos/empresasM.php";

class AjaxEmpresas
{
    public $idEmpresa;

    public function ajaxEditarEmpresa()
    {
        $item = "id_empresas";
        $valor = $this->idEmpresa;
        $respuesta = EmpresasC::ctrMostrarEmpresas($item, $valor);
        echo json_encode($respuesta);
    }

    public $idCargo;

    public function ajaxEditarCargo()
    {
        $item = "id_cargos";
        $valor = $this->idCargo;
        $respuesta = EmpresasC::ctrMostrarCargos($item, $valor);
        echo json_encode($respuesta);
    }
}

if (isset($_POST["idEmpresa"])){
$tipoVehiculo = new AjaxEmpresas();
$tipoVehiculo ->idEmpresa = $_POST["idEmpresa"];
$tipoVehiculo -> ajaxEditarEmpresa();
}

if (isset($_POST["idCargo"])){
    $marcaVehiculo = new AjaxEmpresas();
    $marcaVehiculo ->idCargo = $_POST["idCargo"];
    $marcaVehiculo -> ajaxEditarCargo();
}
