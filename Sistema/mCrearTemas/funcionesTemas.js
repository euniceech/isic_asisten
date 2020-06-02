//VARIABLE GLOBAL PARA NOMBRAR LOS ELEMENTOS DE LOS  FORMULARIOS
//CREAR TEMAS-T 
var nombreModulo_T="Temas";

$("#frmGuardar-T").submit(function(e){

    var nombre     = $("#Nom_Tema").val();
    var colorLetra = $("#color_fuente").val();
    var colorBase  = $("#color_base").val();
    var colorBaseF = $("#color_base_f").val();
    var colorBorde = $("#color_borde").val();

    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Guardar la información?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si, deseo guardar",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
            $.ajax({
                url:"../mCrearTemas/comprobarG.php",
                type:"POST",
                dateType:"html",
                data:{nombre},
                success:function(respuesta){
                    if(respuesta == "Si"){
                        console.log('respuesta de Guardar - '+ respuesta);
                        swal({
                            title: "Error!",
                            text: "Ya existe un tema con ese nombre",
                            type: "error",
                            confirmButtonClass: "btn-dark",
                            confirmButtonText: "Enterado"
                        }, function (isConfirm) {
                            alertify.message("Gracias !");
                        });
                    }else{
                        swal.close();
                        $.ajax({
                            url:"../mCrearTemas/guardarTema.php",
                            type:"POST",
                            dateType:"html",
                            data:{nombre,colorLetra,colorBase,colorBaseF,colorBorde},
                            success:function(respuesta){
                                $("#guardar-T").hide();
                                llenar_lista_T();
                                var idTema=$("#inicioIdTema").val();
                                aplicarTema(idTema,'otro');
                                $("#frmGuardar-T")[0].reset();
                                selectTwo();
                                alertify.success("<i class='fa fa-save fa-lg'> Tema Guardado</i>", 2);
                                actividad  ="Se insertado un nuevo registro a la tabla "+nombreModulo_T;
                                var idUser=$("#inicioIdusuario").val();
                                log(actividad,idUser);
                            },
                            error:function(xhr,status){
                                alert("Error en metodo AJAX tema guardar"); 
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

$("#frmActualizar-T").submit(function(e){

    var id         = $("#eId_tema").val();
    var nombre     = $("#eNom_tema").val();
    var colorLetra = $("#eColor_fuente").val();
    var colorBase  = $("#eColor_base").val();
    var colorBaseF = $("#eColor_base_f").val();
    var colorBorde = $("#eColor_borde").val();

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
                url:"../mCrearTemas/comprobar.php",
                type:"POST",
                dateType:"html",
                data:{nombre,id},
                success:function(respuesta){
                    if(respuesta == 'Si'){
                        swal({
                            title: "Error!",
                            text: "Ya existe un tema con ese nombre",
                            type: "error",
                            confirmButtonClass: "btn-dark",
                            confirmButtonText: "Enterado"
                        }, function (isConfirm) {
                            alertify.message("Gracias !");
                        });
                    }else{
                        swal.close();
                        $.ajax({
                            url:"../mCrearTemas/actualizarTema.php",
                            type:"POST",
                            dateType:"html",
                            data:{id,nombre,colorLetra,colorBase,colorBaseF,colorBorde},
                            success:function(respuesta){
                                console.log(respuesta);
                                llenar_lista_T();
                                    $("#frmGuardar-T")[0].reset();
                                    $("#frmActualizar-T")[0].reset();
                                    alertify.success("<i class='fa fa-bolt fa-lg'> Tema Actualizado</i>", 2);
                                $("#btnCancelarG-T , #btnCancelarA-T").click();
                                actividad  ="Se ha modificado un registro de la tabla "+nombreModulo_T;
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

function llenar_lista_T(){
    abrirModalCarga('Cargando Lista');
    $("#frmGuardar-T")[0].reset();
    $("#Listado-T").hide();
    $.ajax({
        url:"../mCrearTemas/lista.php",
        type:"POST",
        dateType:"html",
        data:{},
        success:function(respuesta){
            $("#Listado-T").html(respuesta);
            $("#Listado-T").fadeIn("slow");
            cerrarModalCarga();      
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });
}

function llenar_formulario_T(id,nom_tema,color_fuente,color_base,color_base_f,color_borde){
    console.log(id);
    $("#eId_tema").attr('value',id);
    $("#eNom_tema").val(nom_tema);
    console.log(color_fuente);
    $("#eColor_fuente").val(color_fuente);
    $("#eColor_base").val(color_base);
    $("#eColor_base_f").val(color_base_f);
    $("#eColor_borde").val(color_borde);

    $("#lblTitular").text(nombreModulo_T);
    $("#badgeInfo").text("Modificar datos");

    $("#guardar-T").hide();
    $("#Listado-T").hide();
    $("#editar-T").fadeIn();
    $("#eNom_tema").focus();
}

function cambiar_estatus_T(id,consecutivo){

    var valor=$("#check"+consecutivo).val();
    var contravalor=(valor==1)?0:1;
    $("#check"+consecutivo).val(contravalor);

    $.ajax({
        url:"../mCrearTemas/cEstatus_Tema.php",
        type:"POST",
        dateType:"html",
        data:{id,contravalor},
        success:function(respuesta){
            // console.log(respuesta);
            if(contravalor==1){
                alertify.success("<i class='fa fa-check fa-lg'> Reactivado</i>", 2);
                $("#btnEditar-T"+consecutivo).removeAttr('disabled');
                $("#icoSound-T"+consecutivo).removeClass("fas fa-minus-circle fa-lg");
                $("#icoSound-T"+consecutivo).addClass("fas fa-play-circle fa-lg");
                $("#btnSonido-T"+consecutivo).removeAttr("disabled");
                $("#btnExportar-T"+consecutivo).removeAttr("disabled");
                actividad  ="Se ha reactivado un registro de la tabla "+nombreModulo_T;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }else{
                alertify.error("<i class='fa fa-times fa-lg'> Desactivado</i>", 2);
                $("#btnEditar-T"+consecutivo).attr('disabled','disabled');
                $("#icoSound-T"+consecutivo).removeClass("fas fa-play-circle fa-lg");
                $("#icoSound-T"+consecutivo).addClass("fas fa-minus-circle fa-lg");
                $("#icoSound-T"+consecutivo).attr('disabled','disabled');
                $("#btnSonido-T"+consecutivo).attr('disabled','disabled');
                $("#btnExportar-T"+consecutivo).attr('disabled','disabled');
                actividad  ="Se ha desactivado un registro de la tabla "+nombreModulo_T;
                var idUser=$("#inicioIdusuario").val();
                log(actividad,idUser);
            }
        },
        error:function(xhr,status){
            alert("Error en metodo AJAX"); 
        },
    });

}

$("#btnCancelarG-T , #btnCancelarA-T").click(function(){
    $("#editar-T").hide();
    $("#guardar-T").hide();

    $("#lblTitular").text(nombreModulo_T);
    $("#badgeInfo").text("Lista");

    $("#Listado-T").fadeIn();
 
});


function nuevo_registro_CT(){
    $("#lblTitular").text(nombreModulo_T);
    $("#badgeInfo").text("Nuevo registro");

    $("#color_fuente").val("#FFF8C6");
    $("#color_base").val("#FFF8C6");
    $("#color_base_f").val("#FFF8C6");
    $("#color_borde").val("#FFF8C6");

    $("#Listado-T").hide();
    $("#guardar-T").fadeIn();
    $('#frmGuardar-T')[0].reset();
    $("#Nom_Tema").focus();
    
}

function exportar(valor){
    swal({
        title: "¿Estas Seguro?",
        text: "¿Deseas Exportar este tema?",
        type: "info",
        showCancelButton: true,
        confirmButtonClass: "btn-primary",
        confirmButtonText: "Si deseo exportarlo",
        cancelButtonText: "Cancelar Acción",
        cancelButtonClass: "btn-outline-danger",
        closeOnConfirm: false,
        closeOnCancel: true,
        showLoaderOnConfirm: true
      }, function (isConfirm) {
        if (isConfirm) {
        setTimeout(function () {
            swal.close();
            $.ajax({
                url:"../expImpTemas/exportar.php",
                type:"POST",
                dateType:"html",
                data:{valor},
                success:function(respuesta){
                    preloader(1,"Generando archivo JSON","Se ha exportado el archivo de manera exitosa !")
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
}

function abrirModalImportar(){
    $("#modalImportar").modal("show");
}

function preloader(seg,mensaje,alerta){
    var s=parseInt(seg)*1000;
    abrirModalCarga(mensaje);
    setTimeout(function() {

        cerrarModalCarga(alerta);
    },s);
}

function importarTema(){
    var files = $('#image2')[0].files[0];
    var archivo=files.name;
    var ruta= "../expImpTemas/Temas/"+archivo;
    console.log(ruta);
    
    $.getJSON(ruta, function(data){
        //for para decorre las propiedades
        for(tema in data){

            var nombre_tema       = data[tema].nombre_tema;
            var color_letra       = data[tema].color_letra;
            var color_base        = data[tema].color_base;
            var color_base_fuerte = data[tema].color_base_fuerte;
            var color_borde       = data[tema].color_borde;
            var fecha_registro    = data[tema].fecha_registro;
            var hora_registro     = data[tema].hora_registro;

            $.ajax({
                url:"../expImpTemas/importar.php",
                type:"POST",
                dateType:"html",
                data:{nombre_tema,color_letra,color_base,color_base_fuerte,color_borde,fecha_registro,hora_registro},
                success:function(respuesta){
                    console.log(respuesta);
                    var bandera=respuesta;
                    if (bandera==0) {
                        preloader(1,"Importando Tema ...");
                        $("#modalImportar").modal("hide");
                        llenar_lista_T();
                        var idTema=$("#inicioIdTema").val();
                        aplicarTema(idTema,'otro');
                    }else{
                        swal({
                            title: "Error!",
                            text: "Ya existe un tema con el nombre "+nombre_tema,
                            type: "error",
                            confirmButtonClass: "btn-dark",
                            confirmButtonText: "Enterado"
                        }, function (isConfirm) {
                            alertify.message("Gracias !");
                        });
                    }
                   
                },
                error:function(xhr,status){
                    alert("Error en metodo AJAX"); 
                },
            });
        }
    });
}
$('#btnProbarG-T').click(function(){
    var colorF     =  $('#color_fuente').val();
    var colorB     =  $('#color_base').val();
    var colorBF    =  $('#color_base_f').val();
    var colorBorde =  $('#color_borde').val();
    var idTema     =  $("#inicioIdTema").val();
    cssTema(colorBF, colorB, colorF, colorBorde);
    setTimeout(function(){aplicarTema(idTema,'login')},5000);
    conteoRegreG();
    
});
$('#btnProbarA-T').click(function(){
    var colorF     =  $('#eColor_fuente').val();
    var colorB     =  $('#eColor_base').val();
    var colorBF    =  $('#eColor_base_f').val();
    var colorBorde =  $('#eColor_borde').val();
    var idTema     =  $("#inicioIdTema").val();
    cssTema(colorBF, colorB, colorF, colorBorde);
    setTimeout(function(){aplicarTema(idTema,'login')},5000);
    conteoRegreA();
});
$("#color_fuente, #color_base, #color_base_f, #color_borde").change(function(){
    var colorLetra = $("#color_fuente").val();
    var colorBase  = $("#color_base").val();
    var colorBaseF = $("#color_base_f").val();
    var colorBorde = $("#color_borde").val();
    if (colorLetra != '#000000' && colorBase != '#000000' && colorBaseF != '#000000' && colorBorde != '#000000') {
        $("#btnProbarG-T").removeAttr('disabled');
    }else{
        $("#btnProbarG-T").attr('disabled','disabled');
    }
});
var segundoInicio = 5;

function conteoRegreG() {
    alertify.error("El tema se quitara en: "+segundoInicio, 1);
    if (segundoInicio == 0) {
        segundoInicio = 5;
    } else {
        segundoInicio-=1;
        setTimeout(conteoRegreG, 1000);
    }
}
var segundoInicio = 5;

function conteoRegreA() {
    alertify.error("El tema se quitara en: "+segundoInicio, 1);
    if (segundoInicio == 0) {
        segundoInicio = 5;
    } else {
        segundoInicio-=1;
        setTimeout(conteoRegreA, 1000);
    }
}
$("#mostrarA").hide();

function Hover(color_fuente,color_base,color_base_fuerte,color_borde) {
    cssTema(color_base_fuerte, color_base, color_fuente, color_borde);
};

$(document).on('mouseout', 'button.aplicar', function () {
    var color_letra  = $("#inputColorLetra").val();
    var color_base   = $("#inputColorBase").val();
    var color_base_f = $("#inputColorBaseF").val();
    var color_borde  = $("#inputColorBorde").val();

    cssTema(color_base_f, color_base, color_letra, color_borde);
});