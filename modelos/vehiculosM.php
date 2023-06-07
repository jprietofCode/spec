<?php
require_once "conexion.php";
class vehiculosM{
    /*
    *  VEHICLE
    * */
    static public function mdlMostrarVehiculo($tabla, $item, $valor){
        $resultado="";
        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
            $stmt = null;

        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
            $stmt = null;

        }
        return $resultado;
    }
    /*
    *  TYPE VEHICLE
    * */
    static public function mdlMostrarTipoVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
            $stmt = null;

        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
            $stmt = null;

        }
        return $resultado;
    }
    /*
   *  BRAND VEHICLE
   * */
    static public function mdlMostrarMarcaVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
            $stmt = null;

        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
            $stmt = null;

        }
        return $resultado;
    }

    /*
   *  MODEL VEHICLE
   * */
    static public function mdlMostrarModeloVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
            $stmt -> execute();
            $resultado = $stmt -> fetch();
            $stmt = null;

        }else{
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla");
            $stmt -> execute();
            $resultado = $stmt->fetchAll();
            $stmt = null;

        }
        return $resultado;
    }
}