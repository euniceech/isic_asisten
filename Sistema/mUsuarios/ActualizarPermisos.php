<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id       = $_POST['id'];
$datos_p  = trim($_POST['datos_p']); 
$e_civil  = trim($_POST['e_civil']); 
$usuarios = trim($_POST['usuarios']); 
$temas    = trim($_POST['temas']); 

//Se actualiza registro en tabla usuarios
$cadena = "UPDATE usuarios 
			SET 
				permiso_datos_persona  = '$datos_p',
				permiso_ecivil         = '$e_civil',
				permiso_usuario        = '$usuarios',
				permiso_temas          = '$temas'
			WHERE 
				id_usuario = $id";

$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>