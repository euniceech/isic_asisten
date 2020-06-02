<!-- Modal -->
<div class="modal fade" id="modalPermisos-U" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header" >
        <h5 class="modal-title" id="modalTitle-Permisos">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <input type="hidden" id="id_usuario">

      <div class="modal-body">
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="mP_datosP">
                        Permiso Datos Personales
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="mP_Ecivil">
                        Permiso Estado Civil
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="mP_usuarios">
                        Permiso Usuarios
              </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
              <div class="form-group">
                <input type="checkbox" data-toggle="toggle" data-size="sm" data-onstyle="outline-success" data-offstyle="outline-danger" data-on="Si" data-off="No" id="mP_temas">
                        Permiso Crear Temas
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">
            <i class="fas fa-ban"></i>
                Cerrar
        </button>
        <button id="btnGuardarPermisos" type="button" class="btn btn-success" onclick="Actualizar_Permisos();">
            <i class="fas fa-save"></i>
                &nbsp;Guardar
        </button>
      </div>
    </div>
  </div>
</div>
