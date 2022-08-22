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
        <button class="nav-link text-dark" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false"><i><b>Estudiantes</b></i></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i><b>Docentes</b></i></button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-dark" id="cerrar-tab" data-bs-toggle="tab" data-bs-target="#cerrar-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false"><i><b>Cerrar sesion</b></i></button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="alert alert-danger text-dark border-dark" role="alert">
          <h3 align="center">
            aqui va modificar credenciales y eliminar cuenta del administrador.
          </h3>
        </div>
      </div>
      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
        <br>
        <div class="container-fluid h-100">
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-8 border-dark">
              <div class="card-body w-100 col">
                <div class="row vdivide ">
                  <div class="col-12 ">
                    <img src="img/estudiantes.jpg" class="w-100 rounded">
                    <br><br>
                    <div class="card border-success bg-black justify-content-center" style="width: 18rem;" align="center">
                      <table border="1" align="center">
                        <tr>
                          <td>
                            <img src="img/registro.png"  height="100" width="50">
                          </td>
                        </tr>
                      </table>
                      <div class="card-body">
                        <h5 class="card-title text-success"><b>Registrar Estudiante.</b></h5>
                        <p class="card-text text-white">Para que el estudiante pueda ingresar a la plataforma, oprima el boton Aceptar.</p>
                        <a href="registrarestudiante.php" class="btn btn-success border-white text-white">Aceptar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <br>
        <div class="container-fluid h-100">
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-8 border-dark">
              <div class="card-body w-100 col">
                <div class="row vdivide ">
                  <div class="col-12 ">
                    <img src="img/docentes.jpeg" class="w-100 rounded">
                    <br><br>
                    <div class="card border-success bg-black" style="width: 18rem;" align="center">
                      <table border="1" align="center">
                        <tr>
                          <td>
                            <img src="img/registro.png"  height="100" width="50">
                          </td>
                        </tr>
                      </table>
                      <div class="card-body">
                        <h5 class="card-title text-success"><b>Registrar Docente.</b></h5>
                        <p class="card-text text-white">Para que el docente pueda ingresar a la plataforma, oprima el boton Aceptar.</p>
                        <a href="registrardocente.php" class="btn btn-success border-white text-white">Aceptar</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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