<?php
	$inc = include("php/Conexion.php");
	include("php/validarSesion.php");
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil Administrador</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </head>

  <body>
    <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-white bg-transparent" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Perfil</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white bg-transparent" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Estudiantes</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white bg-transparent" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Docentes</button>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white bg-transparent" href="php/CerrarSesion.php">Cerrar Sesion</a>
      </li>
    </ul>

    <br>

    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2 " tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>PERFIL</i></b></h4>
              <p>
                <div class="card mb-3" style="background-color: #DADED6;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="img/secre.png" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body" align="justify">
                        <h5 class="card-title" align="center">
                          <?php 
                            if($inc){

                              $con = "SELECT Nombres, Apellidos FROM Persona WHERE Cedula = (SELECT Cedula FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]') ";
                              $res = mysqli_query($conexion,$con);

                              if($res){
                                while ($r = $res->fetch_array()){
                                  $n = $r['Nombres'];
                                  $a = $r['Apellidos'];
                          ?>
                                 <b><i> Bienvenido/a
                                  
                          <?php
                                  echo $n;
                          ?>
                        
                                  
                          <?php
                                  echo $a;
                                }
                              }
                            }
                          ?> 
                          </i></b>
                        </h5>
                        <p class="card-text">
                          <br>
                          Al acceder como administrador tendrá la tarea de llevar un correcto manejo referente a las cuentas de estudiantes y docentes, así mismo una pertinente asignación de jurados y asesores a lo diferentes trabajos de grado elaborados por los estudiantes.
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <br>
                <div class="accordion accordion-flush" id="accordionFlushExample">
                  <div class="accordion-item border-white">
                    <h2 class="accordion-header" id="flush-headingOne">
                      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Visualizar Información Personal.
                      </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">
                        

                        <?php
                          if($inc){

                            $consulta = "SELECT * FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]' ";
                            $resultado = mysqli_query($conexion,$consulta);
                            $consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM administrador WHERE CodigoAdministrador = '$_SESSION[codigoadministrador]') ";
                            $resultado1 = mysqli_query($conexion,$consulta1);

                            if($resultado && $resultado1){
                              while ($row = $resultado->fetch_array()) {
                                $cadministrador = $row['CodigoAdministrador'];
                                $cedula         = $row['Cedula'];
                                $credencial     = $row['Credencial'];
                                $cargo          = $row['Cargo'];
                                $contraseña     = $row['Password'];
                                while($row1 = $resultado1->fetch_array()){
                                  $ce = $row1['Cedula'];
                                  $nombres = $row1['Nombres'];
                                  $apellidos = $row1['Apellidos'];
                                  $correo = $row1['Correo'];
                                  $telefono = $row1['Telefono'];
                                  $direccion = $row1['Direccion'];
                                  $ciudad = $row1['Ciudad'];
                        ?>
                                  <table class="table table-striped">
                                    <tr align="center">
                                      <td>
                                        <b>CEDULA</b> 
                                      </td>
                                      <td>
                                        <?php echo $cedula; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>CODIGO</b>
                                      </td>
                                      <td>
                                        <?php echo $cadministrador; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>CREDENCIAL</b>
                                      </td>
                                      <td>
                                        <?php echo $credencial; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>NOMBRES</b>
                                      </td>
                                      <td>
                                        <?php echo $nombres; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>APELLIDOS</b>
                                      </td>
                                      <td>
                                        <?php echo $apellidos; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>TELEFONO</b>
                                      </td>
                                      <td>
                                        <?php echo $telefono; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>CIUDAD</b>
                                      </td>
                                      <td>
                                        <?php echo $ciudad; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>DIRECCIÓN</b>
                                      </td>
                                      <td>
                                        <?php echo $direccion; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>CARGO</b>
                                      </td>
                                      <td>
                                        <?php echo $cargo; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                    <tr align="center">
                                      <td>
                                        <b>CORREO</b>
                                      </td>
                                      <td>
                                        <?php echo $correo; ?>
                                      </td>
                                      <td>
                                        <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                      </td>
                                    </tr>
                                  </table>

                                  
                                <?php
                              }
                              }
                            }
                          }
                        ?>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Modificar Información Personal.
                      </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse bg-light" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">


                        


