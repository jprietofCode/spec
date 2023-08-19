<?php
require_once "../controladores/herramientasC.php";
require_once "../modelos/herramientasM.php";

class AjaxTools{
    /*------------------------
     *      EDIT TOOLS
     --------------------------*/
    public $idTools;
    public function ajaxEditarTools(){
        $item = "id_herramientas";
        $valor = $this->idTools;
        $respuesta = ToolsC::ctrMostrarHerramientas($item, $valor);
        echo json_encode($respuesta);
    }

    public $idTipoTools;
    public function ajaxEditarTipoTools(){
        $item = "id_tipo_herramienta";
        $valor = $this->idTipoTools;
        $respuesta = ToolsC::ctrMostrarTipoHerramientas($item, $valor);
        echo json_encode($respuesta);

    }
    public $idMarcaTools;
    public function ajaxEditarMarcaTools(){
        $item = "id_marca_herramienta";
        $valor = $this->idMarcaTools;
        $respuesta = ToolsC::ctrMostrarMarcaHerramientas($item, $valor);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["idTools"])){
    $herramienta = new AjaxTools();
    $herramienta -> idTools = $_POST["idTools"];
    $herramienta -> ajaxEditarTools();
}

if (isset($_POST["idTipoTools"])){
    $tipoHerramienta = new AjaxTools();
    $tipoHerramienta ->idTipoTools = $_POST["idTipoTools"];
    $tipoHerramienta -> ajaxEditarTipoTools();
}

if (isset($_POST["idMarcaTools"])){
    $marcaTools = new AjaxTools();
    $marcaTools ->idMarcaTools = $_POST["idMarcaTools"];
    $marcaTools -> ajaxEditarMarcaTools();
}