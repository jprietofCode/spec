/*
*   EDITAR VEHÍCULO
* */

$(".tablaVehiculos").on("click", ".btnEditarVehiculo", function (){
    var idVehiculo = $(this).attr("idVehiculo");
   // console.log("id_vehiculo", idVehiculo);

    var datos = new FormData();
    datos.append("idVehiculo", idVehiculo);

    $.ajax({
        url: "ajax/vehiculosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            //console.log("respuesta:", data);
            //console.log(data.id_vehiculo); // Acceder al valor del campo 'id_vehiculo'
            //console.log(data.placa);
            //console.log(data.tipo_vehiculo_id);
            $("#idVehiculo").val(data["id_vehiculo"]);
            // campo placa
            $("#edit_placa").val(data["placa"]);
            // campo tipo vehiculo
            var datosTipoVehiculo = new FormData();
            datosTipoVehiculo.append("idTipoVehiculo", data["tipo_vehiculo_id"]);
            $.ajax({
                url: "ajax/vehiculosAjax.php",
                method: "POST",
                data: datosTipoVehiculo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    //console.log("respuesta", respuesta);
                    $("#edit_tipoVehiculo").val(respuesta["id_tipo_vehiculo"]);
                    $("#edit_tipoVehiculo").html(respuesta["nombre_tipo_vehiculo"]);

                }
            });
            //campo marca vehiculo
            var datosMarcaVehiculo = new FormData();
            datosMarcaVehiculo.append("idMarcaVehiculo", data["marca_vehiculo_id"]);
            $.ajax({
                url: "ajax/vehiculosAjax.php",
                method: "POST",
                data: datosMarcaVehiculo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_marcaVehiculo").val(respuesta["id_marca_vehiculo"]);
                    $("#edit_marcaVehiculo").html(respuesta["nombre_marca"]);

                }
            });
            //campo modelo vehiculo
            var datosModeloVehiculo = new FormData();
            datosModeloVehiculo.append("idModeloVehiculo", data["modelo_id"]);
            $.ajax({
                url: "ajax/vehiculosAjax.php",
                method: "POST",
                data: datosModeloVehiculo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_modeloVehiculo").val(respuesta["id_modelo"]);
                    $("#edit_modeloVehiculo").html(respuesta["nombre_modelo"]);

                }
            });
            //campo color vehiculo
            var datosColorVehiculo = new FormData();
            datosColorVehiculo.append("idColor", data["color_id"]);
            $.ajax({
                url: "ajax/colorAjax.php",
                method: "POST",
                data: datosColorVehiculo,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    //console.log("respuestaColor", respuesta);
                    $("#edit_colorVehiculo").val(respuesta["id_color"]);
                    $("#edit_colorVehiculo").html(respuesta["nombre_color"]);

                }
            });
            // campo año
            $("#edit_yearVehiculo").val(data["anio"]);
        },
        error: function (xhr, status, error) {
            console.log(xhr.responseText); // Muestra los detalles del error en la consola
            // Puedes agregar una alerta o mensaje de error aquí si lo deseas
        }
    })
})

/* ---------------------
ELIMINAR VEHICULO
------------------------*/
$(".tablaVehiculos").on("click", ".btnEliminarVehiculo", function (){
    var idVehiculo = $(this).attr("idVehiculo");
    //console.log("idVehiculo", idVehiculo);
    swal({
        title: "Esta seguro de borrar el producto?",
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
                window.location = "index.php?url=vehiculos&idVehiculo="+idVehiculo;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});

/*============================================
                 EDIT TYPE VEHICLE
===============================================*/
$(".tablaTipoVehicle").on("click", ".btnEditTypeVehicle", function (){
    var idTipoVehiculo = $(this).attr("idTypeVehicle");
    //console.log("idTipoVehiculo", idTipoVehiculo);
    var datos = new FormData();
    datos.append("idTipoVehiculo", idTipoVehiculo);
    $.ajax({
        url: "ajax/vehiculosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_TipoVehiculo").val(data["id_tipo_vehiculo"]);
            $("#EditTipoVehicle").val(data["nombre_tipo_vehiculo"]);
        }
    });
});
/* --------------------------
        DELETE TYPE VEHICLE
----------------------------*/
$(".tablaTipoVehicle").on("click", ".btnDeleteTypeVehicle", function (){
    var idTipoVehiculo = $(this).attr("idTypeVehicle");
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
                window.location = "index.php?url=vehiculos&idTipoVehiculo="+idTipoVehiculo;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});

/*============================================
                 EDIT BRAND VEHICLE
===============================================*/
$(".tablaMarcaVehicle").on("click", ".btnEditMarcaVehicle", function (){
    var idMarcaVehiculo = $(this).attr("idMarcaVehicle");
    //console.log("idMarcaVehiculo", idMarcaVehiculo);
    var datos = new FormData();
    datos.append("idMarcaVehiculo", idMarcaVehiculo);
    $.ajax({
        url: "ajax/vehiculosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            //console.log(data.nombre_marca);
            $("#id_MarcaVehiculo").val(data["id_marca_vehiculo"]);
            $("#EditMarcaVehiculo").val(data["nombre_marca"]);
        }
    });
});
/*============================================
                 DELETE BRAND VEHICLE
===============================================*/
$(".tablaMarcaVehicle").on("click", ".btnDeleteMarcaVehicle", function (){
    var idMarcaVehiculo = $(this).attr("idMarcaVehicle");
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
                window.location = "index.php?url=vehiculos&idMarcaVehiculo="+idMarcaVehiculo;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});

/*============================================
                 EDIT MODEL VEHICLE
===============================================*/
$(".tablaModelVehicle").on("click", ".btnEditModelVehicle", function (){
    var idModeloVehiculo = $(this).attr("idModelVehicle");
    //console.log("idModeloVehiculo", idModeloVehiculo);
    var datos = new FormData();
    datos.append("idModeloVehiculo", idModeloVehiculo);
    $.ajax({
        url: "ajax/vehiculosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_ModeloVehiculo").val(data["id_modelo"]);
            $("#EditModeloVehicle").val(data["nombre_modelo"]);
        }
    });
});
/*============================================
                 DELETE MODEL VEHICLE
===============================================*/
$(".tablaModelVehicle").on("click", ".btnDeleteModelVehicle", function (){
    var idModeloVehiculo = $(this).attr("idModelVehicle");
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
                window.location = "index.php?url=vehiculos&idModeloVehiculo="+idModeloVehiculo;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});