<div class="card-group" align="center">
              <div class="card bg-transparent border-light" style="width: 18rem;">
                  <div class="card-body">
                        <form class="row g-3" name="modificar administrador" method="POST" action="php/ModificarAdministrador.php">
                          
                      <div class="col-md-12">
                        <label for="validationDefault01" class="form-label">Nombres</label>
                        <input type="text" name="nombre" placeholder="Ingrese sus nombres" class="form-control border-dark" id="validationDefault01" required>
                      </div>
                      <div class="col-md-12">
                        <label for="validationDefault02" class="form-label">Apellidos</label>
                        <input type="text" name="apellidos" placeholder="Ingrese sus apellidos" class="form-control border-dark" id="validationDefault02" required>
                      </div>
                          
                      <div class="col-md-12">
                        <label for="validationDefaultUsername" class="form-label">Correo</label>
                        <div class="input-group">
                            <span class="input-group-text border-dark" id="inputGroupPrepend2">@</span>
                            <input type="email" name="correo" placeholder="Ingrese su email" class="form-control border-dark" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                        </div>
                      </div>
                          <div class="col-md-12">
                            <label for="validationDefault05" class="form-label">Telefono</label>
                            <input type="phone" name="telefono" placeholder="Ingrese su numero de telefono" class="form-control border-dark" id="validationDefault05" required>
                          </div>
                          <div class="col-md-12">
                            <label for="validationDefault05" class="form-label">Direccion</label>
                            <input type="text" name="direccion" placeholder="Ingrese su direccion" class="form-control border-dark" id="validationDefault05" required>
                          </div>
                          <div class="col-md-12">
                            <label for="validationDefault05" class="form-label">Ciudad</label>
                            <input type="text" name="ciudad" placeholder="Ingrese su ciudad" class="form-control border-dark" id="validationDefault05" required>
                          </div>
                          
                          <div class="col-md-12">
                            <label for="validationDefault05" class="form-label">Cargo</label>
                            <input type="text" name="cargo" placeholder="Ingrese su cargo" class="form-control border-dark" id="validationDefault05" required>
                          </div>
                      <div class="col-md-12">
                        <label for="validationDefault05" class="form-label">Contraseña Actual</label>
                        <input type="password" name="contraseñaactual" autocomplete="new-password" placeholder="Ingrese contraseña actual" class="form-control border-dark" id="validationDefault05" required>
                      </div>
                      <div class="col-md-12">
                        <label for="validationDefault05" class="form-label">Contraseña Nueva</label>
                        <input type="password" name="contraseñanueva" autocomplete="new-password" placeholder="Ingrese contraseña nueva" class="form-control border-dark" id="validationDefault05" required>
                      </div>
                      <br>
                      <div class="col-md-12">
                        <button class="btn btn-primary border-dark text-white" type="submit" name="enviar">Modificar</button>
                      </div>
                  </form>
                  </div>
              </div>
              <div class="card bg-transparent border-light" style="width: 18rem;">
                  <div class="card-body">
                        <br><br><br><br><br><br><br><br><br>
                        <img src="img/reg.png" class="img-thumbnail border-dark" width="400">
                    </div>
              </div>
            </div>





                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Eliminar Cuenta.
                      </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">

                        <table align="center">
                          <tr>
                            <td>
                              

                            


                        <div class="card text-bg-danger mb-3 align-items-center" style="max-width: 18rem;">
  <div class="card-header">¿Está seguro de eliminar su cuenta?</div>
  <div class="card-body">
    <a href="php/Eliminar.php" class="btn btn-success border-white text-white">SI</a>
    <a href="perfiladministrador.php" class="btn btn-success border-white text-white">NO</a>
  </div>
</div>



                            </td>
                          </tr>
                        </table>
                        


                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingcuatro">
                      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsecuatro" aria-expanded="false" aria-controls="flush-collapsecuatro">
                        Cerrar Sesion.
                      </button>
                    </h2>
                    <div id="flush-collapsecuatro" class="accordion-collapse collapse" aria-labelledby="flush-headingcuatro" data-bs-parent="#accordionFlushExample">
                      <div class="accordion-body">

<table align="center">
                          <tr>
                            <td>
                              

                            


                        <div class="card text-bg-danger mb-3 align-items-center" style="max-width: 18rem;">
  <div class="card-header">¿Está seguro de Cerrar su cuenta?</div>
  <div class="card-body">
    <a href="php/CerrarSesion.php" class="btn btn-success border-white text-white">SI</a>
    <a href="perfiladministrador.php" class="btn btn-success border-white text-white">NO</a>
  </div>
