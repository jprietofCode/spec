<?php
require_once "conexion.php";

class DestinosModelo{
    static public function mdlMostrarDestino($tabla, $item, $valor){
        if($item !=null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":".$item, $valor, PDO::PARAM_INT);
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
    /*Crear Destino*/
    static public function mdlCrearDestino($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_area, funcion) VALUES (:nombreDestino, :defDestino)");
        $stmt->bindParam(":nombreDestino", $dato["nombreDestino"], PDO::PARAM_STR);
        $stmt->bindParam(":defDestino", $dato["descDestino"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*EDITAR DESTINO*/
    static public function mdlEditarDestino($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_area = :nombreDestino, funcion = :defDestino WHERE id_destino = :idDestino");

        $stmt->bindParam(":idDestino", $dato["idDestino"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreDestino", $dato["nombreDestino"], PDO::PARAM_STR);
        $stmt->bindParam(":defDestino", $dato["descDestino"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*BORRAR DESTINO*/
    static public function mdlEliminarDestino($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_destino = :id");
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