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
$cadena = "INSERT INTO asistencias
				(id_datos,
				fecha_entrada,
				hora_entrada, 
				incidencia_entrada)
			VALUES
				('$id',
				'$fecha',
				'$hora', 
				'$incidencia')";
$insertar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>