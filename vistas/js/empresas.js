/*============================================
                 EDITAR EMPRESA
===============================================*/
$(".tablaEmpresas").on("click", ".btnEditEmpresa", function (){
    var idEmpresa = $(this).attr("idEmpresa");
    var datos = new FormData();
    datos.append("idEmpresa", idEmpresa);
    $.ajax({
        url: "ajax/empresasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Empresa").val(data["id_empresas"]);
            $("#edit_nombEmpresa").val(data["nombre_empresa"]);
        }
    });
});
/* --------------------------
        DELETE EMPRESA
----------------------------*/
$(".tablaEmpresas").on("click", ".btnDeleteEmpresa", function (){
    var id_Empresa = $(this).attr("idEmpresa");
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
                window.location = "index.php?url=empresas&idEmpresa="+id_Empresa;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});
/*============================================
                 EDIT CARGO
===============================================*/
$(".tablaCargos").on("click", ".btnEditCargo", function (){
    var id_Cargo = $(this).attr("idCargo");
    var datos = new FormData();
    datos.append("idCargo", id_Cargo);
    $.ajax({
        url: "ajax/empresasAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Cargo").val(data["id_cargos"]);
            $("#edit_nombCargo").val(data["nombre_cargo"]);
        }
    });
});
/* --------------------------
        DELETE CARGO
----------------------------*/
$(".tablaCargos").on("click", ".btnDeleteCargo", function (){
    var id_Cargo = $(this).attr("idCargo");
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
                window.location = "index.php?url=empresas&idCargo="+id_Cargo;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});