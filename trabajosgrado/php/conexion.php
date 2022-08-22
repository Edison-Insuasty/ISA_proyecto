<?php
	$servidor    = "localhost";
	$usuario     = "root";
	$contrasenha = "";
	$BD          = "trabajosgrado";
	
	$conexion = mysqli_connect($servidor, $usuario, $contrasenha, $BD);
	
	if(!$conexion) {
		echo "<img src='../img/alerta.jpg' width='900' height='550' align='center'>";
		echo "<script>alert('Fallo la conexion');</script> ";
		die("connection failed: " . mysqli_connect_error());
	}
?>