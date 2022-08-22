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
    <ul class="nav nav-tabs border-dark" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-dark" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true"><i><b>Mi Perfil</b></i></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i><b>Subir Proyecto de Grado</b></i></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i><b>Estado</b></i></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="cerrar-tab" data-bs-toggle="tab" data-bs-target="#cerrar-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i><b>Cerrar sesion</b></i></button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="alert alert-danger text-dark border-dark" role="alert">
          <h3 align="center">
            Perfil del Estudiante.
          </h3>
        </div>
      </div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <br>
        <div class="card-group" align="center">
          <div class="card bg-transparent border-dark" style="width: 18rem;">
            <div class="card-body">
              <br><br><br>
              <form class="row g-3" name="nuevo archivo" method="POST" action="php/subirArchivo.php" enctype="multipart/form-data">
                <div class="alert alert-success text-dark border-dark" role="alert">
                  Subir un archivo de proyecto de grado
                </div>
                <div class="col-12">
                  <label for="validationDefault01" class="form-label">Codigo-Estudiante</label>
                  <input type="text" name="codigoestudiante" placeholder="Ingrese su codigo de estudiante" class="form-control" id="validationDefault01" required>
                </div>
                <div class="col-12">
                  <label for="validationDefault01" class="form-label">Subir Proyecto</label>
                  <input type="file" name="archivo" accept=".pdf" required>
                </div>
                <div class="col-12">
                  <button class="btn btn-success border-dark" type="submit" name="enviar">Registrar</button>
                </div>
              </form>
            </div>
          </div>
          <div class="card bg-transparent border-dark" style="width: 18rem;">
            <div class="card-body">
              <img src="img/grado.jpg" class="img-thumbnail border-dark" width="500">
            </div>
          </div>
        </div>
        <br>
      </div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <div class="alert alert-danger text-dark border-dark" role="alert">
          <h3 align="center">
            Estado.
          </h3>
        </div>
      </div>
      <div class="tab-pane fade" id="cerrar-tab-pane" role="tabpanel" aria-labelledby="cerrar-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card bg-transparent border-dark" style="width: 18rem;" align="center">
            <table border="1" align="center">
              <tr>
                <td>
                  <br>
                  <img src="img/cerrar.jpg"  height="100" width="50">
                </td>
              </tr>
            </table>
            <div class="card-body">
              <h5 class="card-title text-success"><b>Cerrar Sesion.</b></h5>
              <p class="card-text text-black">Oprima "Aceptar" si desea cerrar sesion</p>
              <a href="php/CerrarSesion.php" class="btn btn-success border-white text-white">Aceptar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
	</body>
</html>