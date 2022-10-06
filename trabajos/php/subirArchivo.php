<?php
	include("conexion.php");
	include("validarSesion.php");
	
	$consulta  = "SELECT idTrabajo
				  FROM trabajo
				  ORDER BY idTrabajo DESC
				  LIMIT 1";
	$consulta  = mysqli_query($conexion, $consulta);
	$consulta  = mysqli_fetch_array($consulta);
	$idTrabajo = $consulta['idTrabajo'];
	
	++$idTrabajo;

	$codigoestudiante = $_SESSION[codigoestudiante];
	$nombreproyecto   = $_POST["nombreproyecto"];

	$consultaId       = "SELECT CodigoEstudiante   
				         FROM trabajo
				         WHERE CodigoEstudiante = '$codigoestudiante' ";
	$consultaId       = mysqli_query($conexion, $consultaId);
	$consultaId       = mysqli_fetch_array($consultaId);

	$consultanombre  = "SELECT NombreTrabajo
				        FROM trabajo
				        WHERE NombreTrabajo = '$nombreproyecto' ";
	$consultanombre  = mysqli_query($conexion, $consultanombre);
	$consultanombre  = mysqli_fetch_array($consultanombre); 

	if($consultanombre){
		echo '<script language="javascript">alert("Ya existe un mismo nombre en la base de datos.");window.location.href="../perfilestudiante.php"</script>';
	}else{
		if(!$consultaId){
			$ubicacion        = "archivo/$nombreproyecto.pdf";
			$archivo          = $_FILES['archivo'] ['tmp_name'];
			if(move_uploaded_file($archivo, "../$ubicacion")){
				$consulta = "INSERT INTO trabajo VALUES ('$idTrabajo', '$codigoestudiante', '$nombreproyecto', '$ubicacion')";

				if(mysqli_query($conexion, $consulta)){
					echo '<script language="javascript">alert("Trabajo de grado guardado exitosamente.");window.location.href="../perfilestudiante.php"</script>';
				}else{
					echo "<br>Error: " . $consulta . "<br>" . mysqli_error($conexion);
					echo '<script language="javascript">alert("Error.");window.location.href="../perfilestudiante.php"</script>';
				}
			}
		}else{
			echo '<script language="javascript">alert("Ya registro su proyecto.");window.location.href="../perfilestudiante.php"</script>';
		}
	}	

	mysqli_close($conexion);
	
?>