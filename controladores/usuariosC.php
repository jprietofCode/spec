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

    /*=====================================
                PERFIL DE USUARIO
    ======================================*/
    static public function ctrMostrarPerfiles($item, $valor){
        $tabla = "perfiles";
        $respuesta = UsuariosModelo::mdlMostrarPerfiles($tabla, $item, $valor);
        return $respuesta;
    }
}