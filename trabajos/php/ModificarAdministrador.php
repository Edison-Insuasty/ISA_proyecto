<?php
	include("conexion.php");
	include("validarSesion.php");

	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$cargo               = $_POST["cargo"];
	$passwordactual      = $_POST["contraseñaactual"];
	$password            = $_POST["contraseñanueva"];
	
	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	$consu = "SELECT Password FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]' ";
	$consu = mysqli_query($conexion, $consu);
	$consu = mysqli_fetch_array($consu);

	if(password_verify($passwordactual, $consu['Password'])){
		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad' WHERE Cedula = '$_SESSION[cedula]' ";
		$sql1 = "UPDATE administrador SET Cargo='$cargo', Password='$passwordHash' WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfiladministrador.php"</script>';
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../perfiladministrador.php"</script>';
	}
	mysqli_close($conexion);
?>