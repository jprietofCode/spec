<?php
class PersonasC{
    /*=====================================
                PERSONS
    ======================================*/
    /*SHOW PERSONS*/
    static public function ctrMostrarPersonas($item, $valor){
        $tabla = "personas";
        $respuesta = PersonasModelo::mdlMostrarPersonas($tabla, $item, $valor);
        return $respuesta;
    }
    /*Create new person*/
    static public function ctrCrearPersona()
    {
        if (isset($_POST["numIdPersona"])) {
            if (preg_match('/^[0-9]+$/', $_POST["numIdPersona"]) && preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["nombPersona"]) && preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["apellPersona"]) && preg_match('/^[0-9]+$/', $_POST["celPersona"]) && preg_match('/^[0-9]+|no tiene+$/', $_POST["telPersona"]) && preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}|(no tiene)+$/', $_POST["emailPersona"])) {
                // La cadena es válida, cumple con los requisitos
                $tabla = "personas";

                $datos = array("tipoId" => $_POST["tipoIdPersona"],
                    "numIdPersona" => $_POST["numIdPersona"],
                    "nombrePersona" => $_POST["nombPersona"],
                    "apellPersona" => $_POST["apellPersona"],
                    "celPersona" => $_POST["celPersona"],
                    "telPersona" => $_POST["telPersona"],
                    "emailPersona" => $_POST["emailPersona"],
                    "generoPersona" => $_POST["generoPersona"],
                    "empresaPersona" => $_POST["empresaPersona"],
                    "cargoPersona" => $_POST["cargoPersona"]);
                $respuesta = PersonasModelo::mdlCrearPersona($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se has creado la persona correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR PERSONA*/
    static public function ctrEditarPersona(){
        if (isset($_POST["edit_numIdPersona"])) {
            if (preg_match('/^[0-9]+$/', $_POST["edit_numIdPersona"]) && preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_nombPersona"]) && preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_apellPersona"]) && preg_match('/^[0-9]+$/', $_POST["edit_celPersona"]) && preg_match('/^[0-9]+|no tiene+$/', $_POST["edit_telPersona"]) && preg_match('/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,6}|(no tiene)+$/', $_POST["edit_emailPersona"])) {
                // La cadena es válida, cumple con los requisitos
                $tabla = "personas";

                $datos = array(
                    "idPerson" => $_POST["idPersona"],
                    "tipoId" => $_POST["edit_tipoIdPersona"],
                    "numIdPersona" => $_POST["edit_numIdPersona"],
                    "nombrePersona" => $_POST["edit_nombPersona"],
                    "apellPersona" => $_POST["edit_apellPersona"],
                    "celPersona" => $_POST["edit_celPersona"],
                    "telPersona" => $_POST["edit_telPersona"],
                    "emailPersona" => $_POST["edit_emailPersona"],
                    "generoPersona" => $_POST["edit_generoPersona"],
                    "empresaPersona" => $_POST["edit_empresaPersona"],
                    "cargoPersona" => $_POST["edit_cargoPersona"]);
                $respuesta = PersonasModelo::mdlEditarPersona($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado la persona correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR PERSONA*/
    static public function ctrEliminarPersona()
    {
        if (isset($_GET["idPersona"])) {
            $tabla = "personas";
            $datos = $_GET["idPersona"];
            $respuesta = PersonasModelo::mdlEliminarPersona($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "La persona se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas";
                            }
                        });
                    </script>';
            }

        }
    }

    /*=====================================
                TYPE ID PERSONS
    ======================================*/
    static public function ctrMostrarIdPersona($item, $valor){
        $tabla = "tipo_identificacion";
        $respuesta = PersonasModelo::mdlMostrarPersonas($tabla, $item, $valor);
        return $respuesta;

    }
    static public function ctrCrearIdPersona(){
        if (isset($_POST["tipoIdentidad"])) {
            if (preg_match('/^[A-Za-z]+$/', $_POST["tipoIdentidad"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["defIdentidad"])) {
                $tabla = "tipo_identificacion";
                $datos = array(
                    "tipoId" => $_POST["tipoIdentidad"],
                    "defId" => $_POST["defIdentidad"]);

                $respuesta = PersonasModelo::mdlCrearTipoIdPersona($tabla, $datos);
                //var_dump($respuesta);
                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Tipo ID de persona se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=tipo-identidad";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=tipo-identidad";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR TIPO ID PERSONA*/
    static public function ctrEditarIdPersona(){
        if (isset($_POST["edit_tipoIdentidad"])) {
            if (preg_match('/^[A-Za-z]+$/', $_POST["edit_tipoIdentidad"]) && preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["edit_defIdentidad"])) {
                $tabla = "tipo_identificacion";
                $datos = array(
                    "idTipoPersona" => $_POST["id_TipoPersona"],
                    "tipoId" => $_POST["edit_tipoIdentidad"],
                    "defId" => $_POST["edit_defIdentidad"]);
                $respuesta = PersonasModelo::mdlEditarIdPersona($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=tipo-identidad";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=tipo-identidad";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR TIPO ID PERSONA*/
    static public function ctrEliminarIdPersona()
    {
        if (isset($_GET["idTipoPersona"])) {
            $tabla = "tipo_identificacion";
            $datos = $_GET["idTipoPersona"];
            $respuesta = PersonasModelo::mdlEliminarIdPersona($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=tipo-identidad";
                            }
                        });
                    </script>';
            }

        }
    }
    /*=====================================
                GENDER PERSONS
    ======================================*/
    static public function ctrMostrarGenero($item, $valor){
        $tabla = "genero";
        $respuesta = PersonasModelo::mdlMostrarPersonas($tabla, $item, $valor);
        return $respuesta;
    }
    static public function ctrCrearGeneroPersona(){
        if (isset($_POST["generoPersona"])) {
            if (preg_match('/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑüÜ\s-]+$/', $_POST["generoPersona"])) {
                $tabla = "genero";
                $datos = $_POST["generoPersona"];

                $respuesta = PersonasModelo::mdlCrearGeneroPersona($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "El Genero de la persona se ha creado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=genero";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location.href = "personas?tab=genero";
                            }
                        });
                </script>';
            }
        }
    }
    /*EDITAR GENERO PERSONA*/
    static public function ctrEditarGenero(){
        if (isset($_POST["edit_generoPerson"])) {
            if (preg_match('/^[A-Za-z]+$/', $_POST["edit_generoPerson"])) {
                $tabla = "genero";
                $datos = array(
                    "idGeneroP" => $_POST["idGenero"],
                    "nombreGeneroP" => $_POST["edit_generoPerson"]);
                $respuesta = PersonasModelo::mdlEditarGenero($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                    swal({
                        title: "Se ha actualizado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=genero";
                            }
                        });
                    </script>';
                }
            } else {
                echo '<script>
                    swal({
                        title: "Error",
                        text: "Los campos no pueden ir vacíos o llevar caracteres especiales!",
                        icon: "warning",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=genero";
                            }
                        });
                </script>';
            }
        }
    }
    /*BORRAR GENERO PERSONA*/
    static public function ctrEliminarGenero()
    {
        if (isset($_GET["idGeneroP"])) {
            $tabla = "genero";
            $datos = $_GET["idGeneroP"];
            $respuesta = PersonasModelo::mdlEliminarGenero($tabla, $datos);
            if ($respuesta == "ok") {
                echo '<script>
                    swal({
                        title: "Se ha eliminado correctamente!",
                        icon: "success",
                        button: "Cerrar",
                        }).then((value) =>{
                            if(value){
                                window.location = "personas?tab=genero";
                            }
                        });
                    </script>';
            }

        }
    }
}