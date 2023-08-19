<?php
class ToolsC{
    /*=====================================
                HERRAMIENTAS
    ======================================*/
    /*SHOW TOOLS*/
    static public function ctrMostrarHerramientas($item, $valor){
        $tabla = "herramientas";
        $respuesta = ToolsModelo::mdlMostrarDatosTools($tabla, $item, $valor);
        return $respuesta;
    }
    /*CRATE TOOLS*/
    static public function ctrCrearTools(){
        if (isset($_POST["nombTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombTools"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["funcionTools"])) {
                $tabla = "herramientas";
                $datos = array(
                    "nombreHerramienta" => $_POST["nombTools"],
                    "tipoHerramienta" => $_POST["tipoTools"],
                    "marcaHerramienta" => $_POST["marcaTools"],
                    "colorHerramienta" => $_POST["colorTools"],
                    "notaHerramienta" => $_POST["funcionTools"]);

                $respuesta = ToolsModelo::mdlCrearTools($tabla,$datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=herramientas";
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
                                window.location.href = "herramientas?tab=herramientas";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDIT TOOLS*/
    static public function ctrEditarTools(){
        if (isset($_POST["edit_nombTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombTools"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_funcionTools"])) {
                $tabla = "herramientas";
                $datos = array(
                    "idTools" => $_POST["id_Herramienta"],
                    "nombreHerramienta" => $_POST["edit_nombTools"],
                    "tipoHerramienta" => $_POST["edit_tipoTools"],
                    "marcaHerramienta" => $_POST["edit_marcaTools"],
                    "colorHerramienta" => $_POST["edit_colorTools"],
                    "notaHerramienta" => $_POST["edit_funcionTools"]);
                $respuesta = ToolsModelo::mdlEditarTools($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=herramientas";
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
                                window.location = "herramientas?tab=herramientas";
                            }
                        });
                </script>';
            }
        }
    }
    /*DELETE TOOLS*/
    static public function ctrEliminarTools()
    {
        if (isset($_GET["idHerramienta"])) {
            $tabla = "herramientas";
            $datos = $_GET["idHerramienta"];
            $respuesta = ToolsModelo::mdlEliminarTools($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=herramientas";
                            }
                        });
                    </script>';
            }

        }
    }
    /*=====================================
              TIPO DE HERRAMIETAS
    ======================================*/
    static public function ctrMostrarTipoHerramientas($item, $valor){
        $tabla = "tipo_herramienta";
        $respuesta = ToolsModelo::mdlMostrarDatosTools($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrCrearTipoHerramienta(){
        if (isset($_POST["nombTipoTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombTipoTools"])) {
                $tabla = "tipo_herramienta";
                $datos = $_POST["nombTipoTools"];

                $respuesta = ToolsModelo::mdlCrearTipoHerramienta($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=tipo-tools";
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
                                window.location.href = "herramientas?tab=tipo-tools";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR TIPO HERRAMIENTA*/
    static public function ctrEditarTipoHerramienta(){
        if (isset($_POST["edit_nombTipoTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombTipoTools"])) {
                $tabla = "tipo_herramienta";
                $datos = array(
                    "idTipoTools" => $_POST["id_TipoHerramienta"],
                    "nombreTipoTools" => $_POST["edit_nombTipoTools"]);
                $respuesta = ToolsModelo::mdlEditarTipoHerramienta($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=tipo-tools";
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
                                window.location = "herramientas?tab=tipo-tools";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR TIPO HERRAMIENTA*/
    static public function ctrEliminarTipoHerramienta()
    {
        if (isset($_GET["idTipoHerramienta"])) {
            $tabla = "tipo_herramienta";
            $datos = $_GET["idTipoHerramienta"];
            $respuesta = ToolsModelo::mdlEliminarTipoHerramienta($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=tipo-tools";
                            }
                        });
                    </script>';
            }

        }
    }
    /*=====================================
            MARCA DE HERRAMIENTAS
    ======================================*/
    static public function ctrMostrarMarcaHerramientas($item, $valor){
        $tabla = "marca_herramienta";
        $respuesta = ToolsModelo::mdlMostrarDatosTools($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrCrearMarcaHerramienta(){
        if (isset($_POST["marcaTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["marcaTools"])) {
                $tabla = "marca_herramienta";
                $datos = $_POST["marcaTools"];

                $respuesta = ToolsModelo::mdlCrearMarcaHerramienta($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=marca-tools";
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
                                window.location.href = "herramientas?tab=marca-tools";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR MARCA HERRAMIENTA*/
    static public function ctrEditarMarcaHerramienta(){
        if (isset($_POST["editMarcaTools"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["editMarcaTools"])) {
                $tabla = "marca_herramienta";
                $datos = array(
                    "idMarcaTools" => $_POST["id_MarcaTools"],
                    "nombreMarcaTools" => $_POST["editMarcaTools"]);
                $respuesta = ToolsModelo::mdlEditarMarcaHerramienta($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=marca-tools";
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
                                window.location = "herramientas?tab=marca-tools";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR MARCA HERRAMIENTA*/
    static public function ctrEliminarMarcaHerramienta()
    {
        if (isset($_GET["idMarcaHerramienta"])) {
            $tabla = "marca_herramienta";
            $datos = $_GET["idMarcaHerramienta"];
            $respuesta = ToolsModelo::mdlEliminarMarcaHerramienta($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "herramientas?tab=marca-tools";
                            }
                        });
                    </script>';
            }

        }
    }
}