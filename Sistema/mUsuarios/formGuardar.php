<?php
//Variable de Nombre
$varGral="-U";
?>
<form id="frmGuardar<?php echo $varGral?>">

<input type="hidden"  id="nomUsuarioG">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="nom_usuario">Nombre de usuario:</label>
                <input type="text" class="form-control" id="nom_usuario" autofocus required placeholder="Usuario...">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="ListaPersonas">Persona:</label>
                <select id="ListaPersonas" class="select2" style="width: 100%;">
                    
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="ListaTemas">Tema:</label>
                <select id="ListaTemas" class="select2" style="width: 100%;">
                    
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="fechaCadu">Fecha de Caducidad:</label>
                <input type="date" class="form-control activo" id="fechaCadu" required value="<?php echo $fecha ?>">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="p_datosP">
                        Permiso Datos Personales
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="p_Ecivil">
                        Permiso Estado Civil
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="p_usuarios">
                        Permiso Usuarios
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="p_temas">
                        Permiso Crear Temas
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