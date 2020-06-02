<?php
// Conexion mysqli
include ("../conexion/conexionli.php");

$valor=$_POST["valor"];
$cadena = "SELECT
				id_datos,
				clave,
				nombre,
				ap_paterno,
				ap_materno,
				fecha_nac,
				correo,
				curp,
				ecivil.id_ecivil as edo_civil,
				descripcion,
				id_horario,
				turno,
				l_entrada,
				l_salida,
				m_entrada,
				m_salida,
				mi_entrada,
				mi_salida,
				j_entrada,
				j_salida,
				v_entrada,
				v_salida,
				s_entrada,
				s_salida,
				d_entrada,
				d_salida
			FROM
				datos
			INNER JOIN horarios ON datos.id_datos = horarios.id_datos_persona
			INNER JOIN ecivil ON datos.id_ecivil = ecivil.id_ecivil
			WHERE datos.activo = 1 AND clave = $valor";

$consultar = mysqli_query($conexionLi, $cadena);
//for ($arreglo = array (); $row = $consultar->fetch_assoc(); $arreglo[] = $row);
	$arreglo = $consultar->fetch_assoc();
	$data['status'] = 'ok';
	$data['result'] = $arreglo ;

//returns data as JSON format
echo json_encode($data);


?>