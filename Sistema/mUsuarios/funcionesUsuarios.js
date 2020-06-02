//VARIABLE GLOBAL PARA NOMBRAR LOS ELEMENTOS DE LOS  FORMULARIOS
//CREAR TEMAS-U 
var nombreModulo_U="Usuarios";

$("#frmGuardar-U").submit(function(e){ 

    var nombre_persona = $("#ListaPersonas").val();
    var nombre_usuario = $("#nom_usuario").val();
    var fechaCadu      = $("#fechaCadu").val();
    var nom_tema       = $("#ListaTemas").val();
    var p_datos_persona;
    var p_ecivil;
    var p_usuarios;
    var p_temas;

    p_datos_persona = ($("#p_datosP").prop( "checked" ) == true) ? 'si' : 'no' ;
    p_ecivil        = ($("#p_Ecivil").prop( "checked" ) == true) ? 'si' : 'no' ;
    p_usuarios      = ($("#p_usuarios").prop( "checked" ) == true) ? 'si' : 'no' ;
    p_temas         = ($("#p_temas").prop( "checked" ) == true) ? 'si' : 'no' ;

console.log(p_datos_persona, p_ecivil, p_usuarios, p_temas);

    CompararUsuario(nombre_usuario);
    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Guardar la información?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si, deseo guardarla",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {

            var nombre_us = $('#nomUsuarioG').val();            
            if (nombre_us == 'Si') {
                $.ajax({
                    url:"../mUsuarios/guardarUsuario.php",
                    type:"POST",
                    dateType:"html",
                    data:{nombre_persona, nombre_usuario, fechaCadu, nom_tema, p_datos_persona, p_ecivil, p_usuarios, p_temas},
                    success:function(respuesta){
                        swal.close();
                            $("#guardar-U").hide();
                            llenar_lista_U();
                            var idTema=$("#inicioIdTema").val();
                            aplicarTema(idTema,'otro');
                            $("#frmGuardar-U")[0].reset();
                            selectTwo();
                            alertify.message("<i class='fa fa-check fa-lg'> Tu contraseña es: 12345678</i>", 5);
                            actividad  ="Se insertado un nuevo registro a la tabla "+nombreModulo_U;
                            var idUser=$("#inicioIdusuario").val();
                            log(actividad,idUser);
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX el usuario guardar"); 
                    },
                });
            }else{
                    swal({
                        title: "Error!",
                        text: "Ya existe un usuario con ese nombre",
                        type: "error",
                        confirmButtonClass: "btn-dark",
                        confirmButtonText: "Enterado"
                    }, function (isConfirm) {
                        alertify.message("Disculpe las molestias !");
                    });
                
            }

        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });
    e.preventDefault();
    return false;
});

function CompararUsuario(nombre_usuario){
    $.ajax({
        url:"../mUsuarios/ComprobarUsuarioG.php",
        type:"POST",
        dateType:"html",
        data:{nombre_usuario},
        success:function(respuesta){
            $('#nomUsuarioG').attr('value',respuesta);
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX guardar compro"); 
        },
    });
}

