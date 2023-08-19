<?php
require_once "conexion.php";

class PersonasModelo{
    /*CREAR PERSONAS*/
    static public function mdlCrearPersona($tabla, $dato){

        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla(nombres, apellidos, numero_id, tel_celular, telefono_fijo, email, cargo_id, empresa_id, tipo_identificacion_id, genero_id) VALUES (:nombreP, :apellidoP, :numIdP, :celP, :telP, :emailP, :cargoP, :empresaP, :tipoIdP, :generoP)");
        $stmt->bindParam(":nombreP", $dato["nombrePersona"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoP", $dato["apellPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":numIdP", $dato["numIdPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":celP", $dato["celPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":telP", $dato["telPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":emailP", $dato["emailPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":cargoP", $dato["cargoPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":empresaP", $dato["empresaPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoIdP", $dato["tipoId"], PDO::PARAM_STR);
        $stmt->bindParam(":generoP", $dato["generoPersona"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;

    }
    /*MOSTRAR PERSONAS*/
    static public function mdlMostrarPersonas($tabla, $item, $valor){
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
    /*EDITAR PERSONA*/
    static public function mdlEditarPersona($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombres = :nombreP, apellidos = :apellidoP, numero_id = :numIdP, tel_celular = :celP, telefono_fijo = :telP, email = :emailP, cargo_id = :cargoP, empresa_id = :empresaP, tipo_identificacion_id = :tipoIdP, genero_id = :generoP WHERE id_personas = :idPersona");

        $stmt->bindParam(":idPersona", $dato["idPerson"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreP", $dato["nombrePersona"], PDO::PARAM_STR);
        $stmt->bindParam(":apellidoP", $dato["apellPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":numIdP", $dato["numIdPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":celP", $dato["celPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":telP", $dato["telPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":emailP", $dato["emailPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":cargoP", $dato["cargoPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":empresaP", $dato["empresaPersona"], PDO::PARAM_STR);
        $stmt->bindParam(":tipoIdP", $dato["tipoId"], PDO::PARAM_STR);
        $stmt->bindParam(":generoP", $dato["generoPersona"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*BORRAR PERSONA*/
    static public function mdlEliminarPersona($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_personas = :id");
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
                    TYPE ID PERSONS
        ======================================*/
    static public function mdlCrearTipoIdPersona($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_tipo, definicion) VALUES (:nombreId, :defId)");
        $stmt->bindParam(":nombreId", $dato["tipoId"], PDO::PARAM_STR);
        $stmt->bindParam(":defId", $dato["defId"], PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*EDITAR TIPO ID PERSONA*/
    static public function mdlEditarIdPersona($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_tipo = :nombreId, definicion = :defId WHERE id_tipo_identificacion = :idTipoPersona");

        $stmt->bindParam(":idTipoPersona", $dato["idTipoPersona"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreId", $dato["tipoId"], PDO::PARAM_STR);
        $stmt->bindParam(":defId", $dato["defId"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*BORRAR TIPO ID PERSONA*/
    static public function mdlEliminarIdPersona($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_tipo_identificacion = :id");
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
                GENDER PERSONS
    ======================================*/
    static public function mdlCrearGeneroPersona($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("INSERT INTO $tabla (nombre_genero) VALUES (:nombreGenero)");
        $stmt->bindParam(":nombreGenero", $dato, PDO::PARAM_STR);
        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Editar Genero de Persona*/
    static public function mdlEditarGenero($tabla, $dato){
        $stmt = ConexionDB::conectar()->prepare("UPDATE $tabla SET nombre_genero = :nombreGenero WHERE id_genero = :idGenero");

        $stmt->bindParam(":idGenero", $dato["idGeneroP"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreGenero", $dato["nombreGeneroP"], PDO::PARAM_STR);

        if($stmt->execute()){
            $respuesta = "ok";
        }else{
            $respuesta = "error";
        }
        $stmt = null;
        return $respuesta;
    }
    /*Borrar Genero de Persona*/
    static public function mdlEliminarGenero($tabla, $datos)
    {
        $stmt = ConexionDB::conectar()->prepare("DELETE FROM $tabla WHERE id_genero = :id");
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