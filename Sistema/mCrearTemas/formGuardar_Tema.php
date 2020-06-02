<?php
//Variable de Nombre
$varGral="-T";
?>
<form id="frmGuardar<?php echo $varGral?>">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="Nom_Tema">Nombre del tema:</label>
                <input type="text" class="form-control" id="Nom_Tema" autofocus required >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="color_fuente">Color de letra:</label>
                <input type="color" class="form-control" id="color_fuente" value="#000000" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="color_base">Color base:</label>
                <input type="color" class="form-control" id="color_base" value="#000000" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="color_base_f">Color base fuerte:</label>
                <input type="color" class="form-control" id="color_base_f" value="#000000" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="color_borde">Color de borde:</label>
                <input type="color" class="form-control" id="color_borde" value="#000000" >
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <button  type="button" class="btn btn-outline-danger  activo btnEspacio" id="btnCancelarG<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>

                <div class="col text-center">
                    <button type="button" onmousedown="audio.play()" class="btn btn-outline-dark  activo btnEspacio" id="btnProbarG<?php echo $varGral?>" disabled>
                        <i class='fa fa-play-circle fa-lg'></i>
                             Probar Tema
                    </button>
                </div>

                <div class="col text-right">
                    <button  type="submit" class="btn btn-outline-primary  activo btnEspacio" id="btnGuardar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Guardar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>
<script>
var audio = new Audio();
audio.src ="../audios/Synth Various EC0-34.mp3";
</script>