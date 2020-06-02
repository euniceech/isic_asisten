<div class="modal fade" id="modalImportar" tabindex="-1" role="dialog" aria-labelledby="modalDatosCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document" >
            <div class="modal-content">
            <div class="modal-header" >
                <h5 class="modal-title" id="txtTitularFoto">Importar Tema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="formSubida">
                
                    <input id="image2" type="file"  class="file"  data-theme="fas">
                
                    <input type="hidden" class="form-control-file" name="claveArchivo" id="claveArchivo" >
                    <input type="hidden" class="form-control-file" name="AtamanoKB" id="AtamanoKB" value="3000">
                    <div class="col text-center">
                    <button type="button" onclick="importarTema();" class="btn btn-outline-dark" style="margin-top:8px;">
                        <i class="fas fa-download"></i> Importar Tema
                    </button>
                    </div>
                </form>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">
                        <i class="fas fa-times"></i> Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modalCarga" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" >
        <div class="modal-dialog modal-sm modal-dialog-centered" >
            <div class="modal-content modal-carga">

            <div class="modal-body modal-carga" style="background:#fff">
                <div class="row">
                <div class="col">
                    <div class="form-control modal-carga">
                    <p class='centrar modal-carga-letra'>
                        <i class="fa fa-spinner fa-pulse fa-4x fa-fw"></i>
                    </p>
                    <p class="centrar animated infinite heartBeat modal-carga-letra" style="font-size:12px;">
                        Cargando...
                    </p>
                    <p id="msjCarga" class="centrar animated infinite heartBeat modal-carga-letra" style="font-size:12px;"></p>
                    </div>
                </div>
                </div>
                
            </div>

            </div>
        </div>
    </div>