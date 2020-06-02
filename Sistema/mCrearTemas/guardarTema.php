<?php

include'../conexion/conexionli.php';

//Variable de Nombre
$varGral="-T";

$nombre     = trim($_POST['nombre']);
$colorLetra = trim($_POST['colorLetra']);
$colorBase  = trim($_POST['colorBase']);
$colorBaseF = trim($_POST['colorBaseF']);
$colorBorde = trim($_POST['colorBorde']);

$activo    = 1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");
$cadenaMenu = "INSERT INTO temas
                            (nombre_tema,
                            color_letra,
                            color_base,
                            color_base_fuerte,
                            color_borde,
                            activo,
                            fecha_registro,
                            hora_registro)
                            VALUES
                            ('$nombre',
                            '$colorLetra',
                            '$colorBase',
                            '$colorBaseF',
                            '$colorBorde',
                            $activo,
                            '$fecha',
                            '$hora')";
$consultarMenu = mysqli_query($conexionLi, $cadenaMenu);
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>