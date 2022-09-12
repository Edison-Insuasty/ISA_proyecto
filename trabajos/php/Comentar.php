<?php
	include("Conexion.php");
  	include("validarSesion.php");

  	$consulta  = "SELECT idComentario
				  FROM comentario
				  ORDER BY idComentario DESC
				  LIMIT 1";
	$consulta  = mysqli_query($conexion, $consulta);
	$consulta  = mysqli_fetch_array($consulta);
	$idComentario = $consulta['idComentario'];
	
	++$idComentario;

	$codigodocente = $_SESSION[codigodocente];
	$idtrabajo = $_POST['idtrabajo1'];
	$comentar = $_POST['comentar'];

	$sql = "INSERT INTO comentario VALUES ('$idComentario', '$codigodocente', '$idtrabajo', '$comentar')";
	if(mysqli_query($conexion, $sql)){
		echo '<script language="javascript">alert("Comentario realizado.");window.location.href="../perfildocente.php"</script>';
	}else{
		echo "<br>Error: " . $consulta . "<br>" . mysqli_error($conexion);
		echo '<script language="javascript">alert("Error.");window.location.href="../perfildocente.php"</script>';
	}
?>