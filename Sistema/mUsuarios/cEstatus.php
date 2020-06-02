<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

//Recibo valores con el metodo POST
$id          = $_POST['id'];
$contravalor = $_POST['contravalor'];


//Se actualiza registro en tabla usuarios
$cadena = "UPDATE usuarios 
			SET
				activo=$contravalor
			WHERE 
				id_usuario= $id";

echo $contraValor;
$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>