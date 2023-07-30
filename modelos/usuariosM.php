<?php
require_once "conexion.php";

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
}