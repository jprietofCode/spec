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
    // Editar vehiculo
    static public function mdleditarVehiculo($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET placa = :placa, tipo_vehiculo_id = :tipoVehiculo, marca_vehiculo_id = :marcaVehiculo, modelo_id = :modeloVehiculo, color_id = :color, anio = :anio WHERE id_vehiculo = :idVehiculo");

        $stmt->bindParam(":idVehiculo", $datos["id"], PDO::PARAM_INT);
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
        $resultado = "";
        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
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
    // Eliminar vehiculo
    static public function mdlEliminarVehiculo($tabla, $datos){
        $resultado = "";
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_vehiculo = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            $resultado = "ok";
        }else{
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;

    }
    /*-------------------------------
    *          TYPE VEHICLE
    *-------------------------------*/
    // Create tipo de vehiculo
    static public function mdlCrearTipoVehiculo($tabla, $dato){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_tipo_vehiculo) VALUES (:nombreTipoVehiculo)");
        $stmt->bindParam(":nombreTipoVehiculo", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
        
    }
    // Edit type vehicle
    static public function mdlEditarTipoVehiculo($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tipo_vehiculo = :nombreTipoVehiculo WHERE id_tipo_vehiculo = :idTipoVehiculo");

        $stmt->bindParam(":idTipoVehiculo", $datos["id_TipoVehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreTipoVehiculo", $datos["nameTipo_vehiculo"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    // Mostrar Tipó deVehiculo
    static public function mdlMostrarTipoVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
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
    // Eleminar tipo vehiculo
    static public function mdlEliminarTipoVehiculo($tabla, $datos){
        $resultado = "";
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_vehiculo = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            $resultado = "ok";
        }else{
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*-------------------------------
   *           BRAND VEHICLE
   *---------------------------------*/
    //Create new brand vehicle
    static public function mdlCrearMarcaVehiculo($tabla, $dato){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_marca) VALUES (:nombreMarcaVehiculo)");
        $stmt->bindParam(":nombreMarcaVehiculo", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;

    }
    // Edit Brand vehicle
    static public function mdlEditarMarcaVehiculo($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_marca = :nombreMarcaVehiculo WHERE id_marca_vehiculo = :idMarcaVehiculo");

        $stmt->bindParam(":idMarcaVehiculo", $datos["id_MarcaVehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreMarcaVehiculo", $datos["nameMarca_vehiculo"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }

    //Mostar marcas de vehiculo
    static public function mdlMostrarMarcaVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
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
    // ------- Eleminar Marca vehiculo -------
    static public function mdlEliminarMarcaVehiculo($tabla, $datos){
        $resultado = "";
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_marca_vehiculo = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);
        if($stmt -> execute()){
            $resultado = "ok";
        }else{
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }

    /*--------------------------
   *        MODEL VEHICLE
   *--------------------------*/
    //Crear nuevo modelo de vehiculo
    static public function mdlCrearModeloVehiculo($tabla, $dato){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_modelo) VALUES (:nombreModeloVehiculo)");
        $stmt->bindParam(":nombreModeloVehiculo", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;

    }
    // Edit Model vehicle
    static public function mdlEditarModeloVehiculo($tabla, $datos){
        $respuesta = "";
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_modelo = :nombreModeloVehiculo WHERE id_modelo = :idModeloVehiculo");

        $stmt->bindParam(":idModeloVehiculo", $datos["id_ModeloVehiculo"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreModeloVehiculo", $datos["nameModelo_vehiculo"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    // Mostar Modelo Vehiculo
    static public function mdlMostrarModeloVehiculo($tabla, $item, $valor){
        $resultado="";

        if($item != null){
            $stmt = ConexionDB::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
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

    // ------- Delete Model Vehicle -------
    static public function mdlEliminarModeloVehiculo($tabla, $datos){
        $resultado = "";
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_modelo = :id");
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