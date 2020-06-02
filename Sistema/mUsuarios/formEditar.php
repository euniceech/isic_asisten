<?php
//Variable de Nombre
$varGral="-U";
?>
<form id="frmActualizar<?php echo $varGral?>">

<input type="hidden" id="eId_Usuario">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="eNom_usuario">Nombre de usuario:</label>
                <input type="text" class="form-control" id="eNom_usuario" required placeholder="Usuario...">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="eListaPersonas">Persona:</label>
                <select disabled id="eListaPersonas" class="select2" style="width: 100%;">
                    
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
            <div class="form-group">
                <label for="eListaTemas">Tema:</label>
                <select id="eListaTemas" class="select2" style="width: 100%;">
                    
                </select>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="form-group">
                <label for="efechaCadu">Fecha de Caducidad:</label>
                <input type="date" class="form-control activo" id="efechaCadu" required value="<?php echo $fecha ?>">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="eP_datosP">
                    Permiso Datos Personales
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="eP_Ecivil">
                    Permiso Estado Civil
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="eP_usuarios">
                    Permiso Usuarios
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="eP_temas">
                    Permiso Crear Temas
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

                <div class="col text-right">
                    <button  type="submit" class="btn btn-outline-primary  activo btnEspacio" id="btnActualizar<?php echo $varGral?>">
                        <i class='fa fa-save fa-lg'></i>
                        Guardar Información
                    </button>
                </div>
            </div>
        </div>

    </div>

</form>