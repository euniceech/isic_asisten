<?php
// Conexion mysqli
include'../conexion/conexionli.php';
//Variable de Nombre

$usuario    = $_POST['nombre_usuario'];

    $cadena = "SELECT
                    nombre_usuario,
                    id_usuario
                FROM
                    usuarios
                WHERE
                    nombre_usuario = '$usuario'";
            
$Result = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);
    while($row = mysqli_fetch_array($Result)) {
                $nombre = $row[0];        
            }             
            $res = (($nombre == NULL)) ? 'Si' : 'No' ;
            echo $res;
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexionLi
mysqli_close($conexionLi);
?>