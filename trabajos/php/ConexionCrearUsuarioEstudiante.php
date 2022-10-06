<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$codigoestudiante    = $_POST["codigoestudiante"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$programa            = $_POST["programa"];
	$password            = $_POST["contraseña"];
	$repitepassword      = $_POST["repitecontraseña"];

	if($password == $repitepassword){
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		
		$consultaId = "SELECT CodigoEstudiante FROM estudiante WHERE CodigoEstudiante = '$codigoestudiante' ";
		$consultaId = mysqli_query($conexion, $consultaId);
		$consultaId = mysqli_fetch_array($consultaId);

		$consultaId1 = "SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$codigoestudiante' ";
		$consultaId1 = mysqli_query($conexion, $consultaId1);
		$consultaId1 = mysqli_fetch_array($consultaId1);

		$consultaId2 = "SELECT CodigoAdministrador FROM administrador WHERE CodigoAdministrador = '$codigoestudiante' ";
		$consultaId2 = mysqli_query($conexion, $consultaId2);
		$consultaId2 = mysqli_fetch_array($consultaId2);

		$consultaCedula = "SELECT Cedula FROM estudiante WHERE Cedula = '$cedula' ";
		$consultaCedula = mysqli_query($conexion, $consultaCedula);
		$consultaCedula = mysqli_fetch_array($consultaCedula);

		if(!$consultaCedula){
			if(!$consultaId && !$consultaId1 && !$consultaId2){
				$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad')";
				$sql1 = "INSERT INTO estudiante VALUES ('$codigoestudiante', '$cedula', '$programa', '$passwordHash')";
				if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
					echo '<script language="javascript">alert("La cuenta del estudiante ha sido creada exitosamente.");window.location.href="../perfiladministrador.php"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
				}
			}else{
				echo '<script language="javascript">alert("El Codigo ya existe.");window.location.href="../perfiladministrador.php"</script>';
			}
		}else{
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula.");window.location.href="../perfiladministrador.php"</script>';
		}
	}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}
	mysqli_close($conexion);
?>