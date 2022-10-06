<?php
	include("conexion.php");
	include("validarSesion.php");

	$codigo   = $_POST["codigo"];

	$consulta = "SELECT * FROM estudiante WHERE CodigoEstudiante = '$codigo' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);

	$c = $consulta['Cedula'];

	$consulta1 = "SELECT Cedula FROM persona WHERE Cedula = (SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$codigo') ";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT * FROM docente WHERE CodigoDocente = '$codigo' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);

	$c1 = $consulta2['Cedula'];

	$consulta3 = "SELECT Cedula FROM persona WHERE Cedula = (SELECT Cedula FROM docente WHERE CodigoDocente = '$codigo') ";
	$consulta3 = mysqli_query($conexion, $consulta3);
	$consulta3 = mysqli_fetch_array($consulta3);

	$consulta4 = "SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
	$consulta4 = mysqli_query($conexion, $consulta4);
	$consulta4 = mysqli_fetch_array($consulta4);

	$consulta8 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]' ";
	$consulta8 = mysqli_query($conexion, $consulta8);
	$consulta8 = mysqli_fetch_array($consulta8);

	if($consulta && $consulta1){

		$eliminar2 = "DELETE FROM trabajo WHERE CodigoEstudiante = '$codigo' ";
		$consu2 = mysqli_query($conexion, $eliminar2);

		$eliminar = "DELETE FROM estudiante WHERE CodigoEstudiante = '$codigo' ";
		$consu = mysqli_query($conexion, $eliminar);
		
		$eliminar1 = "DELETE FROM persona WHERE Cedula = '$c' ";
		$consu1 = mysqli_query($conexion, $eliminar1);

		echo '<script language="javascript">alert("Cuenta Eliminada.");window.location.href="../perfiladministrador.php"</script>';
	}else if($consulta2 && $consulta3){

		$eliminar8 = "DELETE FROM numeroasesorias WHERE CodigoDocente = '$codigo' ";
		$consu8 = mysqli_query($conexion, $eliminar8);

		$eliminar9 = "DELETE FROM numerojurados WHERE CodigoDocente = '$codigo' ";
		$consu9 = mysqli_query($conexion, $eliminar9);

		$eliminar3 = "DELETE FROM calificacion WHERE CodigoDocente = '$codigo' ";
		$consu3 = mysqli_query($conexion, $eliminar3);

		$eliminar4 = "DELETE FROM comentario WHERE CodigoDocente = '$codigo' ";
		$consu4 = mysqli_query($conexion, $eliminar4);

		$eliminar5 = "DELETE FROM asignajurado WHERE CodigoDocente = '$codigo' ";
		$consu5 = mysqli_query($conexion, $eliminar5);

		$eliminar6 = "DELETE FROM asignaasesor WHERE CodigoDocente = '$codigo' ";
		$consu6 = mysqli_query($conexion, $eliminar6);

		$eliminar7 = "DELETE FROM docente WHERE CodigoDocente = '$codigo' ";
		$consu7 = mysqli_query($conexion, $eliminar7);
		
		$eliminar8 = "DELETE FROM persona WHERE Cedula = '$c1' ";
		$consu8 = mysqli_query($conexion, $eliminar8);

		echo '<script language="javascript">alert("Cuenta Eliminada.");window.location.href="../perfiladministrador.php"</script>';
	}else if($consulta4){

		$consulta7 = " SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
		$consulta7 = mysqli_query($conexion, $consulta7);
		$consulta7 = mysqli_fetch_array($consulta7);

		if($consulta7){

			$consulta9 = " SELECT idTrabajo FROM asignaasesor WHERE idTrabajo = '$consulta7[idTrabajo]' ";
			$consulta9 = mysqli_query($conexion, $consulta9);
			$consulta9 = mysqli_fetch_array($consulta9);

			if($consulta9){

				$consulta12 = " SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = '$consulta7[idTrabajo]'  ";
				$consulta12 = mysqli_query($conexion, $consulta12);
				$consulta12 = mysqli_fetch_array($consulta12);

				if($consulta12){
					$consulta11 = " SELECT Cantidad FROM numeroasesorias WHERE CodigoDocente = '$consulta12[CodigoDocente]' ";
					$consulta11 = mysqli_query($conexion, $consulta11);
					$consulta11 = mysqli_fetch_array($consulta11);
					$can = $consulta11['Cantidad'];

					--$can;

					$sql3 = "UPDATE numeroasesorias SET Cantidad='$can' WHERE CodigoDocente = '$consulta12[CodigoDocente]' ";

					if(mysqli_query($conexion, $sql3) ) {
						echo '<script language="javascript">alert("Se le resto un trabajo al Asesor.");window.location.href="../perfilestudiante.php"</script>';
					}else{
						echo "Error" . $sql3 . "<br>" . mysqli_error($conexion);
					}
				}

				$eliminar10 = "DELETE FROM comentario WHERE idTrabajo = '$consulta7[idTrabajo]' ";
				$consu10 = mysqli_query($conexion, $eliminar10);

				$eliminar12 = "DELETE FROM asignaasesor WHERE idTrabajo = '$consulta7[idTrabajo]' ";
				$consu12 = mysqli_query($conexion, $eliminar12);
			}

			$consulta10 = " SELECT idTrabajo FROM asignajurado WHERE idTrabajo = '$consulta7[idTrabajo]' ";
			$consulta10 = mysqli_query($conexion, $consulta10);
			$consulta10 = mysqli_fetch_array($consulta10);

			if($consulta10){

				$consulta13 = " SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = '$consulta7[idTrabajo]'  ";
				$consulta13 = mysqli_query($conexion, $consulta13);
				$consulta13 = mysqli_fetch_array($consulta13);

				if($consulta13){
					$consulta14 = " SELECT Cantidad FROM numerojurados WHERE CodigoDocente = '$consulta13[CodigoDocente]' ";
					$consulta14 = mysqli_query($conexion, $consulta14);
					$consulta14 = mysqli_fetch_array($consulta14);
					$can = $consulta14['Cantidad'];

					--$can;

					$sql4 = "UPDATE numerojurados SET Cantidad='$can' WHERE CodigoDocente = '$consulta13[CodigoDocente]' ";

					if(mysqli_query($conexion, $sql4) ) {
						echo '<script language="javascript">alert("Se le resto un trabajo al jurado.");window.location.href="../perfilestudiante.php"</script>';
					}else{
						echo "Error" . $sql4 . "<br>" . mysqli_error($conexion);
					}
				}

				$eliminar9 = "DELETE FROM calificacion WHERE idTrabajo = '$consulta7[idTrabajo]' ";
				$consu9 = mysqli_query($conexion, $eliminar9);

				$eliminar11 = "DELETE FROM asignajurado WHERE idTrabajo = '$consulta7[idTrabajo]' ";
				$consu11 = mysqli_query($conexion, $eliminar11);
			}

			$s="SELECT NombreTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
			$s = mysqli_query($conexion, $s);
			$s = mysqli_fetch_array($s);
			$s1=$s['NombreTrabajo'];

			$s2 = "C:/xampp/htdocs/trabajos/archivo/$s1.pdf";

			unlink($s2);

			$eliminar13 = "DELETE FROM trabajo WHERE idTrabajo = '$consulta7[idTrabajo]' ";
			$consu13 = mysqli_query($conexion, $eliminar13);

			echo '<script language="javascript">alert("Trabajo Eliminado.");window.location.href="../perfilestudiante.php"</script>';
		}else{
			echo '<script language="javascript">alert("Aun no registra trabajo.");window.location.href="../perfilestudiante.php"</script>';
		}
	}else if($consulta8) {

		if($codigo != $consulta && $codigo != $consulta2 ){
			echo '<script language="javascript">alert("Codigo incorrecto.");window.location.href="../perfiladministrador.php"</script>';
		}else{
			$eliminar = "DELETE FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]' ";
			$consu = mysqli_query($conexion, $eliminar);

			$eliminar1 = "DELETE FROM persona WHERE Cedula = '$_SESSION[cedula]' ";
			$consu1 = mysqli_query($conexion, $eliminar1);

			echo '<script language="javascript">alert("Cuenta Eliminada.");window.location.href="../index.html"</script>';
		}
	}
	
?>