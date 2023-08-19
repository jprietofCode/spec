
/*============================================
                 EDIT TYPE ID PERSON
===============================================*/
$(".tablaDestinos").on("click", ".btnEditDestino", function (){
    var idDestino = $(this).attr("idDestino");
    var datos = new FormData();
    datos.append("idDestino", idDestino);
    $.ajax({
        url: "ajax/destinosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Destino").val(data["id_destino"]);
            $("#edit_nombDestino").val(data["nombre_area"]);
            $("#edit_defDestino").val(data["funcion"]);
        }
    });
});
/* --------------------------
        DELETE TYPE VEHICLE
----------------------------*/
$(".tablaDestinos").on("click", ".btnDeleteDestino", function (){
    var idDestino = $(this).attr("idDestino");
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
                window.location = "index.php?url=destinos&idDestino="+idDestino;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});