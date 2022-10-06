<?php
	include("conexion.php");
	
	session_start();
	$_SESSION['login'] = false;

	$codigo   = $_POST["codigo"];
	$password = $_POST["contraseña"];
	
	$consulta = "SELECT * FROM administrador WHERE CodigoAdministrador = '$codigo' ";
	$consulta = mysqli_query($conexion, $consulta);
	$consulta = mysqli_fetch_array($consulta);
	
	$consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM administrador WHERE CodigoAdministrador='$codigo')";
	$consulta1 = mysqli_query($conexion, $consulta1);
	$consulta1 = mysqli_fetch_array($consulta1);

	$consulta2 = "SELECT * FROM estudiante WHERE CodigoEstudiante = '$codigo' ";
	$consulta2 = mysqli_query($conexion, $consulta2);
	$consulta2 = mysqli_fetch_array($consulta2);
	
	$consulta3 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$codigo') ";
	$consulta3 = mysqli_query($conexion, $consulta3);
	$consulta3 = mysqli_fetch_array($consulta3);

	$consulta4 = "SELECT * FROM docente WHERE CodigoDocente = '$codigo' ";
	$consulta4 = mysqli_query($conexion, $consulta4);
	$consulta4 = mysqli_fetch_array($consulta4);
	
	$consulta5 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM docente WHERE CodigoDocente = '$codigo') ";
	$consulta5 = mysqli_query($conexion, $consulta5);
	$consulta5 = mysqli_fetch_array($consulta5);

	if($consulta && $consulta1){
		if(password_verify($password, $consulta['Password'])){
			$_SESSION[login]               = true; 
			$_SESSION[cedula]              = $consulta1['Cedula'];
			$_SESSION[nombre]              = $consulta1['Nombres'];
			$_SESSION[apellidos]           = $consulta1['Apellidos'];
			$_SESSION[correo]              = $consulta1['Correo'];
			$_SESSION[telefono]            = $consulta1['Telefono'];
			$_SESSION[direccion]           = $consulta1['Direccion'];
			$_SESSION[ciudad]              = $consulta1['Ciudad'];
			$_SESSION[codigoadministrador] = $consulta['CodigoAdministrador'];
			$_SESSION[credencial]          = $consulta['Credencial'];
			$_SESSION[cargo]               = $consulta['Cargo'];
			
			header('Location: ../perfiladministrador.php');
		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else if($consulta2 && $consulta3){
		if(password_verify($password, $consulta2['Password'])){
			$_SESSION[login]               = true; 
			$_SESSION[cedula]              = $consulta3['Cedula'];
			$_SESSION[nombre]              = $consulta3['Nombres'];
			$_SESSION[apellidos]           = $consulta3['Apellidos'];
			$_SESSION[correo]              = $consulta3['Correo'];
			$_SESSION[telefono]            = $consulta3['Telefono'];
			$_SESSION[direccion]           = $consulta3['Direccion'];
			$_SESSION[ciudad]              = $consulta3['Ciudad'];
			$_SESSION[codigoestudiante]    = $consulta2['CodigoEstudiante'];
			$_SESSION[programa]            = $consulta2['Programa'];
			
			header('Location: ../perfilestudiante.php');
		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else if($consulta4 && $consulta5){
		if(password_verify($password, $consulta4['Password'])){
			$_SESSION[login]               = true; 
			$_SESSION[cedula]              = $consulta5['Cedula'];
			$_SESSION[nombre]              = $consulta5['Nombres'];
			$_SESSION[apellidos]           = $consulta5['Apellidos'];
			$_SESSION[correo]              = $consulta5['Correo'];
			$_SESSION[telefono]            = $consulta5['Telefono'];
			$_SESSION[direccion]           = $consulta5['Direccion'];
			$_SESSION[ciudad]              = $consulta5['Ciudad'];
			$_SESSION[codigodocente]       = $consulta4['CodigoDocente'];
			$_SESSION[especializacion]     = $consulta4['Especializacion'];
			
			header('Location: ../perfildocente.php');
		}else{
			echo '<script language="javascript">alert("Contraseña incorrecta.");window.location.href="../index.html"</script>';
		}
	}else{		
		echo '<script language="javascript">alert("Usuario NO existe.");window.location.href="../index.html"</script>';	
	}
	mysqli_close($conexion);
?>