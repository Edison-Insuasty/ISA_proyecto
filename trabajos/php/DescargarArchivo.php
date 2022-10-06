<?php
	include("conexion.php");
	include("validarSesion.php");

	$cons = " SELECT idTrabajo FROM asignajurado WHERE CodigoDocente = '$_SESSION[codigodocente]' ";
	$cons = mysqli_query($conexion, $cons);
	$cons = mysqli_fetch_array($cons); 
	$idtrabajo = $cons['idTrabajo'];

	$s ="SELECT NombreTrabajo FROM trabajo WHERE idTrabajo = '$idtrabajo' ";
	$s = mysqli_query($conexion, $s);
	$s = mysqli_fetch_array($s);
	$s1=$s['NombreTrabajo'];

	copy('C:/xampp/htdocs/trabajos/archivo/'.$s1.'.pdf', 'C:/Users/Equipo 2/Downloads/'.$s1.'.pdf');

	echo '<script language="javascript">alert("Trabajo Descargado.");window.location.href="../perfildocente.php"</script>';
?>