</div>



                            </td>
                          </tr>
                        </table>



                      </div>
                    </div>
                  </div>
                </div>
              </p>
              <h4 id="scrollspyHeading4" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div> 
              </p>
            </div>
            
          </div>
          
        </div>
        <br>




      </div>











      <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">


<ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active text-white" style="background-color: #00923F;" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro-tab-pane" type="button" role="tab" aria-controls="registro-tab-pane" aria-selected="true">REGISTAR</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link text-white" style="background-color: #00923F;" id="Visualizar-tab" data-bs-toggle="tab" data-bs-target="#Visualizar-tab-pane" type="button" role="tab" aria-controls="Visualizar-tab-pane" aria-selected="false">VISUALIZAAR</button>
  </li>
 
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="registro-tab-pane" role="tabpanel" aria-labelledby="registro-tab" tabindex="0">
<br>
<div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10" style="background-color: #F0F2EE;">
            
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>REGISTRAR ESTUDIANTES</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo estudiante" method="POST" action="php/ConexionCrearUsuarioEstudiante.php">
                        <div class="col-md-12">
                          <label for="validationDefault01" class="form-label">Cedula</label>
                          <input type="number" name="cedula" placeholder="Ingrese numero de cedula" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault01" class="form-label">Nombres</label>
                          <input type="text" name="nombre" placeholder="Ingrese nombres" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault02" class="form-label">Apellidos</label>
                          <input type="text" name="apellidos" placeholder="Ingrese apellidos" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Codigo</label>
                          <input type="text" name="codigoestudiante" placeholder="Ingrese codigo Estudiante" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefaultUsername" class="form-label">Correo</label>
                          <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <input type="email" name="correo" placeholder="Ingrese email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Telefono</label>
                          <input type="phone" name="telefono" placeholder="Ingrese numero de telefono" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Direccion</label>
                          <input type="text" name="direccion" placeholder="Ingrese direccion" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Ciudad</label>
                          <input type="text" name="ciudad" placeholder="Ingrese ciudad" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Programa</label>
                          <input type="text" name="programa" placeholder="Ingrese Programa" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Contraseña</label>
                          <input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese contraseña" class="form-control" id="validationDefault05" required>
                        </div>
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success border-white" type="submit" name="enviar">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card border-light bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <br><br><br><br><br><br><br><br><br><br><br>
                      <img src="img/reg.png" class="img-thumbnail border-white" width="400">
                    </div>
                  </div>
                </div>  
              </p>
             
              <h4 id="scrollspyHeading4" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div>
              </p> 
            </div>
            
          </div>
        </div>

<br>


  </div>
  <div class="tab-pane fade" id="Visualizar-tab-pane" role="tabpanel" aria-labelledby="Visualizar-tab" tabindex="0">
    <br>

