/*----------------------------------------
       Activar Usuario
----------------------------------------*/
$(document).on("click",".btnActivar", function (){
    var idusuario = $(this).attr("idUsuario");
    var estadoUsuario = $(this).attr("estadoUsuario");

    var datos = new FormData();
    datos.append("activarId", idusuario);
    datos.append("activarUsuario", estadoUsuario);

    $.ajax({
        url:"ajax/usuariosAjax.php",
        method: "POST",
        data: datos,
        cache:false,
        contentType: false,
        processData: false,
        success: function (respuesta){
            if(window.matchMedia("(max-width:767px)").matches){
                swal({
                    title: "El usuario ha sido actualizado!",
                    icon: "success",
                    button: "Cerrar",
                }).then((value) =>{
                    if(value){
                        window.location = "usuarios";
                    }
                });

            }
        }
    })
    /*if(estadoUsuario === 0 || estadoUsuario === "0"){
        $(this).removeClass('btn-success');
        $(this).addClass("btn-danger");
        $(this).html('Desactivado');
        $(this).attr('estadoUsuario',1);
    }else{
        $(this).removeClass("btn-danger");
        $(this).addClass("btn-success");
        $(this).html('Activo');
        $(this).attr('estadoUsuario',0);
    }*/

    let estadoUsuarioActual = estadoUsuario;
    estadoUsuario = estadoUsuario === 0 || estadoUsuario === "0" ? 1 : 0;

    if (estadoUsuarioActual !== estadoUsuario) {
        $(this).addClass(estadoUsuario === 0 || estadoUsuario === "0" ? "btn-success" : "btn-danger");
        $(this).removeClass(estadoUsuario === 0 || estadoUsuario === "0" ? "btn-danger" : "btn-success");
        $(this).html(estadoUsuario === 0 || estadoUsuario === "0" ? "Activo" : "Desactivado");
        $(this).attr('estadoUsuario', estadoUsuario);
    }

})
/*----------------------------------------
       EDIT - USER
----------------------------------------*/
$(".tablaUsuarios").on("click", ".btnEditUsuario", function (){
    var id_Usuario = $(this).attr("idUsuario");
    var datos = new FormData();
    datos.append("idUsuario", id_Usuario);
    $.ajax({
        url: "ajax/usuariosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Usuario").val(data["id_usuario"]);
            $("#edit_nameUser").val(data["nombre_usuario"]);
            $("#edit_passwordUser").val(data["contrasena"]);
            // campo perfil de usuario
            var datosPerfil = new FormData();
            datosPerfil.append("idPerfil", data["perfil_id"]);
            $.ajax({
                url: "ajax/UsuariosAjax.php",
                method: "POST",
                data: datosPerfil,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){

                    $("#edit_tipoPerfilUser").val(respuesta["id_perfil"]);
                    $("#edit_tipoPerfilUser").html(respuesta["nombre_perfil"]);

                }
            });
            // campo tipo herramienta
            var datosPersona = new FormData();
            datosPersona.append("idPersona", data["persona_id"]);
            $.ajax({
                url: "ajax/personasAjax.php",
                method: "POST",
                data: datosPersona,
                cache: false,
                contentType: false,
                processData: false,
                dataType: "json",
                success: function (respuesta){
                    $("#edit_personasID").val(respuesta["id_personas"]);
                    $("#edit_personasID").html(respuesta["numero_id"]);

                }
            });
        }
    });
});
/*----------------------------------------
       DELETE - USER
----------------------------------------*/
$(".tablaUsuarios").on("click", ".btnDeleteUsuario", function (){
    var id_Usuario = $(this).attr("idUsuario");
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
                window.location = "index.php?url=usuarios&idUsuario="+id_Usuario;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});
/*----------------------------------------
       EDIT - Perfil Usuario
----------------------------------------*/
$(".tablaPerfiles").on("click", ".btnEditPerfil", function (){
    var id_Perfil = $(this).attr("idPerfil");
    var datos = new FormData();
    datos.append("idPerfil", id_Perfil);
    $.ajax({
        url: "ajax/usuariosAjax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (data){
            $("#id_Perfil").val(data["id_perfil"]);
            $("#edit_nombPerfil").val(data["nombre_perfil"]);
        }
    });
});
/* --------------------------
      DELETE - PERFIL USUARIO
----------------------------*/
$(".tablaPerfiles").on("click", ".btnDeletePerfil", function (){
    var id_Perfil = $(this).attr("idPerfil");
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
                window.location = "index.php?url=usuarios&idPerfil="+id_Perfil;
            } else {
                swal("Cancelaste la acción!");
            }
        });
});