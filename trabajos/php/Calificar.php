<?php
	include("Conexion.php");
  	include("validarSesion.php");

  	$consulta  = "SELECT idCalificacion
				  FROM calificacion
				  ORDER BY idCalificacion DESC
				  LIMIT 1";
	$consulta  = mysqli_query($conexion, $consulta);
	$consulta  = mysqli_fetch_array($consulta);
	$idCalificacion = $consulta['idCalificacion'];
	
	++$idCalificacion;

	$codigodocente = $_SESSION[codigodocente];

	$idtrabajo = $_POST['idtrabajo2'];
	$nota = $_POST['nota'];

	$consulta1 = " SELECT idTrabajo FROM calificacion WHERE idTrabajo = '$idtrabajo' ";
	$consulta1  = mysqli_query($conexion, $consulta1);
	$consulta1  = mysqli_fetch_array($consulta1);

	if($nota<30){
		$estado = 'Reprobado';
	}else{
		$estado = 'Aprobado';
	}

	if(!$consulta1){
		$sql = "INSERT INTO calificacion VALUES ('$idCalificacion', '$codigodocente', '$idtrabajo', '$nota', '$estado')";
		if(mysqli_query($conexion, $sql)){
			echo '<script language="javascript">alert("Calificacion realizada.");window.location.href="../perfildocente.php"</script>';
		}else{
			echo "<br>Error: " . $consulta . "<br>" . mysqli_error($conexion);
			echo '<script language="javascript">alert("Error.");window.location.href="../perfildocente.php"</script>';
		}
	}else{
		echo '<script language="javascript">alert("El Trabajo ya esta calificado.");window.location.href="../perfildocente.php"</script>';
	}

?>