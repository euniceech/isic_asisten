<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id_AS = $_POST['id_AS'];

$fecha=date("Y-m-d"); 
//seleccione registros tabla datos
$cadena = "SELECT
				id_asistencia,
				id_datos,
				fecha_entrada,
				hora_entrada,
				incidencia_entrada,
				fecha_salida,
				hora_salida,
				incidencia_salida
			FROM
				asistencias
			WHERE
				id_datos = $id_AS
			AND fecha_entrada = '$fecha'";

$actualizar = mysqli_query($conexionLi, $cadena);
$row_cnt = $actualizar->num_rows;

echo $row_cnt;
//Cierro la conexion
mysqli_close($conexionLi);
?>