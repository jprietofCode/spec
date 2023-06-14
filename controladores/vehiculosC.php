<?php

class vehiculosC{
    /*
     *  VEHICLE
     * */
    static public function ctrCrearVehiculo(){
        if(isset($_POST["placa"])){
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["placa"]) && preg_match('/^[0-9]+$/', $_POST["yearVehiculo"])) {
                // La cadena es válida, cumple con los requisitos
                $tabla = "vehiculo";

                $datos = array("placa" => $_POST["placa"],
                    "tipo_vehiculo" =>  $_POST["tipoVehiculo"],
                    "marca_vehiculo" =>  $_POST["marcaVehiculo"],
                    "modelo_vehiculo" =>  $_POST["modeloVehiculo"],
                    "color_vehiculo" =>  $_POST["colorVehiculo"],
                    "year_vehiculo" =>  $_POST["yearVehiculo"]);
                $respuesta = vehiculosM::mdlIngresarVehiculo($tabla, $datos);
                var_dump($respuesta);
                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        title: "El vehículo se ha guardado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos";
                            }
                        });
                    </script>';
                }
            }else{
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos";
                            }
                        });
                </script>';
            }
        }
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