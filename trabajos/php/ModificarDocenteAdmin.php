<?php
	include("conexion.php");
	include("validarSesion.php");

	$codigo              = $_POST["codigo"];
	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$especializacion     = $_POST["especializacion"];
	$password            = $_POST["contraseña"];
	$repitepassword      = $_POST["repitecontraseña"];

	$passwordHash = password_hash($password, PASSWORD_BCRYPT);

	if($password == $repitepassword){
		$sql = "UPDATE persona SET Nombres='$nombre', Apellidos='$apellidos', Correo='$correo', Telefono='$telefono', Direccion='$direccion', Ciudad='$ciudad' WHERE Cedula = '$cedula' ";
		$sql1 = "UPDATE docente SET Especializacion='$especializacion', Password='$passwordHash' WHERE CodigoDocente = '$codigo' ";

		if(mysqli_query($conexion, $sql) && mysqli_query($conexion, $sql1) ) {
			echo '<script language="javascript">alert("Datos Modificados.");window.location.href="../perfiladministrador.php"</script>';
		}else{
			echo "Error" . $sql . $sql1 . "<br>" . mysqli_error($conexion);
		}
	}else{
		echo '<script language="javascript">alert("Contraseñas no coinciden.");window.location.href="../perfiladministrador.php"</script>';
	}
	mysqli_close($conexion);
?>