$("#frmActualizar-U").submit(function(e){

    var id              = $("#eId_Usuario").val();
    var nombre_usuario  = $("#eNom_usuario").val();
    var efechaCadu      = $("#efechaCadu").val();
    var nombre_persona  = $("#eListaPersonas").val();
    var nombre_tema     = $("#eListaTemas").val();
    var p_datos_persona = ($("#eP_datosP").prop( "checked" ) == true) ? 'si': 'no' ;
    var p_ecivil        = ($("#eP_Ecivil").prop( "checked" ) == true) ? 'si': 'no' ;
    var p_usuarios      = ($("#eP_usuarios").prop( "checked" ) == true) ? 'si': 'no' ;
    var p_temas         = ($("#eP_temas").prop( "checked" ) == true) ? 'si': 'no' ;

    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Actualizar la información?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-success",
        confirmButtonText: "Si, deseo actualizarla",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true,
        showCloseButton: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
            $.ajax({
                url:"../mUsuarios/ComprobarUsuarioE.php",
                type:"POST",
                dateType:"html",
                data:{nombre_usuario,id},
                success:function(respuesta){
                    if(respuesta == 'Si'){
                        swal({
                            title: "Error!",
                            text: "Ya existe un usuario con ese nombre",
                            type: "error",
                            confirmButtonClass: "btn-dark",
                            confirmButtonText: "Enterado"
                        }, function (isConfirm) {
                            alertify.message("Gracias !");
                        });
                    }else{
                        swal.close();
                        $.ajax({
                            url:"../mUsuarios/ActualizarUsuario.php",
                            type:"POST",
                            dateType:"html",
                            data:{id, nombre_persona, nombre_usuario, nombre_tema, efechaCadu, p_datos_persona, p_ecivil, p_usuarios, p_temas},
                            success:function(respuesta){
                                console.log(respuesta);
                                llenar_lista_U();
                                $("#frmGuardar-U")[0].reset();
                                $("#frmActualizar-U")[0].reset();
                                alertify.success("<i class='fa fa-bolt fa-lg'> Usuario Actualizado</i>", 3);
                                $("#btnCancelarG-U , #btnCancelarA-U").click();
                                actividad  ="Se ha modificado un registro de la tabla "+nombreModulo_U;
                                var idUser=$("#inicioIdusuario").val();
                                var idTema=$("#inicioIdTema").val();
                                aplicarTema(idTema,'otro');
                                log(actividad,idUser);
                            },
                            error:function(xhr,status){
                                alert("Error en metodo AJAX"); 
                            },
                        });
                    }
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });

    e.preventDefault();
    return false;
});

function llenar_lista_U(){
    abrirModalCarga('Cargando Lista');
    $("#frmGuardar-U")[0].reset();
    $("#Listado-U").hide();
    $.ajax({
        url:"../mUsuarios/lista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado-U").html(respuesta);
            $("#Listado-U").fadeIn("slow");
            cerrarModalCarga();      
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

function llenar_formulario_U(id,nom_usuario,nom_persona,nom_tema,p_datos_persona,p_ecivil,p_usuarios,p_temas,fechaCadu){
    console.log(id);
    $("#eId_Usuario").attr('value',id);
    $("#eNom_usuario").val(nom_usuario);
    $("#eListaPersonas").val(nom_persona);
    $("#eListaTemas").val(nom_tema);
    $("#efechaCadu").val(fechaCadu);
    
    (p_datos_persona == 'si') ? $("#eP_datosP").bootstrapToggle('on') : $("#eP_datosP").bootstrapToggle('off');
    (p_ecivil == 'si') ? $("#eP_Ecivil").bootstrapToggle('on') : $("#eP_Ecivil").bootstrapToggle('off');
    (p_usuarios == 'si') ? $("#eP_usuarios").bootstrapToggle('on') : $("#eP_usuarios").bootstrapToggle('off');
    (p_temas == 'si') ? $("#eP_temas").bootstrapToggle('on') : $("#eP_temas").bootstrapToggle('off');

    selectTwo();

    $("#lblTitular").text(nombreModulo_U);
    $("#badgeInfo").text("Modificar datos");

    $("#guardar-U").hide();
    $("#Listado-U").hide();
    $("#editar-U").fadeIn();
    $("#eNom_usuario").focus();
}

function cambiar_estatus_U(id,consecutivo){

    var valor=$("#check"+consecutivo).val();
    var contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mUsuarios/cEstatus.php",
        type:"POST",
        dateType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'> Activado</i>", 3);
                $("#btnEditar-U"+consecutivo).removeAttr('disabled');
                $("#btnContra-U"+consecutivo).removeAttr('disabled');
                $("#btnPermisos-U"+consecutivo).removeAttr('disabled');
                actividad  ="Se ha activado un registro de la tabla "+nombreModulo_U;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }else{
                alertify.error("<i class='fa fa-times fa-lg'> Desactivado</i>", 3);
                $("#btnEditar-U"+consecutivo).attr('disabled','disabled');
                $("#btnContra-U"+consecutivo).attr('disabled','disabled');
                $("#btnPermisos-U"+consecutivo).attr('disabled','disabled');
                actividad  ="Se ha desactivado un registro de la tabla "+nombreModulo_U;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

}

$("#btnCancelarG-U , #btnCancelarA-U").click(function(){
    $("#editar-U").hide();
    $("#guardar-U").hide();

    $("#lblTitular").text(nombreModulo_U);
    $("#badgeInfo").text("Lista");

    $("#Listado-U").fadeIn();
 
});


function nuevo_registro_U(){
    $("#lblTitular").text(nombreModulo_U);
    $("#badgeInfo").text("Nuevo registro");

    $("#Listado-U").hide();
    $("#guardar-U").fadeIn();
    $('#frmGuardar-U')[0].reset();
    $("#nom_usuario").focus();
    
}

function abrirModalPermisos(id,persona,datos_p,ecivil,usuarios,temas){
    $("#modalTitle-Permisos").text("Permisos de usuario para - "+persona);
    console.log(id);
    $("#id_usuario").val(id);
    
    (datos_p == 'si') ? $("#mP_datosP").bootstrapToggle('on') : $("#mP_datosP").bootstrapToggle('off');
    (ecivil == 'si') ? $("#mP_Ecivil").bootstrapToggle('on') : $("#mP_Ecivil").bootstrapToggle('off');
    (usuarios == 'si') ? $("#mP_usuarios").bootstrapToggle('on') : $("#mP_usuarios").bootstrapToggle('off');
    (temas == 'si') ? $("#mP_temas").bootstrapToggle('on') : $("#mP_temas").bootstrapToggle('off');

    $("#modalPermisos-U").modal("show");
}

function Actualizar_Permisos() {
    var id       = $("#id_usuario").val();
    var datos_p  = ($("#mP_datosP").prop( "checked" ) == true) ? 'si' : 'no' ;
    var e_civil  = ($("#mP_Ecivil").prop( "checked" ) == true) ? 'si' : 'no' ;
    var usuarios = ($("#mP_usuarios").prop( "checked" ) == true) ? 'si' : 'no' ;
    var temas    = ($("#mP_temas").prop( "checked" ) == true) ? 'si' : 'no' ;
    swal({
        title: "¿Deseas guardar los cambios?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si, deseo guardar",
        cancelButtonText: "Cancelar",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
                $.ajax({
                    url : '../mUsuarios/ActualizarPermisos.php',
                    data : {id, datos_p, e_civil, usuarios, temas},
                    type : 'POST',
                    dataType : 'html',
                    success : function(respuesta) {
                        swal.close();
                        alertify.success("<i class='fa fa-check fa-lg'> Permisos Actualizados</i>", 3);
                        llenar_lista_U();
                        var idTema=$("#inicioIdTema").val();
                        aplicarTema(idTema,'otro');
                        $("#modalPermisos-U").modal("hide");
                    },
                    error : function(xhr, status) {
                        alert('Disculpe, existió un problema');
                    },
                });
        }, 2000);}
        else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
      });
}

