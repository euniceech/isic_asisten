<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$valor = $_POST['valor'];


//seleccione registros tabla datos
$cadena = "SELECT
				clave
			FROM
				datos
			INNER JOIN horarios ON datos.id_datos = horarios.id_datos_persona
			INNER JOIN ecivil ON datos.id_ecivil = ecivil.id_ecivil
			WHERE datos.activo = 1 AND clave = $valor";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>