<div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
             
              <h4 id="scrollspyHeading2" align="center"><b><i>VISUALIZAR ESTUDIANTES</i></b></h4>
              <p> 
               


              <table class="table table-striped bg-white">
                        <tr align="center">
                          <td>
                            <b>COD_EST</b> 
                          </td>
                          <td>
                            <b>CEDULA</b> 
                          </td>
                          <td>
                            <b>PROGRAMA</b> 
                          </td>
                          <td>
                            <b>NOMBRES</b> 
                          </td>
                          <td>
                            <b>APELLIDOS</b> 
                          </td>
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           



                            $consulta = "SELECT estudiante.CodigoEstudiante, estudiante.Cedula, estudiante.Programa, persona.Nombres, persona.Apellidos FROM
                            estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                            $resultado = mysqli_query($conexion,$consulta);

                            
                            

                            

                            if($resultado){

                              while ($row2 = $resultado->fetch_array()) {


                                $codigoestudiante          = $row2['CodigoEstudiante'];


                                $cedula = $row2['Cedula'];
                                
                                $programa     = $row2['Programa'];
        
                               $nombre          = $row2['Nombres'];
                               $apellido          = $row2['Apellidos'];
                               

                                if($cedula){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $codigoestudiante; ?>
    </td>
    <td>
      <?php echo $cedula; ?>
    </td>
    <td>
      <?php echo $programa; ?>
    </td>
    <td>
      <?php echo $nombre; ?>
    </td>
    <td>
      <?php echo $apellido; ?>
    </td>
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>


            
              </p> 
              <h4 id="scrollspyHeading3" align="center"><b><i>ELIMINAR ESTUDIANTE</i></b></h4>
              <p> 



              


<div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                        
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">CODIGO</label>
                          <input type="text" name="codigo" placeholder="Ingrese codigo estudiante" class="form-control" id="validationDefault05" required>
                        </div>
                        
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success border-dark" type="submit" name="enviar">Eliminar Estudiante</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      
                      <img src="img/reg.png" class="img-thumbnail " width="400">
                    </div>
                  </div>
                </div>








              </p>
              <h4 id="scrollspyHeading4" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text text-black">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div>
              </p> 
            </div>
            <br>
          </div>
        </div>


    visiualizar fin
  </div>
 
</div>





      </div>
      <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        
        <nav id="navbar-example3" class="navbar px-3 mb-3" style="background-color: #00923F;">
          <a class="navbar-brand text-white
          " href="">UDENAR</a>
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading11">Registrar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading12">Visualizar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading13">Asignar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading14">Eliminar</a>
            </li>
          </ul>
        </nav>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 " style="background-color: #F0F2EE;">
            <br>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
              <h4 id="scrollspyHeading11" align="center"><b><i>REGISTRAR DOCENTES</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/ConexionCrearUsuarioDocente.php">
                        <div class="col-md-12">
                          <label for="validationDefault01" class="form-label">Cedula</label>
                          <input type="number" name="cedula" placeholder="Ingrese numero de cedula" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault01" class="form-label">Nombres</label>
                          <input type="text" name="nombre" placeholder="Ingrese nombres" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault02" class="form-label">Apellidos</label>
                          <input type="text" name="apellidos" placeholder="Ingrese apellidos" class="form-control" id="validationDefault02" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Codigo</label>
                          <input type="text" name="codigodocente" placeholder="Ingrese codigo Docente" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefaultUsername" class="form-label">Correo</label>
                          <div class="input-group">
                            <span class="input-group-text" id="inputGroupPrepend2">@</span>
                            <input type="email" name="correo" placeholder="Ingrese email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Telefono</label>
                          <input type="phone" name="telefono" placeholder="Ingrese numero de telefono" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Direccion</label>
                          <input type="text" name="direccion" placeholder="Ingrese direccion" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Ciudad</label>
                          <input type="text" name="ciudad" placeholder="Ingrese ciudad" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Especialización</label>
                          <input type="text" name="especializacion" placeholder="Ingrese Especialización" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label">Contraseña</label>
                          <input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese una contraseña" class="form-control" id="validationDefault05" required>
                        </div>
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success " type="submit" name="enviar">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card bg-transparent border-light" style="width: 18rem;">
                    <div class="card-body">
                      <br><br><br><br><br><br><br><br><br><br><br>
                      <img src="img/reg.png" class="img-thumbnail " width="400">
                    </div>
                  </div>
                </div>  
              </p>
              <h4 id="scrollspyHeading12" align="center"><b><i>VISUALIZAR DOCENTES</i></b></h4>
              <p> 
                


<table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>COD_DOC</b> 
                          </td>
                          <td>
                            <b>CEDULA</b>
                          </td>
                          <td>
                            <b>ESPECIALIZACION</b>
                          </td>
                          <td>
                            <b>NOMBRES</b>
                          </td>
                          <td>
                            <b>APELLIDOS</b>
                          </td>
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           



                            $consulta2 = "SELECT docente.CodigoDocente, docente.Cedula, docente.Especializacion, persona.Nombres, persona.Apellidos FROM
                            docente inner join persona on docente.Cedula = persona.Cedula ";
                            $resultado2 = mysqli_query($conexion,$consulta2);

                            
                            

                            

                            if($resultado2){

                              while ($row3 = $resultado2->fetch_array()) {


                                $codigodocente1          = $row3['CodigoDocente'];


                                $cedula1 = $row3['Cedula'];
                                
                                $especializacion1     = $row3['Especializacion'];
        
                               $nombre1          = $row3['Nombres'];
                               $apellido1          = $row3['Apellidos'];
                               

                                if($cedula1){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $codigodocente1; ?>
    </td>
    <td>
      <?php echo $cedula1; ?>
    </td>
    <td>
      <?php echo $especializacion1; ?>
    </td>
    <td>
      <?php echo $nombre1; ?>
    </td>
    <td>
      <?php echo $apellido1; ?>
    </td>
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>


                
              </p>
              <h4 id="scrollspyHeading13" align="center"><b><i>ASIGNAR DOCENTE</i></b></h4>
              <p> 
            

                <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        ASESOR
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse " aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
       

  <div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/AsignarAsesor.php">
                        
                        
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label"><b>CODIGO</b></label>
                          <input type="text" name="codigodocente" placeholder="Ingrese codigo Docente" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label"><b>ID_TRABAJO</b></label>
                          <input type="text" name="idtrabajo" placeholder="Ingrese Id Trabajo" class="form-control" id="validationDefault05" required>
                        </div>
                        
                        
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success " type="submit" name="enviar">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card" style="width: 18rem;">
                    <div class="card-body">


                      

<div class="alert alert-success" role="alert">
  TRABAJOS SIN ASESOR
</div>



<table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>ID_TRABAJO</b>
                          </td>
                          <td>
                            <b>NOMBRE</b>
                          </td>
                          <td>
                            <b>COD_ESTUDIANTE</b>
                          </td>
                          
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           




                            $consulta = "SELECT trabajo.idTrabajo, trabajo.NombreTrabajo, asignaasesor.CodigoDocente, trabajo.CodigoEstudiante FROM
                            trabajo left JOIN asignaasesor ON trabajo.idTrabajo = asignaasesor.idTrabajo ";
                            $resultado = mysqli_query($conexion,$consulta);

                            

                            if($resultado){

                              while ($row2 = $resultado->fetch_array()) {





                                $idtrabajo = $row2['idTrabajo'];
                                
                                $nombretrabajo     = $row2['NombreTrabajo'];
                                
                               
                               
                              
                               
                               $codigoestudiante          = $row2['CodigoEstudiante'];
                               $codigoasesor          = $row2['CodigoDocente'];

                                if(!$codigoasesor){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $idtrabajo; ?>
    </td>
    <td>
      <?php echo $nombretrabajo; ?>
    </td>
    <td>
      <?php echo $codigoestudiante; ?>
    </td>
    
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>



                      <div class="alert alert-primary" role="alert">
 NUMERO DE ASESORIAS DESIGNADAS A DOCENTES
</div>



<table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>COD_DOCENTE</b>
                          </td>
                          <td>
                            <b>NUM_ASESORIAS</b>
                          </td>
                          
                          
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           

                            $consulta = " SELECT CodigoDocente, Cantidad FROM numeroasesorias ";


                           
                            $resultado = mysqli_query($conexion,$consulta);

                            

                            if($resultado){

                              while ($row2 = $resultado->fetch_array()) {



                               $codigodocente2          = $row2['CodigoDocente'];
                               $cantidad          = $row2['Cantidad'];

                                if($codigodocente2){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $codigodocente2; ?>
    </td>
    <td>
      <?php echo $cantidad; ?>
    </td>
    
    
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>




                      


                      
                    </div>
                  </div>
                </div>


        
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        JURADO
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
        


  <div class="card-group" align="center">
                  <div class="card " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/AsignarJurado.php">
                        
                        
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label"><b>CODIGO</b></label>
                          <input type="text" name="codigodocente" placeholder="Ingrese codigo Docente" class="form-control" id="validationDefault05" required>
                        </div>
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label"><b>ID_TRABAJO</b></label>
                          <input type="text" name="idtrabajo" placeholder="Ingrese Id Trabajo" class="form-control" id="validationDefault05" required>
                        </div>
                        
                        
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success " type="submit" name="enviar">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">


            <div class="alert alert-success" role="alert">
  TRABAJOS SIN JURADO
</div>

                      <table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>ID_TRABAJO</b>
                          </td>
                          <td>
                            <b>NOMBRE</b>
                          </td>
                          <td>
                            <b>COD_ESTUDIANTE</b>
                          </td>
                          
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           

                            $consultajur = "SELECT trabajo.idTrabajo, trabajo.NombreTrabajo, asignajurado.CodigoDocente, trabajo.CodigoEstudiante FROM
                            trabajo left JOIN asignajurado ON trabajo.idTrabajo = asignajurado.idTrabajo ";
                            $resultadojur = mysqli_query($conexion,$consultajur);

                            if($resultadojur){

                              while ($row5 = $resultadojur->fetch_array()) {



                                $idtrabajoj = $row5['idTrabajo'];
                                
                                $nombretrabajoj     = $row5['NombreTrabajo'];
                                
                               
                               
                              
                              
                               $codigoestudiantej          = $row5['CodigoEstudiante'];
                                $codigojurado          = $row5['CodigoDocente'];

                                
                               if(!$codigojurado){
                                ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $idtrabajoj; ?>
    </td>
    <td>
      <?php echo $nombretrabajoj; ?>
    </td>
    <td>
      <?php echo $codigoestudiantej; ?>
    </td>
  </tr>






                                <?php
                               }

                                
                              
                              }
                            }
                          }
                        ?>




                      </table>



                      <div class="alert alert-primary" role="alert">
 NUMERO DE PROYECTOS DESIGNADAS A DOCENTES
</div>



<table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>COD_DOCENTE</b>
                          </td>
                          <td>
                            <b>NUM_PROYECTOS</b>
                          </td>
                          
                          
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           

                            $consulta = " SELECT CodigoDocente, Cantidad FROM numerojurados ";


                           
                            $resultado = mysqli_query($conexion,$consulta);

                            

                            if($resultado){

                              while ($row2 = $resultado->fetch_array()) {



                               $codigodocente2          = $row2['CodigoDocente'];
                               $cantidad          = $row2['Cantidad'];

                                if($codigodocente2){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $codigodocente2; ?>
    </td>
    <td>
      <?php echo $cantidad; ?>
    </td>
    
    
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>


                      




                     


                      
                    </div>
                  </div>
                </div>


       
      </div>
    </div>
  </div>
  
</div>


              



              </p> 
              
              <h4 id="scrollspyHeading14" align="center"><b><i>ELIMINAR DOCENTE</i></b></h4>
              <p> 
                


<div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                        
                        <div class="col-md-12">
                          <label for="validationDefault05" class="form-label"><b>CODIGO</b></label>
                          <input type="text" name="codigo" placeholder="Ingrese codigo Docente" class="form-control" id="validationDefault05" required>
                        </div>
                        
                        <br>
                        <div class="col-md-12">
                          <button class="btn btn-success " type="submit" name="enviar">Eliminar Docente</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card  bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      
                      
<table class="table table-striped">
                        <tr align="center">
                          <td>
                            <b>COD_DOC</b> 
                          </td>
                          
                          
                          <td>
                            <b>NOMBRES</b>
                          </td>
                          <td>
                            <b>APELLIDOS</b>
                          </td>
                        </tr>
                        <tbody class="table-group-divider">
                        <?php
                          if($inc){
                           



                            $consulta2 = "SELECT docente.CodigoDocente, persona.Nombres, persona.Apellidos FROM
                            docente inner join persona on docente.Cedula = persona.Cedula ";
                            $resultado2 = mysqli_query($conexion,$consulta2);

                            
                            

                            

                            if($resultado2){

                              while ($row3 = $resultado2->fetch_array()) {


                                $codigodocente1          = $row3['CodigoDocente'];


                                
        
                               $nombre1          = $row3['Nombres'];
                               $apellido1          = $row3['Apellidos'];
                               

                                if($cedula1){
                                  ?>
                                 


  
  <tr align="center">
    <td>
      <?php echo $codigodocente1; ?>
    </td>
    
    <td>
      <?php echo $nombre1; ?>
    </td>
    <td>
      <?php echo $apellido1; ?>
    </td>
  </tr>

  






                                <?php
                                }else{

                                }


                                
                              
                              }





                            }





                          }
                        ?>

                      </table>





                    </div>
                  </div>
                </div>




                
              </p>
              <h4 id="scrollspyHeading15" align="center"><b><i>CONTACTOS</i></b></h4>
              <p> 
                <div class="card-group">
                  <div class="card">
                    <img src="img/contacto.png" class="card-img-top">
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Institución de Educación Superior<br>Resolución No. 10567 Acreditación de Alta calidad<br>Vigilada por MINEDUCACIÓN
                      </p>
                      <img src="img/redes.jpg" width="100" height="50">  
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body">
                      <p class="card-text">
                        Cr. 33 No. 5 - 121 Las Acacias<br>Bloque 5, Piso 5, Oficina 501<br>7311449 Ext. 500<br>Correo exclusivamente para notificaciones judiciales: judiciales@udenar.edu.co Pasto - Nariño, Colombia
                      </p>
                    </div>
                  </div>
                </div>
              </p> 
            </div>
            
          </div>
        </div>
      </div>
     <br>
    </div>
  </body>
</html>