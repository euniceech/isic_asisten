<?php
// Conexion mysqli
include'../conexion/conexionli.php';

$cadena = "SELECT
                datos.id_datos AS idPersona,
                concat(datos.ap_paterno,' ',datos.ap_materno,' ',datos.nombre) AS Persona,
                datos.clave
                FROM
                datos
                LEFT JOIN usuarios ON datos.id_datos = usuarios.id_dato
                WHERE
                    datos.activo = 1
                ORDER BY
                datos.id_datos";
$consultar = mysqli_query($conexionLi, $cadena);

while($row = mysqli_fetch_array($consultar))
{  
	if ($rowl[0]!=$row[0]) {
    ?>
    <option value="<?php echo $row[0];?>"><?php echo $row[1];?></option>
    <?php
	}
}
?>
