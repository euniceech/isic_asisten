<?php
// Conexion mysqli
include'../conexion/conexionli.php';

include'../funciones/diasTranscurridos.php';
//Variable de Nombre
$varGral="-U";

$fecha=date("Y-m-d"); 

$cadena = "SELECT
                usuarios.id_usuario,
                usuarios.activo,
                (SELECT CONCAT(ap_paterno,' ',ap_materno,' ',nombre) 
                FROM datos WHERE datos.id_datos=usuarios.id_dato) as Persona,
                usuarios.nombre_usuario,
                usuarios.fecha_registro,
                usuarios.permiso_datos_persona,
                usuarios.permiso_ecivil,
                usuarios.permiso_usuario,
                usuarios.permiso_temas,
                usuarios.id_tema,
                temas.nombre_tema,
                datos.id_datos,
                usuarios.fecha_caducidad
            FROM
                usuarios
            INNER JOIN datos on datos.id_datos = usuarios.id_dato
            INNER JOIN temas on temas.id_tema = usuarios.id_tema
            ORDER BY id_usuario DESC";
$consultar = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);

?>
<div class="table-responsive">
<table id="example<?php echo $varGral;?>" class="table table-striped table-bordered" style="width:100%">

        <thead>
            <tr class='hTabla'>
                <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Restablecer Contraseña</th>
                <th scope="col">Permisos de Usuario</th>
                <th scope="col">Nombre de la Persona</th>
                <th scope="col">Usuario</th>
                <th scope="col">Creacion</th>
                <th scope="col">Status</th>
            </tr>
        </thead>

        <tbody>
        <?php
        // Recorro el arreglo y le asigno variables a cada valor del item
        $n=1;
        
        while( $row = mysqli_fetch_array($consultar) ) {

            $id          = $row[0];

            if ($row[1] == 1) {
                $chkChecado    = "checked";
                $dtnDesabilita = "";
                $chkValor      = "1";
            }else{
                $chkChecado    = "";
                $dtnDesabilita = "disabled";
                $chkValor      = "0";
            }

            $nom_persona        = $row[2];
            $nom_usuario        = $row[3];
            $fecha_registro     = $row[4];
            
            $dias_transcurridos = dias_transcurridos($fecha,$fecha_registro);
            $dias = ($dias_transcurridos > 1)?'Creado hace '.$dias_transcurridos.' días.':'Creado hace '.$dias_transcurridos.' día.';

            $p_datos_persona = $row[5];
            $p_ecivil        = $row[6];
            $p_usuario       = $row[7];
            $p_temas         = $row[8];
            $idtema          = $row[9];
            $nom_tema        = $row[10];
            $id_persona      = $row[11];
            $fechaCadu       = $row[12];

            ?>
            <tr class="centrar">
                <th scope="row" class="textoBase">
                    <?php echo $n?>
                </th>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="editar btn btn-outline-success btn-sm activo" id="btnEditar<?php echo $varGral?><?php echo $n?>" onclick="llenar_formulario_U('<?php echo $id?>', '<?php echo $nom_usuario?>', '<?php echo $id_persona?>', '<?php echo $idtema?>', '<?php echo $p_datos_persona?>', '<?php echo $p_ecivil?>', '<?php echo $p_usuario?>', '<?php echo $p_temas?>', '<?php echo $fechaCadu?>')">
                        <i class="far fa-edit fa-lg"></i>
                    </button>
                <td>
                    <button <?php echo $dtnDesabilita?> type="button" class="restablecer btn btn-outline-primary btn-sm activo" id="btnContra<?php echo $varGral?><?php echo $n?>" onclick="reiniciarContra('<?php echo $id?>')">
                        <i class="fas fa-sync fa-lg"></i>
                    </button>
                </td>
                <td style="width:15%;">
                    <button <?php echo $dtnDesabilita?> type="button" class="permisos btn btn-outline-warning btn-sm activo"  id="btnPermisos<?php echo $varGral?><?php echo $n?>" onclick="abrirModalPermisos('<?php echo $id?>','<?php echo $nom_persona?>','<?php echo $p_datos_persona?>','<?php echo $p_ecivil?>','<?php echo $p_usuario?>', '<?php echo $p_temas?>')">
                        <i class="fas fa-key fa-lg"></i>
                    </button>
                </td>
                <td style="width:25%;">
                    <label class="textoBase">
                        <strong><?php echo $nom_persona?></strong>       
                    </label>
                </td>
                <td>
                    <label class="textoBase">
                        <strong><?php echo $nom_usuario?></strong>       
                    </label>
                </td>
                <td style="width:25%;">
                    <label class="textoBase">
                        Creado desde hace: <strong><?php echo $dias?></strong>
                    </label>
                </td>
                <td style="width= 25px;">
                    <input value="<?php echo $chkValor?>" onchange="cambiar_estatus_U(<?php echo $id?>,<?php echo $n?>)" class="toggle-two" type="checkbox" <?php echo $chkChecado?> data-toggle="toggle" data-onstyle="outline-success" data-width="60" data-size="sm" data-offstyle="outline-danger" data-on="<i class='fa fa-check'></i> Si" data-off="<i class='fa fa-times'></i> No" id="check<?php echo $n?>">
                </td>
            </tr>
        <?php
        $n++;
        }
        ?>

        </tbody>
        <tfoot>
            <tr class='hTabla'>
            <th scope="col">#</th>
                <th scope="col">Editar</th>
                <th scope="col">Restablecer Contraseña</th>
                <th scope="col">Permisos de Usuario</th>
                <th scope="col">Nombre de la Persona</th>
                <th scope="col">Usuario</th>
                <th scope="col">Creacion</th>
                <th scope="col">Status</th>
            </tr>
        </tfoot>
    </table>
<div>

<?php
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexionLi
mysqli_close($conexionLi);
?>

<script type="text/javascript">
  var varGral='<?php echo $varGral?>';
  $(document).ready(function() {
        $('#example'+varGral).DataTable( {
            "language": {
                    // "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                    "url": "../plugins/dataTablesB4/langauge/Spanish.json"
                },
            "order": [[ 0, "asc" ]],
            "paging":   true,
            "ordering": true,
            "info":     true,
            "responsive": true,
            "searching": true,
            stateSave: true,
            dom: 'Bfrtip',
            lengthMenu: [
                [ 10, 25, 50, -1 ],
                [ '10 Registros', '25 Registros', '50 Registros', 'Todos' ],
            ],
            columnDefs: [ {
                // targets: 0,
                // visible: false
            }],
            buttons: [
                      {
                          text: "<i class='fas fa-plus fa-lg' aria-hidden='true'></i> &nbsp;Nuevo Registro",
                          className: 'btn btn-outline-primary btnEspacio',
                          id: 'btnNuevo',
                          action : function(){
                            nuevo_registro_U();
                          }
                      },
                      {
                          extend: 'excel',
                          text: "<i class='far fa-file-excel fa-lg' aria-hidden='true'></i> &nbsp;Exportar a Excel",
                          className: 'btn btn-outline-secondary btnEspacio',
                          title:'Lista_Usuarios',
                          id: 'btnExportar',
                          exportOptions: {
                            columns:  [4,5,6,7],
                          }
                      }

            ]
        } );
    } );

</script>

<script>
    $('.toggle-two').bootstrapToggle();
</script>