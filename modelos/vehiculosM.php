<?php
require_once "conexion.php";
class vehiculosM{
    /*
    *  VEHICLE
    * */
    static public function mdlIngresarVehiculo($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla(placa, tipo_vehiculo_id, marca_vehiculo_id, modelo_id, color_id, anio) VALUES (:placa, :tipoVehiculo, :marcaVehiculo, :modeloVehiculo, :color, :anio)");

        $stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoVehiculo", $datos["tipo_vehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaVehiculo", $datos["marca_vehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":modeloVehiculo", $datos["modelo_vehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":color", $datos["color_vehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":anio", $datos["year_vehiculo"], PDO::PARAM_INT);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
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