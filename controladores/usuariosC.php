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
                    echo '<script>
                        window.location = "inicio";
                    </script>';
                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, Intentelo de nuevo</div>';
                }
            }
        }
    }
}