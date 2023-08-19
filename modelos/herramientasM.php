<?php
require_once ("conexion.php");

class ToolsModelo{
    /*SHOW DATA*/
    static public function mdlMostrarDatosTools($tabla, $item, $valor){
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
    /*CREATE TOOLS*/
    static public function mdlCrearTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla(nombre_tools, color_id, marca_herramienta_id, tipo_herramienta_id, funcion) VALUES (:nombreTools, :colorTools, :marcaTools, :tipoTools, :funcionTools)");
        $stmt->bindParam(":nombreTools", $dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*EDIT TOOLS*/
    static public function mdlEditarTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tools = :nombreTools, color_id = :colorTools, marca_herramienta_id = :marcaTools, tipo_herramienta_id = :tipoTools, funcion = :funcionTools WHERE id_herramientas = :idHerramienta");
        $stmt->bindParam(":idHerramienta",$dato["idTools"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreTools",$dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*DELETE TOOLS*/
    static public function mdlEliminarTools($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_herramientas = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*=====================================
                    TYPE TOOLS
     ======================================*/
    /*CREATE TYPE TOOLS*/
    static public function mdlCrearTypeTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla(nombre_tools, color_id, marca_herramienta_id, tipo_herramienta_id, funcion) VALUES (:nombreTools, :colorTools, :marcaTools, :tipoTools, :funcionTools)");
        $stmt->bindParam(":nombreTools", $dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*EDIT TOOLS*/
    static public function mdlEditarTypeTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tools = :nombreTools, color_id = :colorTools, marca_herramienta_id = :marcaTools, tipo_herramienta_id = :tipoTools, funcion = :funcionTools WHERE id_herramientas = :idHerramienta");
        $stmt->bindParam(":nombreTools",$dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*DELETE TOOLS*/
    static public function mdlEliminarTypeTools($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_herramientas = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*=====================================
                    BRAND TOOLS
     ======================================*/
    /*CREATE TOOLS*/
    static public function mdlCrearBrandTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla(nombre_tools, color_id, marca_herramienta_id, tipo_herramienta_id, funcion) VALUES (:nombreTools, :colorTools, :marcaTools, :tipoTools, :funcionTools)");
        $stmt->bindParam(":nombreTools", $dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*EDIT TOOLS*/
    static public function mdlEditarBrandTools($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tools = :nombreTools, color_id = :colorTools, marca_herramienta_id = :marcaTools, tipo_herramienta_id = :tipoTools, funcion = :funcionTools WHERE id_herramientas = :idHerramienta");
        $stmt->bindParam(":nombreTools",$dato["nombreHerramienta"], PDO::PARAM_STR);
        $stmt->bindParam(":colorTools", $dato["tipoHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":marcaTools", $dato["marcaHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":tipoTools", $dato["colorHerramienta"], PDO::PARAM_INT);
        $stmt->bindParam(":funcionTools", $dato["notaHerramienta"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*DELETE TOOLS*/
    static public function mdlEliminarBrandTools($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_herramientas = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*=====================================
              TIPO DE HERRAMIETAS
    ======================================*/
    static public function mdlCrearTipoHerramienta($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_tipo_herramienta) VALUES (:nombreTipoTools)");
        $stmt->bindParam(":nombreTipoTools", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Tipo Herramienta*/
    static public function mdlEditarTipoHerramienta($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tipo_herramienta = :nombreTipoHerramienta WHERE id_tipo_herramienta = :idTipoHerramienta");

        $stmt->bindParam(":idTipoHerramienta", $dato["idTipoTools"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreTipoHerramienta", $dato["nombreTipoTools"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Tipo Herramienta*/
    static public function mdlEliminarTipoHerramienta($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_herramienta = :id");
        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $resultado = "ok";
        } else {
            $resultado = "error";
        }
        $stmt = null;
        return $resultado;
    }
    /*=====================================
              MARCA DE HERRAMIETAS
    ======================================*/
    static public function mdlCrearMarcaHerramienta($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_herramienta) VALUES (:nombreMarcaHerramienta)");
        $stmt->bindParam(":nombreMarcaHerramienta", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Marca Herramienta*/
    static public function mdlEditarMarcaHerramienta($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_herramienta = :nombreMarcaHerramienta WHERE id_marca_herramienta = :idMarcaHerramienta");

        $stmt->bindParam(":idMarcaHerramienta", $dato["idMarcaTools"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreMarcaHerramienta", $dato["nombreMarcaTools"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Marca Herramienta*/
    static public function mdlEliminarMarcaHerramienta($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_marca_herramienta = :id");
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