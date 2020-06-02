<?php
// Conexion mysqli
include'../conexion/conexionli.php';

//Recibo valores con el metodo POST
$id          = $_POST['id'];
$nombre      = trim($_POST['nombre']);
$colorLetra  = trim($_POST['colorLetra']);
$colorBase   = trim($_POST['colorBase']);
$colorBaseF  = trim($_POST['colorBaseF']);
$colorBorde  = trim($_POST['colorBorde']);

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

//Inserto registro en tabla TEMAS 
$cadena = "UPDATE temas 
			SET
                nombre_tema = '$nombre',
                color_letra = '$colorLetra',
                color_base = '$colorBase',
                color_base_fuerte = '$colorBaseF',
                color_borde = '$colorBorde',
                fecha_registro = '$fecha', 
				hora_registro  = '$hora'
			WHERE 
                id_tema= $id";

$actualizar = mysqli_query($conexionLi, $cadena);

//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>