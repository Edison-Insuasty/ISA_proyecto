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
      <a class="nav-link text-white" href="php/CerrarSesion.php">Cerrar Sesión</a>
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
                              <b>
                                <i> 
                                  Bienvenido/a
                                  <?php
                                  echo $n;
                                  ?>
                                  &nbsp;
                                  <?php
                                  echo $a;
                                  ?>
                                </i>
                              </b>
                              <?php
                            }
                          }
                        }
                        ?> 
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
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CODIGO</b>
                                  </td>
                                  <td>
                                    <?php echo $cadministrador; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CREDENCIAL</b>
                                  </td>
                                  <td>
                                    <?php echo $credencial; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>NOMBRES</b>
                                  </td>
                                  <td>
                                    <?php echo $nombres; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>APELLIDOS</b>
                                  </td>
                                  <td>
                                    <?php echo $apellidos; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>TELEFONO</b>
                                  </td>
                                  <td>
                                    <?php echo $telefono; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CIUDAD</b>
                                  </td>
                                  <td>
                                    <?php echo $ciudad; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>DIRECCIÓN</b>
                                  </td>
                                  <td>
                                    <?php echo $direccion; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CARGO</b>
                                  </td>
                                  <td>
                                    <?php echo $cargo; ?>
                                  </td>
                                </tr>
                                <tr align="center">
                                  <td>
                                    <b>CORREO</b>
                                  </td>
                                  <td>
                                    <?php echo $correo; ?>
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
                              <table class="table table-success table-striped">
                                <tr align="center" valign="middle">
                                  <td>
                                    Nombres:
                                  </td>
                                  <td>
                                    <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" value="<?php echo $nombres; ?>" required >
                                  </td>
                                  <td>
                                    Apellidos:
                                  </td>
                                  <td>
                                    <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" value="<?php echo $apellidos; ?>" required>
                                  </td>
                                  <td>
                                    Correo:
                                  </td>
                                  <td>
                                    <div class="input-group">
                                      <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                      <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" value="<?php echo $correo; ?>" required>
                                    </div>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td>
                                    Telefono:
                                  </td>
                                  <td>
                                    <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" value="<?php echo $telefono; ?>" required>
                                  </td>
                                  <td>
                                    Direccion:
                                  </td>
                                  <td>
                                    <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault05" value="<?php echo $direccion; ?>" required>
                                  </td>
                                  <td>
                                    Ciudad:
                                  </td>
                                  <td>
                                    <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault05" value="<?php echo $ciudad; ?>" required>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td>
                                    Cargo:
                                  </td>
                                  <td>
                                    <input type="text" name="cargo" placeholder="Cargo" class="form-control" id="validationDefault05" value="<?php echo $cargo; ?>" required>
                                  </td>
                                  <td>
                                    Contraseña:
                                  </td>
                                  <td>
                                    <input type="password" name="contraseñaactual" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                                  </td>
                                  <td>
                                    Nueva Contraseña:
                                  </td>
                                  <td>
                                    <input type="password" name="contraseñanueva" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                                  </td>
                                </tr>
                                <tr align="center" valign="middle">
                                  <td colspan="6">
                                    <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                                  </td>
                                </tr>
                              </table>
                            </form>
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
                                <a href="php/Eliminar.php" class="btn btn-success border-dark text-white">SI</a>
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
          <button class="nav-link active text-white" style="background-color: #00923F;" id="registro-tab" data-bs-toggle="tab" data-bs-target="#registro-tab-pane" type="button" role="tab" aria-controls="registro-tab-pane" aria-selected="true">REGISTRAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Visualizar-tab" data-bs-toggle="tab" data-bs-target="#Visualizar-tab-pane" type="button" role="tab" aria-controls="Visualizar-tab-pane" aria-selected="false">VISUALIZAR</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link text-white" style="background-color: #00923F;" id="Modificar-tab" data-bs-toggle="tab" data-bs-target="#Modificar-tab-pane" type="button" role="tab" aria-controls="Modificar-tab-pane" aria-selected="false">MODIFICAR</button>
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
                          <table class="table table-success table-striped">
                            <tr align="center" valign="middle">
                              <td>
                                Cedula:
                              </td>
                              <td>
                                <input type="number" name="cedula" placeholder="Cedula" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Nombres:
                              </td>
                              <td>
                                <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" required>
                              </td>
                              <td>
                                Apellidos:
                              </td>
                              <td>
                                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              <td>
                                Codigo:
                              </td>
                              <td>
                                <input type="text" name="codigoestudiante" placeholder="Codigo" class="form-control" id="validationDefault05" required>
                              </td>
                              <td>
                                Correo:
                              </td>
                              <td>
                                <div class="input-group">
                                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                  <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                </div>
                              </td>
                              <td>
                                Telefono:
                              </td>
                              <td>
                                <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              <td>
                                Direccion:
                              </td>
                              <td>
                                <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault05" required>
                              </td>
                              <td>
                                Ciudad:
                              </td>
                              <td>
                                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault05" required>
                              </td>
                              <td>
                                Programa:
                              </td>
                              <td>
                                <input type="text" name="programa" placeholder="Programa" class="form-control" id="validationDefault05" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">

                              <td>
                                Contraseña:
                              </td>
                              <td colspan="2">
                                <input type="password" name="contraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                              </td>
                              <td>
                                Repite Contraseña:
                              </td>
                              <td colspan="2">
                                <input type="password" name="repitecontraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                              </td>
                            </tr>
                            <tr align="center" valign="middle">
                              <td colspan="6">
                                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                              </td>
                            </tr>
                          </table>
                        </form>
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
                        <b>NOMBRES</b> 
                      </td>
                      <td>
                        <b>APELLIDOS</b> 
                      </td>
                      <td>
                        <b>PROGRAMA</b> 
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
                            $codigoestudiante = $row2['CodigoEstudiante'];
                            $cedula = $row2['Cedula'];
                            $programa = $row2['Programa'];
                            $nombre = $row2['Nombres'];
                            $apellido = $row2['Apellidos'];
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
                                  <?php echo $nombre; ?>
                                </td>
                                <td>
                                  <?php echo $apellido; ?>
                                </td>
                                <td>
                                  <?php echo $programa; ?>
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
                    <div class="container" align="center" style="width: 45rem;">
                      <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                        <table class="table table-striped" align="center">
                          <td align="center">
                           <div class="col-md-6">
                            <label for="validationDefault05" class="form-label"><b>CODIGO</b></label>
                            <input type="text" name="codigo" placeholder="Ingrese codigo estudiante" class="form-control" id="validationDefault05" required>
                            <br>
                            <button class="btn btn-success border-dark" type="submit" name="enviar">Eliminar Estudiante</button>
                          </div>
                        </td>
                      </table>
                    </form>
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
        </div>
        <div class="tab-pane fade show" id="Modificar-tab-pane" role="tabpanel" aria-labelledby="Modificar-tab" tabindex="0">
          <br>
          <div class="row h-100 justify-content-center align-items-center">
            <div class="card col-11 border-black" style="background-color: #F0F2EE;">
              <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
                <table class="table table-striped bg-white">
                  <tr align="center">
                    <td>
                      <b>COD_EST</b> 
                    </td>
                    <td>
                      <b>CEDULA</b> 
                    </td>
                    <td>
                      <b>NOMBRES</b> 
                    </td>
                    <td>
                      <b>APELLIDOS</b> 
                    </td>
                    <td>
                      <b>CORREO</b> 
                    </td>
                    <td>
                      <b>TELEFONO</b> 
                    </td>
                    <td>
                      <b>DIRECCIÓN</b> 
                    </td>
                    <td>
                      <b>CIUDAD</b> 
                    </td>
                    <td>
                      <b>PROGRAMA</b> 
                    </td>
                  </tr>
                  <tbody class="table-group-divider">
                    <?php
                    if($inc){
                      $consulta7 = "SELECT estudiante.CodigoEstudiante, estudiante.Cedula, estudiante.Programa, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono, persona.Direccion, persona.Ciudad FROM
                      estudiante inner join persona on estudiante.Cedula = persona.Cedula ";
                      $resultado3 = mysqli_query($conexion,$consulta7);
                      if($resultado3){
                        while ($roww10 = $resultado3->fetch_array()) {
                          $codigoestudiante11          = $roww10['CodigoEstudiante'];
                          $cedula11 = $roww10['Cedula'];
                          $programa11     = $roww10['Programa'];
                          $nombre11          = $roww10['Nombres'];
                          $apellido11          = $roww10['Apellidos'];
                          $correo11 = $roww10['Correo'];
                          $telefono11          = $roww10['Telefono'];
                          $direccion11 = $roww10['Direccion'];
                          $ciudad11          = $roww10['Ciudad'];
                          if($cedula11){
                            ?>
                            <tr align="center">
                              <td>
                                <?php echo $codigoestudiante11; ?>
                              </td>
                              <td>
                                <?php echo $cedula11; ?>
                              </td>

                              <td>
                                <?php echo $nombre11; ?>
                              </td>
                              <td>
                                <?php echo $apellido11; ?>
                              </td>
                              <td>
                                <?php echo $correo11; ?>
                              </td>
                              <td>
                                <?php echo $telefono11; ?>
                              </td>
                              <td>
                                <?php echo $direccion11; ?>
                              </td>
                              <td>
                                <?php echo $ciudad11; ?>
                              </td>
                              <td>
                                <?php echo $programa11; ?>
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
                  <div class="container" align="center" style="width: 45rem;">
                    <form class="row g-3" name="modificar estudiante" method="POST" action="modest.php" >
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="coddd" class="form-label"><b>CODIGO</b></label>
                          <input type="text" name="codigo" placeholder="Ingrese codigo estudiante" class="form-control" id="coddd" required>
                          <br>
                          <button class="btn btn-success border-dark" type="submit" name="enviar">Cargar Datos</button>
                        </div>
                      </td>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
     <ul class="nav nav-tabs" style="background-color: #00923F;" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active text-white" style="background-color: #00923F;" id="registroD-tab" data-bs-toggle="tab" data-bs-target="#registroD-tab-pane" type="button" role="tab" aria-controls="registroD-tab-pane" aria-selected="true">REGISTRAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="VisualizarD-tab" data-bs-toggle="tab" data-bs-target="#VisualizarD-tab-pane" type="button" role="tab" aria-controls="VisualizarD-tab-pane" aria-selected="false">VISUALIZAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="AsignarD-tab" data-bs-toggle="tab" data-bs-target="#AsignarD-tab-pane" type="button" role="tab" aria-controls="AsignarD-tab-pane" aria-selected="false">ASIGNAR</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link text-white" style="background-color: #00923F;" id="ModificarD-tab" data-bs-toggle="tab" data-bs-target="#ModificarD-tab-pane" type="button" role="tab" aria-controls="ModificarD-tab-pane" aria-selected="false">MODIFICAR</button>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="registroD-tab-pane" role="tabpanel" aria-labelledby="registroD-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>REGISTRAR DOCENTES</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo docente" method="POST" action="php/ConexionCrearUsuarioDocente.php">
                        <table class="table table-success table-striped">
                          <tr align="center" valign="middle">
                            <td>
                              Cedula:
                            </td>
                            <td>
                              <input type="number" name="cedula" placeholder="Cedula" class="form-control" id="validationDefault01" required>
                            </td>
                            <td>
                              Nombres:
                            </td>
                            <td>
                              <input type="text" name="nombre" placeholder="Nombres" class="form-control" id="validationDefault01" required>
                            </td>
                            <td>
                              Apellidos:
                            </td>
                            <td>
                              <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" id="validationDefault02" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Codigo:
                            </td>
                            <td>
                              <input type="text" name="codigodocente" placeholder="Codigo" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Correo:
                            </td>
                            <td>
                              <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                <input type="email" name="correo" placeholder="Email" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                              </div>
                            </td>
                            <td>
                              Telefono:
                            </td>
                            <td>
                              <input type="phone" name="telefono" placeholder="Telefono" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Direccion:
                            </td>
                            <td>
                              <input type="text" name="direccion" placeholder="Direccion" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Ciudad:
                            </td>
                            <td>
                              <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Especialización:
                            </td>
                            <td>
                              <input type="text" name="especializacion" placeholder="Especialización" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td>
                              Contraseña:
                            </td>
                            <td colspan="2">
                              <input type="password" name="contraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                            </td>
                            <td>
                              Repite Contraseña:
                            </td>
                            <td colspan="2">
                              <input type="password" name="repitecontraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
                            </td>
                          </tr>
                          <tr align="center" valign="middle">
                            <td colspan="6">
                              <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
                            </td>
                          </tr>
                        </table>
                      </form>
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
      </div>
      <div class="tab-pane fade" id="VisualizarD-tab-pane" role="tabpanel" aria-labelledby="VisualizarD-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
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
                          $codigodocente1 = $row3['CodigoDocente'];
                          $cedula1 = $row3['Cedula'];
                          $especializacion1 = $row3['Especializacion'];
                          $nombre1 = $row3['Nombres'];
                          $apellido1 = $row3['Apellidos'];
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
                <h4 id="scrollspyHeading14" align="center"><b><i>ELIMINAR DOCENTE</i></b></h4>
                <p> 
                  <div class="container" align="center" style="width: 45rem;">
                    <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                      <table class="table table-striped" align="center">
                        <td align="center">
                         <div class="col-md-6">
                          <label for="validationDefault05" class="form-label"><b>CODIGO</b></label>
                          <input type="text" name="codigo" placeholder="Ingrese codigo docente" class="form-control" id="validationDefault05" required>
                          <br>
                          <button class="btn btn-success border-dark" type="submit" name="enviar">Eliminar Docente</button>
                        </div>
                      </td>
                    </table>
                  </form>
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
      <div class="tab-pane fade" id="AsignarD-tab-pane" role="tabpanel" aria-labelledby="AsignarD-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
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
                                <button class="btn btn-success border-dark " type="submit" name="enviar">Registrar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="card" style="width: 18rem;">
                          <div class="card-body">
                            <div class="alert alert-success border-dark text-black" role="alert">
                              TRABAJOS SIN ASESOR
                            </div>
                            <table class="table table-striped">
                              <tr align="center">
                                <td>
                                  <b>ID_TRA</b>
                                </td>
                                <td>
                                  <b>NOM_TRA</b>
                                </td>
                                <td>
                                  <b>COD_EST</b>
                                </td>
                                <td>
                                  <b>NOM_EST</b>
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
                                      $nombretrabajo = $row2['NombreTrabajo'];
                                      $codigoestudiante = $row2['CodigoEstudiante'];
                                      $codigoasesor = $row2['CodigoDocente'];
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
                                          <td>
                                            <?php 
                                            $con = " SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$codigoestudiante'  ";
                                            $con = mysqli_query($conexion,$con);
                                            while ($row6 = $con->fetch_array()){
                                              $c = $row6['Cedula'];
                                              $con1 = "SELECT Nombres FROM persona WHERE Cedula = '$c' ";
                                              $con1 = mysqli_query($conexion,$con1);
                                              while ($row7 = $con1->fetch_array()){
                                                $c1 = $row7['Nombres'];
                                                echo $c1;
                                              }
                                            }
                                            ?>
                                          </td>
                                        </tr>
                                        <?php
                                      }                             
                                    }
                                  }
                                }
                                ?>
                              </table>
                              <div class="alert alert-primary border-dark text-black" role="alert">
                               NUMERO DE ASESORIAS DESIGNADAS A DOCENTES
                             </div>
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
                                <td>
                                  <b>NUM_ASES</b>
                                </td>
                              </tr>
                              <tbody class="table-group-divider">
                                <?php
                                if($inc){
                                  $consulta = " SELECT CodigoDocente, Cantidad FROM numeroasesorias ";
                                  $resultado = mysqli_query($conexion,$consulta);
                                  if($resultado){
                                    while ($row2 = $resultado->fetch_array()) {
                                     $codigodocente2 = $row2['CodigoDocente'];
                                     $cantidad = $row2['Cantidad'];
                                     if($codigodocente2){
                                      ?>
                                      <tr align="center">
                                        <td>
                                          <?php echo $codigodocente2; ?>
                                        </td>
                                        <?php
                                        $consulta3 = " SELECT Cedula FROM docente WHERE CodigoDocente = '$codigodocente2' ";
                                        $consulta3 = mysqli_query($conexion,$consulta3);
                                        while ($row8 = $consulta3->fetch_array()){
                                          $cedula2 = $row8['Cedula'];
                                          $consulta4 = " SELECT Nombres,Apellidos FROM persona WHERE Cedula = '$cedula2' ";
                                          $consulta4 = mysqli_query($conexion,$consulta4);
                                          while ($row9 = $consulta4->fetch_array()){
                                            $nombre2 = $row9['Nombres'];
                                            $apellido2 = $row9['Apellidos'];
                                            ?>
                                            <td>
                                              <?php echo $nombre2; ?>
                                            </td>
                                            <td>
                                              <?php echo $apellido2; ?>
                                            </td>
                                            <?php
                                          }
                                        }
                                        ?>
                                        <td>
                                          <?php echo $cantidad; ?>
                                        </td>
                                      </tr>
                                      <?php
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
                                <button class="btn btn-success border-dark" type="submit" name="enviar">Registrar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="card bg-transparent" style="width: 18rem;">
                          <div class="card-body">
                            <div class="alert alert-success border-dark text-black" role="alert">
                              TRABAJOS SIN JURADO
                            </div>
                            <table class="table table-striped">
                              <tr align="center">
                                <td>
                                  <b>ID_TRA</b>
                                </td>
                                <td>
                                  <b>NOM_TRA</b>
                                </td>
                                <td>
                                  <b>COD_EST</b>
                                </td>
                                <td>
                                  <b>NOM_EST</b>
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
                                      $nombretrabajoj = $row5['NombreTrabajo'];
                                      $codigoestudiantej = $row5['CodigoEstudiante'];
                                      $codigojurado = $row5['CodigoDocente'];
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
                                          <td>
                                            <?php 
                                            $con = " SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$codigoestudiantej'  ";
                                            $con = mysqli_query($conexion,$con);
                                            while ($row6 = $con->fetch_array()){
                                              $c = $row6['Cedula'];
                                              $con1 = "SELECT Nombres FROM persona WHERE Cedula = '$c' ";
                                              $con1 = mysqli_query($conexion,$con1);
                                              while ($row7 = $con1->fetch_array()){
                                                $c1 = $row7['Nombres'];
                                                echo $c1;
                                              }
                                            }
                                            ?>
                                          </td>
                                        </tr>
                                        <?php
                                      }
                                    }
                                  }
                                }
                                ?>
                              </table>
                              <div class="alert alert-primary border-dark text-black" role="alert">
                               NUMERO DE PROYECTOS DESIGNADAS A DOCENTES
                             </div>
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
                                <td>
                                  <b>NUM_PRO</b>
                                </td>
                              </tr>
                              <tbody class="table-group-divider">
                                <?php
                                if($inc){
                                  $consulta = " SELECT CodigoDocente, Cantidad FROM numerojurados ";
                                  $resultado = mysqli_query($conexion,$consulta);
                                  if($resultado){
                                    while ($row2 = $resultado->fetch_array()) {
                                     $codigodocente2 = $row2['CodigoDocente'];
                                     $cantidad = $row2['Cantidad'];
                                     if($codigodocente2){
                                      ?>
                                      <tr align="center">
                                        <td>
                                          <?php echo $codigodocente2; ?>
                                        </td>
                                        <?php
                                        $consulta5 = " SELECT Cedula FROM docente WHERE CodigoDocente = '$codigodocente2' ";
                                        $consulta5 = mysqli_query($conexion,$consulta5);
                                        while ($row10 = $consulta5->fetch_array()){
                                          $cedula3 = $row10['Cedula'];
                                          $consulta6 = " SELECT Nombres,Apellidos FROM persona WHERE Cedula = '$cedula3' ";
                                          $consulta6 = mysqli_query($conexion,$consulta6);
                                          while ($row11 = $consulta6->fetch_array()){
                                            $nombre3 = $row11['Nombres'];
                                            $apellido3 = $row11['Apellidos'];
                                            ?>
                                            <td>
                                              <?php echo $nombre3; ?>
                                            </td>
                                            <td>
                                              <?php echo $apellido3; ?>
                                            </td>
                                            <?php
                                          }
                                        }
                                        ?>
                                        <td>
                                          <?php echo $cantidad; ?>
                                        </td>
                                      </tr>
                                      <?php
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
    <div class="tab-pane fade show" id="ModificarD-tab-pane" role="tabpanel" aria-labelledby="ModificarD-tab" tabindex="0">
      <br>
      <div class="row h-100 justify-content-center align-items-center">
        <div class="card col-11 border-black" style="background-color: #F0F2EE;">
          <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2 text-black" tabindex="0">
            <table class="table table-striped bg-white">
              <tr align="center">
                <td>
                  <b>COD_DOC</b> 
                </td>
                <td>
                  <b>CEDULA</b> 
                </td>
                <td>
                  <b>NOMBRES</b> 
                </td>
                <td>
                  <b>APELLIDOS</b> 
                </td>
                <td>
                  <b>CORREO</b> 
                </td>
                <td>
                  <b>TELEFONO</b> 
                </td>
                <td>
                  <b>DIRECCIÓN</b> 
                </td>
                <td>
                  <b>CIUDAD</b> 
                </td>
                <td>
                  <b>ESPECIALIZACIÓN</b> 
                </td>
              </tr>
              <tbody class="table-group-divider">
                <?php
                if($inc){
                  $consulta7 = "SELECT docente.CodigoDocente, docente.Cedula, docente.Especializacion, persona.Nombres, persona.Apellidos, persona.Correo, persona.Telefono, persona.Direccion, persona.Ciudad FROM
                  docente inner join persona on docente.Cedula = persona.Cedula ";
                  $resultado3 = mysqli_query($conexion,$consulta7);
                  if($resultado3){
                    while ($roww10 = $resultado3->fetch_array()) {
                      $codigodocente11  = $roww10['CodigoDocente'];
                      $cedula11 = $roww10['Cedula'];
                      $especializacion11 = $roww10['Especializacion'];
                      $nombre11 = $roww10['Nombres'];
                      $apellido11 = $roww10['Apellidos'];
                      $correo11 = $roww10['Correo'];
                      $telefono11 = $roww10['Telefono'];
                      $direccion11 = $roww10['Direccion'];
                      $ciudad11          = $roww10['Ciudad'];
                      if($cedula11){
                        ?>
                        <tr align="center">
                          <td>
                            <?php echo $codigodocente11; ?>
                          </td>
                          <td>
                            <?php echo $cedula11; ?>
                          </td>

                          <td>
                            <?php echo $nombre11; ?>
                          </td>
                          <td>
                            <?php echo $apellido11; ?>
                          </td>
                          <td>
                            <?php echo $correo11; ?>
                          </td>
                          <td>
                            <?php echo $telefono11; ?>
                          </td>
                          <td>
                            <?php echo $direccion11; ?>
                          </td>
                          <td>
                            <?php echo $ciudad11; ?>
                          </td>
                          <td>
                            <?php echo $especializacion11; ?>
                          </td>
                        </tr>
                        <?php
                      }
                    }
                  }
                }
                ?>
              </table>
              <div class="container" align="center" style="width: 45rem;">
                <form class="row g-3" name="modificar docente" method="POST" action="moddoc.php" >
                  <table class="table table-striped" align="center">
                    <td align="center">
                     <div class="col-md-6">
                      <label for="coddd" class="form-label"><b>CODIGO</b></label>
                      <input type="text" name="codigo" placeholder="Ingrese codigo docente" class="form-control" id="coddd" required>
                      <br>
                      <button class="btn btn-success border-dark" type="submit" name="enviar">Cargar Datos</button>
                    </div>
                  </td>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>
</div>
</body>
</html>