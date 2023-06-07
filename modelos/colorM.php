<?php
require_once "conexion.php";

class colorM{
    static public function mdlMostrarColor($tabla, $item, $valor){
        $resultado="";
        $stmt = "";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
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