function preloader(seg,mensaje,alerta){
    var s=parseInt(seg)*1000;
    abrirModalCarga(mensaje);
    setTimeout(function() {

        cerrarModalCarga(alerta);
    },s);
}

function cmb_temas()
{
    $.ajax({
        url : '../mUsuarios/cmbTemas.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#ListaTemas, #eListaTemas").empty();
            $("#ListaTemas, #eListaTemas").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

$(document).ready(function () {

    $( ".select2" ).select2({
        theme: "bootstrap4",
        placeholder: 'Seleccione...'
    });

    cmb_temas();
    cmb_personasG();
    cmb_personasE();
});

function cmb_personasG()
{
    $.ajax({
        url : '../mUsuarios/cmbPersonaG.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#ListaPersonas").empty();
            $("#ListaPersonas").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function cmb_personasE()
{
    $.ajax({
        url : '../mUsuarios/cmbPersonaE.php',
        data : {},
        type : 'POST',
        dataType : 'html',
        success : function(respuesta) {
            
            $("#eListaPersonas").empty();
            $("#eListaPersonas").html(respuesta);    
            selectTwo();
        },
        error : function(xhr, status) {
            alert('Disculpe, existió un problema');
        },
    });
}

function reiniciarContra(id){
    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas restablecer tu contraseña a 12345678?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si, deseo aplicar",
        cancelButtonText: "Cancelar",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
    }, function(isConfirm){
        if (isConfirm) {
            setTimeout( function (){
                swal.close();
                $.ajax({
                    url:"../mUsuarios/reiniciarcontra.php",
                    type:"POST",
                    dateType:"html",
                    data:{id},
                    succes:function(respuesta){
                        alertify.success("<i class ='fas fa-bolt fa-lg'> Contraseña Restablecida</i>", 3);
                        llenar_lista_U();
                        var idTema=$("#inicioIdTema").val();
                        aplicarTema(idTema,'otro');
                    },
                    error:function(xhr,status){
                        alert("Error en metodo AJAX"); 
                    },
                });
            },2000);
        }else{
            alertify.error(" <i class='fa fa-times fa-lg'></i> Cancelado",2);
        }
    });
}
