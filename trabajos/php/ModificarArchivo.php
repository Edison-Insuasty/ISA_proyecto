<?php
	include("conexion.php");
	include("validarSesion.php");

	$nombreproyecto = $_POST["nombreproyecto"];
	$password       = $_POST["contraseña"];

	$consu = "SELECT Password FROM estudiante WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
	$consu = mysqli_query($conexion, $consu);
	$consu = mysqli_fetch_array($consu);

	if(password_verify($password, $consu['Password'])){
		

		$consulta = " SELECT Nota FROM calificacion WHERE idTrabajo = (SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
		$consulta = mysqli_query($conexion, $consulta);
		$consulta = mysqli_fetch_array($consulta);

		

		

		if($consulta){
			echo '<script language="javascript">alert("El proyecto ya fue Calificado.");window.location.href="../perfilestudiante.php"</script>';
		}else{

			$s="SELECT NombreTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
			$s = mysqli_query($conexion, $s);
			$s = mysqli_fetch_array($s);
			$s1=$s['NombreTrabajo'];

			$s2 = "C:/xampp/htdocs/trabajos/archivo/$s1.pdf";

			unlink($s2);

			$ubicacion        = "archivo/$nombreproyecto.pdf";
			$archivo          = $_FILES['archivo'] ['tmp_name'];

			if(move_uploaded_file($archivo, "../$ubicacion")){

				$sql = "UPDATE trabajo SET NombreTrabajo='$nombreproyecto', ubicacion='$ubicacion' WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";

				//unlink($archivo);

				

				if(mysqli_query($conexion, $sql)) {
					echo '<script language="javascript">alert("Proyecto Modificado.");window.location.href="../perfilestudiante.php"</script>';
				}else{
					echo "Error" . $sql . "<br>" . 
					mysqli_error($conexion);
				}
			}
		}

			

	}else{
		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../perfilestudiante.php"</script>';
	}
	mysqli_close($conexion);
?>