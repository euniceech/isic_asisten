<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id             = $_POST['id'];
$nombre_persona = $_POST['nombre_persona'];
$nombre_usuario = trim($_POST['nombre_usuario']);
$nombre_tema    = $_POST['nombre_tema']; 
$fechaCadu      = trim($_POST['efechaCadu']); 
$p_datosP       = trim($_POST['p_datos_persona']); 
$p_ecivil       = trim($_POST['p_ecivil']); 
$p_usuarios     = trim($_POST['p_usuarios']); 
$p_temas        = trim($_POST['p_temas']); 

//Se actualiza registro en tabla usuarios
$cadena = "UPDATE usuarios 
			SET 
				nombre_usuario        		= '$nombre_usuario',
				id_dato 		            = $nombre_persona,
				id_tema                     = $nombre_tema,
                fecha_caducidad 			= '$fechaCadu',
				permiso_datos_persona       = '$p_datosP',
				permiso_ecivil              = '$p_ecivil',
				permiso_usuario             = '$p_usuarios',
				permiso_temas               = '$p_temas'
			WHERE 
				id_usuario = $id";

$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>