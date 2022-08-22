<?php
	include("php/Conexion.php");
?>

<!DOCTYPE html>

<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Universidad de Nariño</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
	 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</head>
	
	<body background="img/udenarfondo.bmp">
		<header>
      <table align="center">
        <tr>
          <td>
            <br>
            <img src="img/udenar.jpg" class="img-thumbnail border-dark" width="500">
          </td>
        </tr>
      </table>
    </header>
		<br>
		<div class="card-group" align="center">
			<div class="card bg-transparent border-dark" style="width: 18rem;">
  			<div class="card-body">
          <img src="img/iniciar.jpg" class="img-thumbnail border-dark" width="500">
  			</div>
			</div>
			<div class="card bg-transparent border-dark" style="width: 18rem;">
  			<div class="card-body">
  				<br><br><br>
  				<form class="row g-3" name="contacto" method="POST" action="php/IniciarSesionEstudiante.php">
  					<div class="alert alert-success text-dark border-dark" role="alert">
  						Inicia Sesion
						</div>
  					<div class="col-12">
              <label for="validationDefault05" class="form-label">Codigo-Estudiante</label>
              <input type="text" name="codigoestudiante" placeholder="Ingrese su codigo de estudiante" class="form-control" id="validationDefault05" required>
            </div>
  					<div class="col-12">
  						<label for="validationDefault05" class="form-label">Contraseña</label>
    					<input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese su contraseña" class="form-control" id="validationDefault05" required>
  					</div>
  					<div class="col-12">
    					<button class="btn btn-success border-dark" name="enviar">Iniciar Sesion</button>
  					</div>
					</form>
  			</div>
			</div>
		</div>
		<br>
		<h4 align="right">
      <a href="index.html" class="card-link text-success"><i>Regresar</i></a>
    </h4> 
	</body>
</html>