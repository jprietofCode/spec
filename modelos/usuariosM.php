<?php
require_once "conexion.php";

class UsuariosModelo{
    static public function mdlMostrarUsuarios($tabla, $item, $valor){
        $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt -> execute();
        if($stmt->rowCount() == 0){
            $resultado = false;
        }else{
            $resultado = $stmt->fetch();
        }
        $stmt = null;
        return $resultado;
    }
}