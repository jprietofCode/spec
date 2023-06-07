<?php

class colorC{
    static public function ctrMostarColor($item, $valor){
        $tabla = "color";
        $respuesta = vehiculosM::mdlMostrarVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
}