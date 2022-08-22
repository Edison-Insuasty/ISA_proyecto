<?php
	include("php/Conexion.php");
	include("php/validarSesion.php");
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
          <form class="row g-3" name="nuevo docente" method="POST" action="php/ConexionCrearUsuarioDocente.php">
            <div class="alert alert-success text-dark border-dark" role="alert">
              Registro de Docente
						</div>
            <div class="col-md-6">
              <label for="validationDefault01" class="form-label">Cedula</label>
              <input type="number" name="cedula" placeholder="Ingrese su numero de cedula" class="form-control" id="validationDefault01" required>
            </div>
  					<div class="col-md-6">
    					<label for="validationDefault01" class="form-label">Nombres</label>
    					<input type="text" name="nombre" placeholder="Ingrese sus nombres" class="form-control" id="validationDefault01" required>
  					</div>
  					<div class="col-md-6">
    					<label for="validationDefault02" class="form-label">Apellidos</label>
    					<input type="text" name="apellidos" placeholder="Ingrese sus apellidos" class="form-control" id="validationDefault02" required>
  					</div>
            <div class="col-6">
              <label for="validationDefault05" class="form-label">Codigo-Docente</label>
              <input type="text" name="codigodocente" placeholder="Ingrese su codigo de docente" class="form-control" id="validationDefault05" required>
            </div>
  					<div class="col-md-6">
    					<label for="validationDefaultUsername" class="form-label">Correo</label>
    					<div class="input-group">
      					<span class="input-group-text" id="inputGroupPrepend2">@</span>
      					<input type="email" name="correo" placeholder="Ingrese su email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
    					</div>
  					</div>
            <div class="col-6">
              <label for="validationDefault05" class="form-label">Telefono</label>
              <input type="phone" name="telefono" placeholder="Ingrese su numero de telefono" class="form-control" id="validationDefault05" required>
            </div>
            <div class="col-6">
              <label for="validationDefault05" class="form-label">Direccion</label>
              <input type="text" name="direccion" placeholder="Ingrese su direccion" class="form-control" id="validationDefault05" required>
            </div>
            <div class="col-6">
              <label for="validationDefault05" class="form-label">Ciudad</label>
              <input type="text" name="ciudad" placeholder="Ingrese su ciudad" class="form-control" id="validationDefault05" required>
            </div>
            <div class="col-6">
              <label for="validationDefault05" class="form-label">Especializacion</label>
              <input type="text" name="especializacion" placeholder="Ingrese su especializacion" class="form-control" id="validationDefault05" required>
            </div>
  					<div class="col-6">
  						<label for="validationDefault05" class="form-label">Contraseña</label>
    					<input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese su contraseña" class="form-control" id="validationDefault05" required>
  					</div>
  					<div class="col-12">
    					<button class="btn btn-success border-dark" type="submit" name="enviar">Registrar</button>
  					</div>
					</form>
  			</div>
			</div>
			<div class="card border-dark bg-transparent" style="width: 18rem;">
  			<div class="card-body">
          <br><br><br><br><br>
          <img src="img/docente1.png" class="img-thumbnail border-dark" width="500">
        </div>
			</div>
		</div>
		<br>
		<h4 align="right">
      <a href="perfiladministrador.php" class="card-link text-success"><i>Regresar a Sesion de Administrador</i></a>
    </h4> 
	</body>
</html>