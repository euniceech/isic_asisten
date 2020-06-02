<?php
include'../conexion/conexionli.php';
//Variable de Nombre
$varGral="-U";

$nom_persona     = trim($_POST['nombre_persona']);
$nom_usuario     = trim($_POST['nombre_usuario']);
$fechaCadu       = trim($_POST['fechaCadu']);
$nom_tema        = trim($_POST['nom_tema']);
$p_datos_persona = trim($_POST['p_datos_persona']);
$p_ecivil        = trim($_POST['p_ecivil']);
$p_usuarios      = trim($_POST['p_usuarios']);
$p_temas         = trim($_POST['p_temas']);
$activo          = 1;
$contra          = 12345678;
$fecha           = date("Y-m-d"); 

$cadenaMenu = "INSERT INTO usuarios
                            (id_dato,
                            id_tema,
                            nombre_usuario,
                            contra,
                            permiso_datos_persona,
                            permiso_ecivil,
                            permiso_usuario,
                            permiso_temas,
                            fecha_caducidad,
                            fecha_registro,
                            activo)
                            VALUES
                            ('$nom_persona',
                            '$nom_tema',
                            '$nom_usuario',
                            $contra,
                            '$p_datos_persona',
                            '$p_ecivil',
                            '$p_usuarios',
                            '$p_temas',
                            '$fechaCadu',
                            '$fecha',
                            $activo)";
$consultarMenu = mysqli_query($conexionLi, $cadenaMenu);
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexion
mysqli_close($conexionLi);
?>