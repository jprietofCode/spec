<?php
class PersonasC{
    /*=====================================
                PERSONS
    ======================================*/
    static public function ctrMostrarPersonas($item, $valor){
        $tabla = "personas";
        $respuesta = PersonasModelo::mdlMostrarPersonas($tabla, $item, $valor);
        return $respuesta;
    }
}