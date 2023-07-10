<?php

class colorC{
    // Crear Color
    static public function ctrCrearColor(){
        if(isset($_POST["newColor"])){
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["newColor"])){
                $tabla = "color";
                $datos = $_POST["newColor"];

                $respuesta = coloresM::mdlCrearColor($tabla, $datos);
                //var_dump($respuesta);
                if($respuesta == "ok"){
                    echo '<script>
                    swal({
                        title: "El color se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=colores";
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
                                window.location.href = "vehiculos?tab=colores";
                            }
                        });
                </script>';
            }
        }
    }
    //mostrar color
    static public function ctrMostarColor($item, $valor){
        $tabla = "color";
        $respuesta = coloresM::mdlMostrarColor($tabla, $item, $valor);
        return $respuesta;
    }
    // Editar Color
    static public function ctrEditarColor(){
        if (isset($_POST["EditColor"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["EditColor"])) {
                $tabla = "color";
                $datos = array(
                    "id_Color" => $_POST["id_Color"],
                    "nameColor" => $_POST["EditColor"]);

                $respuesta = coloresM::mdlEditarColor($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=colores";
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
                                window.location.href = "vehiculos?tab=colores";
                            }
                        });
                </script>';
            }
        }
    }
    // Delete color
    static public function ctrEliminarColor(){
        if (isset($_GET["idColor"])) {
            $tabla = "color";
            $datos = $_GET["idColor"];
            $respuesta = coloresM::mdlEliminarColor($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "vehiculos?tab=colores";
                            }
                        });
                    </script>';
            }

        }
    }
}