<?php
	session_start();
	$login = $_SESSION['login'];

	if(!$login) {
		header('Location: index.html');
	}	
?>