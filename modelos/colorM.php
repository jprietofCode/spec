<?php
require_once "conexion.php";

class coloresM{
    //Crear Colores
    static public function mdlCrearColor($tabla, $dato){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_color) VALUES (:nombreColor)");
        $stmt->bindParam(":nombreColor", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;

    }
    //mostar color
    static public function mdlMostrarColor($tabla, $item, $valor){
        $resultado="";
        $stmt = "";

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