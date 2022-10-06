<?php
	include("conexion.php");
	include("validarSesion.php");

	$consulta  = "SELECT idAsesor FROM asignaasesor ORDER BY idAsesor DESC LIMIT 1";
	$consulta  = mysqli_query($conexion, $consulta);
	$consulta  = mysqli_fetch_array($consulta);
	$idAsesor = $consulta['idAsesor'];

	++$idAsesor;

	$codigodocente = $_POST["codigodocente"];
	$idtrabajo     = $_POST["idtrabajo"];

	$consultaId = "SELECT idTrabajo FROM asignaasesor WHERE idTrabajo = '$idtrabajo' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	if(!$consultaId){
		$consulta4 = " SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$codigodocente' ";
		$consulta4 = mysqli_query($conexion, $consulta4);
		$consulta4 = mysqli_fetch_array($consulta4);

		$consulta5 = " SELECT idTrabajo FROM trabajo WHERE idTrabajo = '$idtrabajo' ";
		$consulta5 = mysqli_query($conexion, $consulta5);
		$consulta5 = mysqli_fetch_array($consulta5);

		if($consulta4 && $consulta5){
			$sql = "INSERT INTO asignaasesor VALUES ('$idAsesor', '$codigodocente', '$idtrabajo')";

			$consulta1 = " SELECT CodigoDocente FROM numeroasesorias WHERE CodigoDocente = '$codigodocente' ";
			$consulta1 = mysqli_query($conexion, $consulta1);
			$consulta1 = mysqli_fetch_array($consulta1);

			if ($consulta1){

				$consulta3 = " SELECT Cantidad FROM numeroasesorias WHERE CodigoDocente = '$codigodocente' ";
				$consulta3 = mysqli_query($conexion, $consulta3);
				$consulta3 = mysqli_fetch_array($consulta3);
				$can = $consulta3['Cantidad'];

				++$can;

				$sql3 = "UPDATE numeroasesorias SET Cantidad='$can' WHERE CodigoDocente = '$codigodocente' ";

				if(mysqli_query($conexion, $sql3) ) {
				}else{
					echo "Error" . $sql3 . "<br>" . mysqli_error($conexion);
				}
			}else{
				$consulta2 = "SELECT idNumero FROM numeroasesorias ORDER BY idNumero DESC LIMIT 1";
				$consulta2  = mysqli_query($conexion, $consulta2);
				$consulta2  = mysqli_fetch_array($consulta2);
				$idNumero = $consulta2['idNumero'];

				++$idNumero;

				$cantidad=0;
				++$cantidad;

				$sql2 = "INSERT INTO numeroasesorias VALUES ('$idNumero', '$codigodocente', '$cantidad')";

				if( mysqli_query($conexion, $sql2) ){
				}else{
					echo "Error" . $sql2 . "<br>" . mysqli_error($conexion);
				}
			}

			if(mysqli_query($conexion, $sql) ) {
				echo '<script language="javascript">alert("Asesor asignado.");window.location.href="../perfiladministrador.php"</script>';
			}else{
				echo "Error" . $sql . "<br>" . mysqli_error($conexion);
			}
		}else{
			echo '<script language="javascript">alert("Error en codigo docente o idtrabajo.");window.location.href="../perfiladministrador.php"</script>';
		}
	}else{
		echo '<script language="javascript">alert("El trabajo ya tiene asesor.");window.location.href="../perfiladministrador.php"</script>';
	}
	mysqli_close($conexion);
?>