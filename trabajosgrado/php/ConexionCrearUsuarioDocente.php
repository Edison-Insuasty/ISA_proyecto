<?php
	include("conexion.php");

	$cedula              = $_POST["cedula"];
	$nombre              = $_POST["nombre"];
	$apellidos           = $_POST["apellidos"];
	$codigodocente       = $_POST["codigodocente"];
	$correo              = $_POST["correo"];
	$telefono            = $_POST["telefono"];
	$direccion           = $_POST["direccion"];
	$ciudad              = $_POST["ciudad"];
	$especializacion     = $_POST["especializacion"];
	$password            = $_POST["contraseña"];
	
	$passwordHash = password_hash($password, PASSWORD_BCRYPT);
	
	$consultaId = "SELECT CodigoDocente
				   FROM docente
				   WHERE CodigoDocente = '$codigodocente' ";
	$consultaId = mysqli_query($conexion, $consultaId);
	$consultaId = mysqli_fetch_array($consultaId);

	$consultaCedula = "SELECT Cedula
				   FROM docente
				   WHERE Cedula = '$cedula' ";
	$consultaCedula = mysqli_query($conexion, $consultaCedula);
	$consultaCedula = mysqli_fetch_array($consultaCedula);

	if(!$consultaCedula){
		if(!$consultaId){
			$sql = "INSERT INTO docente VALUES ( '$cedula', '$nombre', '$apellidos', '$codigodocente', '$correo', '$telefono', '$direccion', '$ciudad', '$especializacion', '$passwordHash')";
			if(mysqli_query($conexion, $sql)) {
				echo "<img src='../img/exito.jpg' width='800' height='550' align='center'>";
				echo "<script>alert('La cuenta del docente ha sido creada exitosamente.');</script> ";
				echo "<a href=' ../perfiladministrador.php' bg-red><h1><i><b>Volver.</b></i></h1></a>";
			}else{
				echo "Error" . $sql . "<br>" . mysqli_error($conexion);
			}
		}else{
			echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
			echo "<script>alert('El Codigo de docente ya existe.');</script> ";
			echo "<a href=' ../registrardocente.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
		}
	}else{
		echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
		echo "<script>alert('Ya existe un registro con ese numero de cedula.');</script> ";
		echo "<a href=' ../registrardocente.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
	}
	mysqli_close($conexion);
?>