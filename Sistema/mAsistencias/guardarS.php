<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id     = trim($_POST['id']);
$incidencia    = trim($_POST['incidencia']);
$hora = trim($_POST['hora']);
$activo    = 1;

$fecha=date("Y-m-d"); 

//Inserto registro en tabla pacientes 
$cadena = "UPDATE asistencias
			SET fecha_salida = '$fecha',
				hora_salida = '$hora',
				incidencia_salida = '$incidencia'
			WHERE
				id_datos = '$id'
			AND fecha_entrada = '$fecha'";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>