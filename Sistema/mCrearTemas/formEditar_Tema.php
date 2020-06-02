<?php
//Variable de Nombre
$varGral="-T";
?>
<form id="frmActualizar<?php echo $varGral?>">

<input type="hidden"  id="eId_tema">

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="form-group">
                <label for="eNom_tema">Nombre del tema:</label>
                <input type="text" id="eNom_tema" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="eColor_fuente">Color de letra:</label>
                <input type="color" class="form-control" id="eColor_fuente" required >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="eColor_base">Color base:</label>
                <input type="color" class="form-control" id="eColor_base" required >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="eColor_base_f">Color base fuerte:</label>
                <input type="color" class="form-control" id="eColor_base_f" required >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <label for="eColor_borde">Color de borde:</label>
                <input type="color" class="form-control" id="eColor_borde" required >
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col text-left">
                    <button  type="button" class="btn btn-outline-danger  activo btnEspacio" id="btnCancelarA<?php echo $varGral?>">
                        <i class='fa fa-ban fa-lg'></i>
                        Cancelar
                    </button>
                </div>

                <div class="col text-center">
                    <button type="button" onmousedown="audio.play()" class="btn btn-outline-dark  activo btnEspacio" id="btnProbarA<?php echo $varGral?>">
                        <i class='fa fa-play-circle fa-lg'></i>
                             Probar Tema
                    </button>
                </div>

                <div class="col text-right">
                    <button  type="submit" class="btn btn-outline-success  activo btnEspacio" id="btnActualizar<?php echo $varGral?>">
                        <i class='fa fa-bolt fa-lg'></i>
                        Actualizar Información
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