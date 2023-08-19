/*===========================
*       EDITAR PERSONA
* ==========================*/
$(".tablaPersonas").on("click", ".btnEditarPersona", function (){
    var idPersona = $(this).attr("idPersona");
    var datos = new FormData();
    datos.append("idPersona", idPersona);

    $.ajax({
        url: "ajax/personasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#idPersona").val(data["id_personas"]);
            // campo tipo persona
            var datosTipoPersona = new FormData();
            datosTipoPersona.append("idTipoPersona", data["tipo_identificacion_id"]);
            $.ajax({
                url: "ajax/PersonasAjax.php",
                method: "POST",
                data: datosTipoPersona,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){

                    $("#edit_tipoIdPersona").val(respuesta["id_tipo_identificacion"]);
                    $("#edit_tipoIdPersona").html(respuesta["nombre_tipo"]);

                }
            });
            $("#edit_numIdPersona").val(data["numero_id"]);
            $("#edit_nombPersona").val(data["nombres"]);
            $("#edit_apellPersona").val(data["apellidos"]);
            $("#edit_celPersona").val(data["tel_celular"]);
            $("#edit_telPersona").val(data["telefono_fijo"]);
            $("#edit_emailPersona").val(data["email"]);
            //campo genero Persona
            var datosGeneroPersona = new FormData();
            datosGeneroPersona.append("idGeneroPersona", data["genero_id"]);
            $.ajax({
                url: "ajax/personasAjax.php",
                method: "POST",
                data: datosGeneroPersona,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_generoPersona").val(respuesta["id_genero"]);
                    $("#edit_generoPersona").html(respuesta["nombre_genero"]);

                }
            });
            //campo empresa persona
            var datosEmpresa = new FormData();
            datosEmpresa.append("idEmpresa", data["empresa_id"]);
            $.ajax({
                url: "ajax/empresasAjax.php",
                method: "POST",
                data: datosEmpresa,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_empresaPersona").val(respuesta["id_empresas"]);
                    $("#edit_empresaPersona").html(respuesta["nombre_empresa"]);

                }
            });
            //campo cargo personas
            var datosCargo = new FormData();
            datosCargo.append("idCargo", data["cargo_id"]);
            $.ajax({
                url: "ajax/empresasAjax.php",
                method: "POST",
                data: datosCargo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    //console.log("respuestaColor", respuesta);
                    $("#edit_cargoPersona").val(respuesta["id_cargos"]);
                    $("#edit_cargoPersona").html(respuesta["nombre_cargo"]);

                }
            });
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText); // Muestra los detalles del error en la consola
            // Puedes agregar una alerta o mensaje de error aquí si lo deseas
        }
    })
})
/* ---------------------
ELIMINAR PERSONA
------------------------*/
$(".tablaPersonas").on("click", ".btnEliminarPersona", function (){
    var idPersona = $(this).attr("idPersona");
    swal({
        title: "Esta seguro de borrar la persona?",
        text: "Si no está seguro puede cancelar la acción",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        },
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "index.php?url=personas&idPersona="+idPersona;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});

/*============================================
                 EDIT TYPE ID PERSON
===============================================*/
$(".tablaTipoIdentidad").on("click", ".btnEditTypeIdP", function (){
    var idTipoPersona = $(this).attr("idTypePerson");
    var datos = new FormData();
    datos.append("idTipoPersona", idTipoPersona);
    $.ajax({
        url: "ajax/personasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_TipoPersona").val(data["id_tipo_identificacion"]);
            $("#edit_tipoIdentidad").val(data["nombre_tipo"]);
            $("#edit_defIdentidad").val(data["definicion"]);
        }
    });
});
/* --------------------------
        DELETE TYPE VEHICLE
----------------------------*/
$(".tablaTipoIdentidad").on("click", ".btnDeleteTypeIdP", function (){
    var idTipoPersona = $(this).attr("idTypePerson");
    swal({
        title: "Esta seguro que lo desea borrar?",
        text: "Si no está seguro puede cancelar la acción",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        },
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "index.php?url=personas&idTipoPersona="+idTipoPersona;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});
/*============================================
                 EDIT GENDER PERSON
===============================================*/
$(".tablaGeneroPersona").on("click", ".btnEditGeneroP", function (){
    var idGeneroP = $(this).attr("idGeneroPersona");
    var datos = new FormData();
    datos.append("idGeneroPersona", idGeneroP);
    $.ajax({
        url: "ajax/personasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#idGenero").val(data["id_genero"]);
            $("#edit_generoP").val(data["nombre_genero"]);
        }
    });
});
/* --------------------------
        DELETE GENDER
----------------------------*/
$(".tablaGeneroPersona").on("click", ".btnDeleteGeneroP", function (){
    var idGeneroP = $(this).attr("idGeneroPersona");
    swal({
        title: "Esta seguro que lo desea borrar?",
        text: "Si no está seguro puede cancelar la acción",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "",
                closeModal: true,
            },
            confirm: {
                text: "Eliminar",
                value: true,
                visible: true,
                className: "",
                closeModal: true
            }
        },
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "index.php?url=personas&idGeneroP="+idGeneroP;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});