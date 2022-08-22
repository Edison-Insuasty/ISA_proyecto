<?php
	include("conexion.php");
	
	session_start();
	$_SESSION['login'] = false;

	$codigoestudiante = $_POST["codigoestudiante"];
	$password         = $_POST["contraseña"];
	
	$consulta = "SELECT *
				 FROM estudiante
				 WHERE CodigoEstudiante = '$codigoestudiante' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);
	
	if($consulta){
		if(password_verify($password, $consulta['Password'])){
			$_SESSION[login]               = true; 
			$_SESSION[cedula]              = $consulta['Cedula'];
			$_SESSION[nombre]              = $consulta['Nombres'];
			$_SESSION[apellidos]           = $consulta['Apellidos'];
			$_SESSION[codigoestudiante] = $consulta['CodigoEstudiante'];
			$_SESSION[correo]              = $consulta['Correo'];
			$_SESSION[telefono]            = $consulta['Telefono'];
			$_SESSION[direccion]           = $consulta['Direccion'];
			$_SESSION[ciudad]              = $consulta['Ciudad'];
			
			header('Location: ../perfilestudiante.php');
		}else{
			echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
			echo "<script>alert('Contraseña incorrecta');</script> ";
			echo "<a href=' ../sesionestudiante.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
		}
	}else{
		echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
		echo "<script>alert('Usuario NO existe');</script> ";
		echo "<a href=' ../sesionestudiante.php' bg-red><h1><i><b>Intentalo de nuevo.</b></i></h1></a>";
	}
	mysqli_close($conexion);
?>