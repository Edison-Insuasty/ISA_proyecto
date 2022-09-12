<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$codigoadministrador = $_POST["codigoadministrador"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$credencial          = $_POST["credencial"];
	$cargo               = $_POST["cargo"];
	$password            = $_POST["contraseña"];
	
	$passwordHash = password_hash($password, PASSWORD_BCRYPT);
	
	$consultaId = "SELECT CodigoAdministrador
				   FROM administrador
				   WHERE CodigoAdministrador = '$codigoadministrador' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	$consultaId1 = "SELECT CodigoEstudiante
				   FROM estudiante
				   WHERE CodigoEstudiante = '$codigoadministrador' ";
	$consultaId1 = mysqli_query($conexion, $consultaId1);
	$consultaId1 = mysqli_fetch_array($consultaId1);

	$consultaId2 = "SELECT CodigoDocente
				   FROM docente
				   WHERE CodigoDocente = '$codigoadministrador' ";
	$consultaId2 = mysqli_query($conexion, $consultaId2);
	$consultaId2 = mysqli_fetch_array($consultaId2);

	$consultaCedula = "SELECT Cedula
				   FROM persona
				   WHERE Cedula = '$cedula' ";
	$consultaCedula = mysqli_query($conexion, $consultaCedula);
	$consultaCedula = mysqli_fetch_array($consultaCedula);

	if($credencial==111){
		if(!$consultaCedula){
			if(!$consultaId && !$consultaId1 && !$consultaId2){
				$sql = "INSERT INTO persona VALUES ('$cedula', '$nombre', '$apellidos', '$correo', '$telefono', '$direccion', '$ciudad')";
				$sql1 = "INSERT INTO administrador VALUES ('$codigoadministrador', '$cedula', '$credencial', '$cargo', '$passwordHash')";
				if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
					echo '<script language="javascript">alert("Tu cuenta ha sido creada");window.location.href="../index.html"</script>';
				}else{
					echo "Error" . $sql . $sql1 . "<br>" . 
					mysqli_error($conexion);
				}
			}else{
				echo '<script language="javascript">alert("El Codigo ya existe");window.location.href="../index.html"</script>';
			}
		}else{
			echo '<script language="javascript">alert("Ya existe un registro con ese numero de cedula");window.location.href="../index.html"</script>';
		}
	}else{
		echo '<script language="javascript">alert("Credencial Incorrecta");window.location.href="../index.html"</script>';
	}
	mysqli_close($conexion);
?>