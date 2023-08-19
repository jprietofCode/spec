<?php
require_once "../controladores/usuariosC.php";
require_once "../modelos/usuariosM.php";

class AjaxUsuarios{
    /*=====================
        ACTIVAR USUARIO
     ====================*/
    public $activarUsuario;
    public $activarId;
    public function ajaxActivarUsuario(){
        $tabla = "usuarios";
        $item1 = "estado";
        $valor1 = $this->activarUsuario;
        $item2 = "id_usuario";
        $valor2 = $this->activarId;
        $respuesta = UsuariosModelo::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);
    }
    /*==================
    EDIT - USER
    ====================*/
    public $idUsuario;

    public function ajaxEditarUsuario()
    {
        $item = "id_usuario";
        $valor = $this->idUsuario;
        $respuesta = UsuariosC::ctrMostrarUsuarios($item, $valor);
        echo json_encode($respuesta);
    }
    /*==================
    EDIT - PERFIL USUARIO
    ====================*/
    public $idPerfil;

    public function ajaxEditarPerfil()
    {
        $item = "id_perfil";
        $valor = $this->idPerfil;
        $respuesta = UsuariosC::ctrMostrarPerfiles($item, $valor);
        echo json_encode($respuesta);
    }
}
/*==================
    ACTIVAR USUARIO
====================*/
if(isset($_POST["activarUsuario"])){
    $activarUsuario = new AjaxUsuarios();
    $activarUsuario -> activarUsuario = $_POST["activarUsuario"];
    $activarUsuario -> activarId = $_POST["activarId"];
    $activarUsuario -> ajaxActivarUsuario();
}
/*==================
    EDITAR USER
====================*/
if(isset($_POST["idUsuario"])){
    $perfilUsuario = new AjaxUsuarios();
    $perfilUsuario -> idUsuario = $_POST["idUsuario"];
    $perfilUsuario -> ajaxEditarUsuario();
}
/*==================
    EDITAR PERFIL USUARIO
====================*/
if(isset($_POST["idPerfil"])){
    $perfilUsuario = new AjaxUsuarios();
    $perfilUsuario -> idPerfil = $_POST["idPerfil"];
    $perfilUsuario -> ajaxEditarPerfil();
}