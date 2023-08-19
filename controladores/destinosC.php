<?php
class DestinosC{
    /*=====================================
            TYPE ID PERSONS
======================================*/
    static public function ctrMostrarDestino($item, $valor){
        $tabla = "destinos";
        $respuesta = DestinosModelo::mdlMostrarDestino($tabla, $item, $valor);
        return $respuesta;

    }
    static public function ctrCrearDestino(){
        if (isset($_POST["nombDestino"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombDestino"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["defDestino"])) {
                $tabla = "destinos";
                $datos = array(
                    "nombreDestino" => $_POST["nombDestino"],
                    "descDestino" => $_POST["defDestino"]);

                $respuesta = DestinosModelo::mdlCrearDestino($tabla, $datos);
                //var_dump($respuesta);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El destino se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "destinos";
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
                                window.location = "destinos";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR DESTINO*/
    static public function ctrEditarDestino(){
        if (isset($_POST["edit_nombDestino"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombDestino"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_defDestino"])) {
                $tabla = "destinos";
                $datos = array(
                    "idDestino" => $_POST["id_Destino"],
                    "nombreDestino" => $_POST["edit_nombDestino"],
                    "descDestino" => $_POST["edit_defDestino"]);
                $respuesta = DestinosModelo::mdlEditarDestino($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "destinos";
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
                                window.location = "destinos";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR DESTINO*/
    static public function ctrEliminarDestino()
    {
        if (isset($_GET["idDestino"])) {
            $tabla = "destinos";
            $datos = $_GET["idDestino"];
            $respuesta = DestinosModelo::mdlEliminarDestino($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "destinos";
                            }
                        });
                    </script>';
            }

        }
    }
}