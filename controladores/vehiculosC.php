<?php

class vehiculosC{
    /*
     *  VEHICLE
     * */
    static public function ctrCrearVehiculo(){

    }

    static public function ctrMostarVehiculos($item, $valor){
        $tabla = "vehiculo";
        $respuesta = vehiculosM::mdlMostrarVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
    /*
     *  TYPE VEHICLE
     * */
    static public function ctrMostrarTipoVehiculo($item, $valor){
        $tabla = "tipo_vehiculo";
        $respuesta = vehiculosM::mdlMostrarTipoVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
    /*
    *  BRAND VEHICLE
    * */
    static public function ctrMostrarMarcaVehiculo($item, $valor){
        $tabla = "marca_vehiculo";
        $respuesta = vehiculosM::mdlMostrarTipoVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
    /*
     *  MODEL VEHICLE
     * */
    static public function ctrMostrarModeloVehiculo($item, $valor){
        $tabla = "modelo";
        $respuesta = vehiculosM::mdlMostrarTipoVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
}