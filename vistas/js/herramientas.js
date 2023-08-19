/*===========================
*       EDIT TOOLS
* ==========================*/
$(".tablaTools").on("click", ".btnEditarTools", function (){
    var idHerramienta = $(this).attr("idTools");
    var datos = new FormData();
    datos.append("idTools", idHerramienta);

    $.ajax({
        url: "ajax/herramientasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Herramienta").val(data["id_herramientas"]);
            $("#edit_nombTools").val(data["nombre_tools"]);
            // campo tipo herramienta
            var datosTipoTools = new FormData();
            datosTipoTools.append("idTipoTools", data["tipo_herramienta_id"]);
            $.ajax({
                url: "ajax/herramientasAjax.php",
                method: "POST",
                data: datosTipoTools,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){

                    $("#edit_tipoTools").val(respuesta["id_tipo_herramienta"]);
                    $("#edit_tipoTools").html(respuesta["nombre_tipo_herramienta"]);

                }
            });
            //marca herramienta
            var datosMarcaTools = new FormData();
            datosMarcaTools.append("idMarcaTools", data["marca_herramienta_id"]);
            $.ajax({
                url: "ajax/herramientasAjax.php",
                method: "POST",
                data: datosMarcaTools,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_marcaTools").val(respuesta["id_marca_herramienta"]);
                    $("#edit_marcaTools").html(respuesta["nombre_herramienta"]);

                }
            });
            //color herramienta
            var datosColorTools = new FormData();
            datosColorTools.append("idColor", data["color_id"]);
            $.ajax({
                url: "ajax/colorAjax.php",
                method: "POST",
                data: datosColorTools,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    //console.log("respuestaColor", respuesta);
                    $("#edit_colorTools").val(respuesta["id_color"]);
                    $("#edit_colorTools").html(respuesta["nombre_color"]);

                }
            });
            $("#edit_funcionTools").val(data["funcion"]);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText); // Muestra los detalles del error en la consola
            // Puedes agregar una alerta o mensaje de error aquí si lo deseas
        }
    })
})
/* ---------------------
ELIMINAR HERRAMIENTA
------------------------*/
$(".tablaTools").on("click", ".btnEliminarTools", function (){
    var idHerramienta = $(this).attr("idTools");
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
                window.location = "index.php?url=herramientas&idHerramienta="+idHerramienta;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});

/*============================================
                 EDIT TYPE TOOLS
===============================================*/
$(".tablaTipoTools").on("click", ".btnEditTypeTools", function (){
    var idTipoTools = $(this).attr("idTypeTools");
    var datos = new FormData();
    datos.append("idTipoTools", idTipoTools);
    $.ajax({
        url: "ajax/herramientasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_TipoHerramienta").val(data["id_tipo_herramienta"]);
            $("#edit_nombTipoTools").val(data["nombre_tipo_herramienta"]);
        }
    });
});
/* --------------------------
        DELETE TYPE VEHICLE
----------------------------*/
$(".tablaTipoTools").on("click", ".btnDeleteTypeTools", function (){
    var idTipoTools = $(this).attr("idTypeTools");
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
                window.location = "index.php?url=herramientas&idTipoHerramienta="+idTipoTools;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});
/*============================================
                 EDIT MARCA TOOLS
===============================================*/
$(".tablaMarcaTools").on("click", ".btnEditMarcaTools", function (){
    var idMarcaTools = $(this).attr("idMarcaTools");
    var datos = new FormData();
    datos.append("idMarcaTools", idMarcaTools);
    $.ajax({
        url: "ajax/herramientasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_MarcaTools").val(data["id_marca_herramienta"]);
            $("#editMarcaTools").val(data["nombre_herramienta"]);
        }
    });
});
/* --------------------------
      DELETE MARCA TOOLS
----------------------------*/
$(".tablaMarcaTools").on("click", ".btnDeleteMarcaTools", function (){
    var idMarcaTools = $(this).attr("idMarcaTools");
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
                window.location = "index.php?url=herramientas&idMarcaHerramienta="+idMarcaTools;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});