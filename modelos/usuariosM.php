<?php
require_once "conexion.php";
/*=================================
            USUARIOS
===================================*/

// mostrar usuarios
class UsuariosModelo{
    static public function mdlMostrarUsuarios($tabla, $item, $valor){
        if($item !=null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            if($stmt->rowCount() == 0){
                $resultado = false;
            }else{
                $resultado = $stmt->fetch();
            }
        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
        }

        $stmt = null;
        return $resultado;
    }
    /*Create new user*/
    static public function mdlCrearUsuario($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_usuario, contrasena, perfil_id, persona_id) VALUES (:nombreUsuario, :passUsuario, :perfilUsuario, :personaUsuario)");
        $stmt->bindParam(":nombreUsuario", $dato["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":passUsuario", $dato["passUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":perfilUsuario", $dato["perfilUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":personaUsuario", $dato["persona"], PDO::PARAM_INT);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    static public function mdlEditarUsuario($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_usuario = :nombreUsuario, contrasena = :passUsuario, perfil_id = :perfilUsuario, persona_id = :personaUsuario WHERE id_usuario = :idUsuario");

        $stmt->bindParam(":idUsuario", $dato["idUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreUsuario", $dato["nombreUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":passUsuario", $dato["passUsuario"], PDO::PARAM_STR);
        $stmt->bindParam(":perfilUsuario", $dato["perfilUsuario"], PDO::PARAM_INT);
        $stmt->bindParam(":personaUsuario", $dato["persona"], PDO::PARAM_INT);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Usuario*/
    static public function mdlEliminarUsuario($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    //actualizar estado Usuario
    static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
        $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
        $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        if($stmt -> execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*=================================
            PERFIL USUARIO
    ===================================*/
    static public function mdlMostrarPerfiles($tabla, $item, $valor){
        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
        }
        $stmt = null;
        return $resultado;
    }
    static public function mdlCrearPerfil($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_perfil) VALUES (:nombrePerfil)");
        $stmt->bindParam(":nombrePerfil", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Perfil*/
    static public function mdlEditarPerfil($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_perfil = :nombrePerfil WHERE id_perfil = :idPerfil");

        $stmt->bindParam(":idPerfil", $dato["idPerfil"], PDO::PARAM_INT);
        $stmt->bindParam(":nombrePerfil", $dato["nombrePerfil"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Perfil*/
    static public function mdlEliminarPerfil($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_perfil = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
}