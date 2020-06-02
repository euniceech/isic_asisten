<?php
// Conexion mysqli
include'../conexion/conexionli.php';
//Variable de Nombre
$a   = $_POST['nombre'];
$idC = $_POST['id'];

    $cadena = "SELECT
                    nombre_tema,
                    id_tema
                FROM
                    temas
                WHERE
                    nombre_tema = '$a'";
            
$Result = mysqli_query($conexionLi, $cadena);
//$row = mysqli_fetch_array($consultar);
    while($row = mysqli_fetch_array($Result)) {
                $nombre = $row[0];
                $id = $row[1];
                $res = ($nombre == $a && $id != $idC) ? 'Si' : 'No' ;
                echo $res;
                }             
//En caso de error imprime
print_r(mysqli_error($conexionLi));
//Cierro la conexionLi
mysqli_close($conexionLi);
?>
