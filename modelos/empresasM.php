<?php
require_once "conexion.php";

class EmpresaModelo{
    static public function mdlMostrarDatosEmpresa($tabla, $item, $valor){
        if($item !==null){
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
    static public function mdlCrearEmpresa($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_empresa) VALUES (:nombreEmpresa)");
        $stmt->bindParam(":nombreEmpresa", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Empresa*/
    static public function mdlEditarEmpresa($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_empresa = :nombreEmpresa WHERE id_empresas = :idEmpresa");

        $stmt->bindParam(":idEmpresa", $dato["idEmpresa"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreEmpresa", $dato["nombreEmpresa"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Empresa*/
    static public function mdlEliminarEmpresa($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_empresas = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*=================================
                CARGO
    ===================================*/
    static public function mdlCrearCargo($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_cargo) VALUES (:nombreCargo)");
        $stmt->bindParam(":nombreCargo", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Cargo*/
    static public function mdlEditarCargo($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_cargo = :nombreCargo WHERE id_cargos = :idCargo");

        $stmt->bindParam(":idCargo", $dato["idCargo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreCargo", $dato["nombreCargo"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Cargo*/
    static public function mdlEliminarCargo($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_cargos = :id");
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