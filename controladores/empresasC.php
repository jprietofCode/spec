<?php
class EmpresasC{
    /*=====================================
                EMPRESAS
    ======================================*/
    static public function ctrMostrarEmpresas($item, $valor){
        $tabla = "empresas";
        $respuesta = EmpresaModelo::mdlMostrarDatosEmpresa($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrCrearEmpresa(){
        if (isset($_POST["nombEmpresa"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombEmpresa"])) {
                $tabla = "empresas";
                $datos = $_POST["nombEmpresa"];

                $respuesta = EmpresaModelo::mdlCrearEmpresa($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "La empresa se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=empresas";
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
                                window.location.href = "empresas?tab=empresas";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR EMPRESA*/
    static public function ctrEditarEmpresa(){
        if (isset($_POST["edit_nombEmpresa"])) {
            if (preg_match('/^[A-Za-z]+$/', $_POST["edit_nombEmpresa"])) {
                $tabla = "empresas";
                $datos = array(
                    "idEmpresa" => $_POST["id_Empresa"],
                    "nombreEmpresa" => $_POST["edit_nombEmpresa"]);
                $respuesta = EmpresaModelo::mdlEditarEmpresa($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=empresas";
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
                                window.location = "empresas?tab=empresas";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR EMPRESAS*/
    static public function ctrEliminarEmpresa()
    {
        if (isset($_GET["idEmpresa"])) {
            $tabla = "empresas";
            $datos = $_GET["idEmpresa"];
            $respuesta = EmpresaModelo::mdlEliminarEmpresa($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=empresas";
                            }
                        });
                    </script>';
            }

        }
    }
    /*=====================================
                CARGOS
    ======================================*/
    static public function ctrMostrarCargos($item, $valor){
        $tabla = "cargos";
        $respuesta = EmpresaModelo::mdlMostrarDatosEmpresa($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrCrearCargo(){
        if (isset($_POST["nombCargo"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombCargo"])) {
                $tabla = "cargos";
                $datos = $_POST["nombCargo"];

                $respuesta = EmpresaModelo::mdlCrearCargo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Cargo se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=cargos";
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
                                window.location.href = "empresas?tab=cargos";
                            }
                        });
                </script>';
            }
        }
    }
/*EDITAR CARGO*/
    static public function ctrEditarCargo(){
        if (isset($_POST["edit_nombCargo"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombCargo"])) {
                $tabla = "cargos";
                $datos = array(
                    "idCargo" => $_POST["id_Cargo"],
                    "nombreCargo" => $_POST["edit_nombCargo"]);
                $respuesta = EmpresaModelo::mdlEditarCargo($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=cargos";
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
                                window.location = "empresas?tab=cargos";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR CARGO*/
    static public function ctrEliminarCargo()
    {
        if (isset($_GET["idCargo"])) {
            $tabla = "cargos";
            $datos = $_GET["idCargo"];
            $respuesta = EmpresaModelo::mdlEliminarCargo($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "empresas?tab=cargos";
                            }
                        });
                    </script>';
            }

        }
    }
}