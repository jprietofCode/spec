<?php
require_once "../controladores/personasC.php";
require_once "../modelos/personasM.php";

class AjaxPersonas{
    /*------------------------
     *      EDITAR VEHICULO
     --------------------------*/
    public $idPersona;
    public function ajaxEditarPersona(){
        $item = "id_personas";
        $valor = $this->idPersona;
        $respuesta = PersonasC::ctrMostrarPersonas($item, $valor);
        echo json_encode($respuesta);
    }

    public $idTipoPersona;
    public function ajaxEditarIdTipoPersona(){
        $item = "id_tipo_identificacion";
        $valor = $this->idTipoPersona;
        $respuesta = PersonasC::ctrMostrarIdPersona($item, $valor);
        echo json_encode($respuesta);

    }
    public $idGeneroPersona;
    public function ajaxEditarGeneroPersona(){
        $item = "id_genero";
        $valor = $this->idGeneroPersona;
        $respuesta = PersonasC::ctrMostrarGenero($item, $valor);
        echo json_encode($respuesta);
    }
}

if(isset($_POST["idPersona"])){
    $persona = new AjaxPersonas();
    $persona -> idPersona = $_POST["idPersona"];
    $persona -> ajaxEditarPersona();
}

if (isset($_POST["idTipoPersona"])){
    $tipoIdPersona = new AjaxPersonas();
    $tipoIdPersona ->idTipoPersona = $_POST["idTipoPersona"];
    $tipoIdPersona -> ajaxEditarIdTipoPersona();
}

if (isset($_POST["idGeneroPersona"])){
    $generoPersona = new AjaxPersonas();
    $generoPersona ->idGeneroPersona = $_POST["idGeneroPersona"];
    $generoPersona -> ajaxEditarGeneroPersona();
}