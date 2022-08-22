<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$codigoadministrador = $_POST["codigoadministrador"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$cargo               = $_POST["cargo"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$password            = $_POST["contraseña"];
	
	$passwordHash = password_hash($password, PASSWORD_BCRYPT);
	
	$consultaId = "SELECT CodigoAdministrador
				   FROM administrador
				   WHERE CodigoAdministrador = '$codigoadministrador' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	$consultaCedula = "SELECT Cedula
				   FROM administrador
				   WHERE Cedula = '$cedula' ";
	$consultaCedula = mysqli_query($conexion, $consultaCedula);
	$consultaCedula = mysqli_fetch_array($consultaCedula);

	if(!$consultaCedula){
		if(!$consultaId){
			$sql = "INSERT INTO administrador VALUES ( '$cedula', '$nombre', '$apellidos', '$codigoadministrador', '$correo', '$telefono', '$cargo', '$direccion', '$ciudad', '$passwordHash')";
			if(mysqli_query($conexion, $sql)) {
				echo "<img src='../img/exito.jpg' width='800' height='550' align='center'>";
				echo "<script>alert('Tu cuenta ha sido creada.');</script> ";
				echo "<a href=' ../sesionadministrador.php' bg-red><h1><i><b>Iniciar sesion.</b></i></h1></a>";
			}else{
				echo "Error" . $sql . "<br>" . mysqli_error($conexion);
			}
		}else{
			echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
			echo "<script>alert('El Codigo de Administrador ya existe.');</script> ";
			echo "<a href=' ../sesionadministrador.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
		}
	}else{
		echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
		echo "<script>alert('Ya existe un registro con ese numero de cedula.');</script> ";
		echo "<a href=' ../sesionadministrador.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
	}
	mysqli_close($conexion);
?>