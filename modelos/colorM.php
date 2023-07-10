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
    // Edit color
    static public function mdlEditarColor($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_color = :nombreColor WHERE id_color = :idColor");

        $stmt->bindParam(":idColor", $datos["id_Color"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreColor", $datos["nameColor"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }

    // DELETE COLOR
    static public function mdlEliminarColor($tabla, $datos){
        $resultado = "";
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_color = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            $resultado = "ok";
        }else{
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
}