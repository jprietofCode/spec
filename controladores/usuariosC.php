<?php

class UsuariosC{
    /*=====================================
                INGRESO DE USUARIO
    ======================================*/

    static public function ctrIngresoUsuario(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[A-Za-z0-9]+$/', $_POST["ingUsuario"]) &&
            preg_match('/^[A-Za-z0-9]+$/', $_POST["ingPassword"])){
                $tabla = "usuarios";
                $item = "nombre_usuario";
                $valor = $_POST["ingUsuario"];
                $respuesta = UsuariosModelo::mdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta && $respuesta["nombre_usuario"] == $_POST["ingUsuario"] && $respuesta["contrasena"] == $_POST["ingPassword"]){
                    if($respuesta["estado"] == 1){
                        $_SESSION['iniciarSesion'] = 'ok';
                        $tabla1 = "perfiles";
                        $item1 = "id_perfil";
                        $valor1 = $respuesta["perfil_id"];
                        $perfilUsuario = UsuariosModelo::mdlMostrarPerfiles($tabla1, $item1, $valor1);
                        $_SESSION['rol'] = $perfilUsuario["nombre_perfil"];
                        echo '<script>
                        window.location = "inicio";
                        </script>';
                    }else{
                        echo '<br><div class="alert alert-danger">El usuario aún no está activado</div>';
                    }

                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, Intentelo de nuevo</div>';
                }
            }
        }
    }
    /*=====================================
            CRUD DE USUARIO
======================================*/
    //show users
    static public function ctrMostrarUsuarios($item, $valor){
        $tabla = "usuarios";
        $respuesta = UsuariosModelo::mdlMostrarPerfiles($tabla, $item, $valor);
        return $respuesta;
    }
    /*Create new user*/
    static public function ctrCrearUsuario(){
        if (isset($_POST["nameUser"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nameUser"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["passwordUser"])) {
                $tabla = "usuarios";
                $datos = array(
                    "nombreUsuario" => $_POST["nameUser"],
                    "passUsuario" => $_POST["passwordUser"],
                    "perfilUsuario" => $_POST["tipoPerfilUser"],
                    "persona" => $_POST["personasID"]);

                $respuesta = UsuariosModelo::mdlCrearUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Usuario se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios?tab=usuarios";
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
                                window.location.href = "usuarios?tab=usuarios";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR USUARIO*/
    static public function ctrEditarUsuario(){
        if (isset($_POST["edit_nameUser"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nameUser"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_passwordUser"])) {
                $tabla = "usuarios";
                $datos = array(
                    "idUsuario" => $_POST["id_Usuario"],
                    "nombreUsuario" => $_POST["edit_nameUser"],
                    "passUsuario" => $_POST["edit_passwordUser"],
                    "perfilUsuario" => $_POST["edit_tipoPerfilUser"],
                    "persona" => $_POST["edit_personasID"]);
                $respuesta = UsuariosModelo::mdlEditarUsuario($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios";
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
                                window.location = "usuarios";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR USUARIO*/
    static public function ctrEliminarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            $tabla = "usuarios";
            $datos = $_GET["idUsuario"];
            $respuesta = UsuariosModelo::mdlEliminarUsuario($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "El usuario se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios";
                            }
                        });
                    </script>';
            }

        }
    }

    /*=====================================
                PERFIL DE USUARIO
    ======================================*/
    /*Mostrar Perfil de usuarios*/
    static public function ctrMostrarPerfiles($item, $valor){
        $tabla = "perfiles";
        $respuesta = UsuariosModelo::mdlMostrarPerfiles($tabla, $item, $valor);
        return $respuesta;
    }
    /*Crear nuevo perfil*/
    static public function ctrCrearPerfil(){
        if (isset($_POST["nombPerfil"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombPerfil"])) {
                $tabla = "perfiles";
                $datos = $_POST["nombPerfil"];

                $respuesta = UsuariosModelo::mdlCrearPerfil($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Perfil se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios?tab=perfiles";
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
                                window.location.href = "usuarios?tab=perfiles";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR PERFIL*/
    static public function ctrEditarPerfil(){
        if (isset($_POST["edit_nombPerfil"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombPerfil"])) {
                $tabla = "perfiles";
                $datos = array(
                    "idPerfil" => $_POST["id_Perfil"],
                    "nombrePerfil" => $_POST["edit_nombPerfil"]);
                $respuesta = UsuariosModelo::mdlEditarPerfil($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios?tab=perfiles";
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
                                window.location = "usuarios?tab=perfiles";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR PERFIL*/
    static public function ctrEliminarPerfil()
    {
        if (isset($_GET["idPerfil"])) {
            $tabla = "perfiles";
            $datos = $_GET["idPerfil"];
            $respuesta = UsuariosModelo::mdlEliminarPerfil($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "usuarios?tab=perfiles";
                            }
                        });
                    </script>';
            }

        }
    }
}