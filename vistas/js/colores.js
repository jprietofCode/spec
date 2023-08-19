/*============================================
                 EDIT COLOR VEHICLE
===============================================*/
$(".tablaColor").on("click", ".btnEditColor", function (){
    var idColor = $(this).attr("idColor");
    var datos = new FormData();
    datos.append("idColor", idColor);
    $.ajax({
        url: "ajax/colorAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            console.log(data);
            $("#id_Color").val(data["id_color"]);
            $("#editColor").val(data["nombre_color"]);
        }
    });
});
/*============================================
                 DELETE COLOR VEHICLE
===============================================*/
$(".tablaColor").on("click", ".btnDeleteColor", function (){
    var idColor = $(this).attr("idColor");
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
                window.location = "index.php?url=colores&idColor="+idColor;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});
