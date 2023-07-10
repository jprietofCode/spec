<?php
class vehiculosC
{
    /*--------------------------------
     *            VEHICLE
     *---------------------------------*/
    static public function ctrCrearVehiculo()
    {
        if (isset($_POST["placa"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["placa"]) && preg_match('/^[0-9]+$/', $_POST["yearVehiculo"])) {
                // La cadena es válida, cumple con los requisitos
                $tabla = "vehiculo";

                $datos = array("placa" => $_POST["placa"],
                    "tipo_vehiculo" => $_POST["tipoVehiculo"],
                    "marca_vehiculo" => $_POST["marcaVehiculo"],
                    "modelo_vehiculo" => $_POST["modeloVehiculo"],
                    "color_vehiculo" => $_POST["colorVehiculo"],
                    "year_vehiculo" => $_POST["yearVehiculo"]);
                $respuesta = vehiculosM::mdlIngresarVehiculo($tabla, $datos);
                // var_dump($respuesta);
                if ($respuesta == "ok") {
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
            } else {
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

    /*Editar vehiculo*/
    static public function ctrEditarVehiculo()
    {
        if (isset($_POST["edit_placa"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_placa"]) && preg_match('/^[0-9]+$/', $_POST["edit_yearVehiculo"])) {
                // La cadena es válida, cumple con los requisitos
                $tabla = "vehiculo";

                $datos = array(
                    "id" => $_POST["idVehiculo"],
                    "placa" => $_POST["edit_placa"],
                    "tipo_vehiculo" => $_POST["edit_tipoVehiculo"],
                    "marca_vehiculo" => $_POST["edit_marcaVehiculo"],
                    "modelo_vehiculo" => $_POST["edit_modeloVehiculo"],
                    "color_vehiculo" => $_POST["edit_colorVehiculo"],
                    "year_vehiculo" => $_POST["edit_yearVehiculo"]);
                $respuesta = vehiculosM::mdleditarVehiculo($tabla, $datos);
                //var_dump($respuesta);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El vehículo se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos";
                            }
                        });
                    </script>';
                }
            } else {
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

    // Mostrar Vehiculo
    static public function ctrMostarVehiculos($item, $valor)
    {
        $tabla = "vehiculo";
        $respuesta = vehiculosM::mdlMostrarVehiculo($tabla, $item, $valor);
        return $respuesta;
    }

    //Eliminar Vehiculo
    static public function ctrEliminarVehiculo()
    {
        if (isset($_GET["idVehiculo"])) {
            $tabla = "vehiculo";
            $datos = $_GET["idVehiculo"];
            $respuesta = vehiculosM::mdlEliminarVehiculo($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "El vehículo se ha eliminado correctamente!",
                        icon: "success",
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


    /*-----------------------------------
     *             TYPE VEHICLE
     * ---------------------------------*/
    //crar tipo vehiculo
    static public function ctrCrearTipoVehiculo()
    {
        if (isset($_POST["tipoVehiculo"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["tipoVehiculo"])) {
                $tabla = "tipo_vehiculo";
                $datos = $_POST["tipoVehiculo"];

                $respuesta = vehiculosM::mdlCrearTipoVehiculo($tabla, $datos);
                //var_dump($respuesta);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Tipo de vehículo se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=tipo-vehiculo";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "vehiculos?tab=tipo-vehiculo";
                            }
                        });
                </script>';
            }
        }
    }
    //Editar tipo vehiculo
    static public function ctrEditarTipoVehiculo()
    {
        if (isset($_POST["EditTipoVehicle"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["EditTipoVehicle"])) {
                $tabla = "tipo_vehiculo";
                $datos = array(
                    "id_TipoVehiculo" => $_POST["id_TipoVehiculo"],
                    "nameTipo_vehiculo" => $_POST["EditTipoVehicle"]);

                $respuesta = vehiculosM::mdlEditarTipoVehiculo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=tipo-vehiculo";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "vehiculos?tab=tipo-vehiculo";
                            }
                        });
                </script>';
            }
        }
    }
    // Mostrar Tipo vehiculo
    static public function ctrMostrarTipoVehiculo($item, $valor)
    {
        $tabla = "tipo_vehiculo";
        $respuesta = vehiculosM::mdlMostrarTipoVehiculo($tabla, $item, $valor);
        return $respuesta;
    }

    //Eliminar tipo vehiculo

    static public function ctrEliminarTipoVehiculo()
    {
        if (isset($_GET["idTipoVehiculo"])) {
            $tabla = "tipo_vehiculo";
            $datos = $_GET["idTipoVehiculo"];
            $respuesta = vehiculosM::mdlEliminarTipoVehiculo($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=tipo-vehiculo";
                            }
                        });
                    </script>';
            }

        }
    }
    /*------------------------------------
    *               BRAND VEHICLE
    *-------------------------------------*/
    // ------- Crear Marca vehiculo -------
    static public function ctrCrearMarcaVehiculo()
    {
        if (isset($_POST["marcaVehiculo"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["marcaVehiculo"])) {
                $tabla = "marca_vehiculo";
                $datos = $_POST["marcaVehiculo"];

                $respuesta = vehiculosM::mdlCrearMarcaVehiculo($tabla, $datos);
                //var_dump($respuesta);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "La marca del vehiculo se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=marcas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "vehiculos?tab=marcas";
                            }
                        });
                </script>';
            }
        }
    }

    // ------- Editar Marca vehiculo -------
    static public function ctrEditarMarcaVehiculo()
    {
        if (isset($_POST["EditMarcaVehiculo"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["EditMarcaVehiculo"])) {
                $tabla = "marca_vehiculo";
                $datos = array(
                    "id_MarcaVehiculo" => $_POST["id_MarcaVehiculo"],
                    "nameMarca_vehiculo" => $_POST["EditMarcaVehiculo"]);

                $respuesta = vehiculosM::mdlEditarMarcaVehiculo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=marcas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "vehiculos?tab=marcas";
                            }
                        });
                </script>';
            }
        }
    }

    // ----- Mostar Marca de Vehiculo -----
    static public function ctrMostrarMarcaVehiculo($item, $valor)
    {
        $tabla = "marca_vehiculo";
        $respuesta = vehiculosM::mdlMostrarMarcaVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
    // ----- Eliminar Marca de Vehiculo -----
    static public function ctrEliminarMarcaVehiculo()
    {
        if (isset($_GET["idMarcaVehiculo"])) {
            $tabla = "marca_vehiculo";
            $datos = $_GET["idMarcaVehiculo"];
            $respuesta = vehiculosM::mdlEliminarMarcaVehiculo($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=marcas";
                            }
                        });
                    </script>';
            }

        }
    }
    /*---------------------------------------
     *              MODEL VEHICLE
     *---------------------------------------*/
    // Crear Modelo vehiculo
    static public function ctrCrearModeloVehiculo(){
        if(isset($_POST["modeloVehiculo"])){
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["modeloVehiculo"])){
                $tabla = "modelo";
                $datos = $_POST["modeloVehiculo"];

                $respuesta = vehiculosM::mdlCrearModeloVehiculo($tabla, $datos);
                //var_dump($respuesta);
                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        title: "El modelo del vehiculo se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=modelos";
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
                                window.location.href = "vehiculos?tab=modelos";
                            }
                        });
                </script>';
            }
        }
    }
    // Editar modelo de vehiculo
    static public function ctrEditarModeloVehiculo()
    {
        if (isset($_POST["EditModeloVehicle"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["EditModeloVehicle"])) {
                $tabla = "modelo";
                $datos = array(
                    "id_ModeloVehiculo" => $_POST["id_ModeloVehiculo"],
                    "nameModelo_vehiculo" => $_POST["EditModeloVehicle"]);

                $respuesta = vehiculosM::mdlEditarModeloVehiculo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=modelos";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "vehiculos?tab=modelos";
                            }
                        });
                </script>';
            }
        }
    }
    //mostrar modelo vehiculo
    static public function ctrMostrarModeloVehiculo($item, $valor){
        $tabla = "modelo";
        $respuesta = vehiculosM::mdlMostrarModeloVehiculo($tabla, $item, $valor);
        return $respuesta;
    }
    // ----- Eliminar Modelo de Vehiculo -----
    static public function ctrEliminarModeloVehiculo()
    {
        if (isset($_GET["idModeloVehiculo"])) {
            $tabla = "modelo";
            $datos = $_GET["idModeloVehiculo"];
            $respuesta = vehiculosM::mdlEliminarModeloVehiculo($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=modelos";
                            }
                        });
                    </script>';
            }

        }
    }
}