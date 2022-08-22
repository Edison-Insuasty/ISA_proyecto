<?php
	include("conexion.php");
	include("validarSesion.php");
	
	$consulta  = "SELECT idTrabajo
				  FROM trabajos
				  ORDER BY idTrabajo DESC
				  LIMIT 1";
	$consulta  = mysqli_query($conexion, $consulta);
	$consulta  = mysqli_fetch_array($consulta);
	$idTrabajo = $consulta['idTrabajo'];
	
	++$idTrabajo;

	$codigoadministrador = "SELECT CodigoAdministrador FROM administrador ORDER BY RAND()
				            LIMIT 1";
	$codigoadministrador = mysqli_query($conexion, $codigoadministrador);
	$codigoadministrador = mysqli_fetch_array($codigoadministrador);
	$codigoadministrador = $codigoadministrador['CodigoAdministrador'];

	$codigoestudiante = $_POST["codigoestudiante"];
	$codigoasesor     = "SELECT CodigoDocente FROM docente ORDER BY RAND()
				         LIMIT 1";
	$codigoasesor     = mysqli_query($conexion, $codigoasesor);
	$codigoasesor     = mysqli_fetch_array($codigoasesor);
	$codigodocente    = $codigoasesor['CodigoDocente'];

	$codigojurado     = "SELECT CodigoDocente FROM docente ORDER BY RAND()
				         LIMIT 1";
	$codigojurado     = mysqli_query($conexion, $codigojurado);
	$codigojurado     = mysqli_fetch_array($codigojurado);
	$codigodocente1   = $codigojurado['CodigoDocente'];

	$calificacion     = "pendiente";
	$estado           = "pendiente";
	
	$ubicacion        = "archivo/$idTrabajo.pdf";
	$archivo          = $_FILES['archivo'] ['tmp_name'];

	$consultaId       = "SELECT CodigoEstudiante
				         FROM trabajos
				         WHERE CodigoEstudiante = '$codigoestudiante' ";
	$consultaId       = mysqli_query($conexion, $consultaId);
	$consultaId       = mysqli_fetch_array($consultaId);

	if(!$consultaId){
		if(move_uploaded_file($archivo, "../$ubicacion")){
			$consulta = "INSERT INTO trabajos VALUES ('$idTrabajo', '$codigoadministrador', '$codigoestudiante', '$codigodocente', '$codigodocente1', '$ubicacion', '$calificacion', '$estado')";
			if(mysqli_query($conexion, $consulta)){
				echo "<img src='../img/exito.jpg' width='800' height='550' align='center'>";
				echo "<script>alert('Tu trabajo de grado fue guardado exitosamente.');</script> ";
				echo "<a href=' ../perfilestudiante.php' bg-red><h1><i><b>Aceptar.</b></i></h1></a>";
			}else{
				echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
				echo "<script>alert('Error');</script> ";
				echo "<br>Error: " . $consulta . "<br>" . mysqli_error($conexion);
				echo "<a href=' ../perfilestudiante.php' bg-red><h1><i><b>Volver.</b></i></h1></a>";
			}
		}
	}else{
		echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
		echo "<script>alert('El Codigo de estudiante ya existe en la base de datos, ya registro su proyecto.');</script> ";
		echo "<a href=' ../perfilestudiante.php' bg-red><h1><i><b>Volver.</b></i></h1></a>";
	}
	mysqli_close($conexion);
?>