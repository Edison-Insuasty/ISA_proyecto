<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Perfil Estudiante</title>
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
      <button class="nav-link text-white bg-transparent" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Trabajos</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link text-white bg-transparent" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Docentes</button>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="php/CerrarSesion.php">Cerrar Sesión</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
     <br>
     <div class="row h-100 justify-content-center align-items-center">
      <div class="card col-10 " style="background-color: #F0F2EE;">
        <br>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
          <h4 id="scrollspyHeading1" align="center"><b><i>PERFIL</i></b> </h4>
          <p>
            <div class="card mb-3" style="background-color: #DADED6;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="img/estudiante.jpg" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                  <div class="card-body" align="justify">
                    <h5 class="card-title" align="center">
                      <?php 
                      if($inc){
                        $con = "SELECT Nombres, Apellidos FROM Persona WHERE Cedula = (SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]') ";
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
                              &nbsp;
                              <?php
                              echo $a;
                            }
                          }
                        }
                        ?> 
                      </i></b>
                    </h5>
                    <p class="card-text">
                      Como estudiante tiene la responsabilidad de subir adecuadamente su proyecto de grado, para ser guiado por un asesor que sera designado, igualmentre recibira su nota de aprobacion por un jurado designado, podra visualizar tanto el asesor como el jurado que fueron desigandos a guiasr y calificar su proyecto.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Visualizar Información Personal.
                  </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <?php
                    if($inc){
                      $consulta = "SELECT * FROM estudiante WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
                      $resultado = mysqli_query($conexion,$consulta);
                      $consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM estudiante WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]') ";
                      $resultado1 = mysqli_query($conexion,$consulta1);
                      if($resultado && $resultado1){
                        while ($row = $resultado->fetch_array()) {
                          $cestudiante = $row['CodigoEstudiante'];
                          $cedula = $row['Cedula'];
                          $programa = $row['Programa'];
                          $contraseña = $row['Password'];
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
                                  <?php echo $cestudiante; ?>
                                </td>
                                <td>
                                  <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                                </td>
                              </tr>
                              <tr align="center">
                                <td>
                                  <b>PROGRAMA</b>
                                </td>
                                <td>
                                  <?php echo $programa; ?>
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
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    <div class="card-group" align="center">
                      <div class="card bg-transparent border-white" style="width: 18rem;">
                        <div class="card-body">
                          <form class="row g-3" name="modificar estudiante" method="POST" action="php/ModificarEstudiante.php">
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
                                  Programa:
                                </td>
                                <td>
                                  <input type="text" name="programa" placeholder="Programa" class="form-control" id="validationDefault05" value="<?php echo $programa; ?>" required>
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
    <br>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    <br>
    <div class="row h-100 justify-content-center align-items-center">
      <div class="card col-10 border-black" style="background-color: #F0F2EE;">
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
          <h4 id="scrollspyHeading2" align="center"><b><i>TRABAJO</i></b></h4>
          <p>       
            <div class="card-group" align="center">
              <div class="card bg-transparent " style="width: 18rem;">
                <h4><i><b>REQUISITOS</b></i></h4>
                <table align="center">
                  <td>
                    <div class="card" style="width: 18rem;">
                      <img src="img/graduacion.jpg" class="card-img-top " alt="...">
                      <div class="card-body">
                        <h5 class="card-title" align="center">¿Desea visualizar los requisitos del trabajo de grado?</h5>
                      </div>
                      <div class="card-body" align="center">
                        <a href="https://secretariageneral.udenar.edu.co/?wpfb_dl=3350#:~:text=Los%20trabajos%20de%20grado%20en,%25%20y%2040%25%2C%20respectivamente." target="_blank" class="btn btn-success border-dark card-link" ><i>SI</i></a>
                      </div>
                    </div>
                  </td>
                </table> 
              </div>
              <div class="card  bg-transparent" style="width: 18rem;">
                <div class="card-body">
                  <h4><i><b>ADJUNTAR</b></i></h4>
                  <div class="card-body">
                    <form class="row g-3" name="nuevo archivo" method="POST" action="php/subirArchivo.php" enctype="multipart/form-data">
                      <div class="col-12">
                        <label for="validationDefault01" class="form-label"><b>Nombre</b></label>
                        <input type="text" name="nombreproyecto" placeholder="Ingrese nombre del Trabajo" class="form-control" id="validationDefault01" required>
                      </div>
                      <div class="col-12">
                        <label for="validationDefault01" class="form-label"><b>Subir Proyecto</b></label>
                        <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf">
                      </div>
                      <div class="col-12">
                        <button class="btn btn-success border-dark" type="submit" name="enviar">Adjuntar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>  
          </p>
          <h4 id="scrollspyHeading3" align="center"><b><i></i></b></h4>
          <p>
            <div class="card-group" align="center">
              <div class="card bg-transparent " style="width: 18rem;">
                <div class="card-body">
                  <h4><i><b>VISUALIZAR</b></i></h4>
                  <table class="table table-bordered border-dark">
                    <?php
                    if($inc){
                      $consulta = "SELECT * FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
                      $consulta = mysqli_query($conexion,$consulta);
                      $resultado  = mysqli_fetch_array($consulta);
                      if($resultado){
                        $consulta = "SELECT * FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
                        $res = mysqli_query($conexion,$consulta);
                        while ($row2 = $res->fetch_array()){
                          $idtrabajo = $row2['idTrabajo'];
                          $nomTrabajo = $row2['NombreTrabajo'];
                          ?>
                          <tr align="center" class="bg-transparent text-black">
                            <td rowspan="3" valign="middle">
                              <b>TRABAJO</b>
                            </td>
                            <td>
                              <b><i>ID</i></b> 
                            </td>
                            <td>
                              <b><i>NOMBRE</i></b>
                            </td>
                          </tr>
                          <tr align="center" class="bg-transparent text-black">
                            <td>
                              <?php echo $idtrabajo; ?>
                            </td>
                            <td>
                              <?php echo $nomTrabajo; ?>
                            </td>
                          </tr>
                          <tr align="center" class="bg-transparent">
                            <td colspan="2">
                              <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                                <button class="btn btn-success form-control border-dark text-white" type="submit" name="enviar">ELIMINAR</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }
                        $consulta2 = "SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                        $consulta2 = mysqli_query($conexion,$consulta2);
                        $resultado2  = mysqli_fetch_array($consulta2);
                        if($resultado2){
                          $consulta2 = "SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                          $res1 = mysqli_query($conexion,$consulta2);
                          while ($row3 = $res1->fetch_array()){
                            $cdocente = $row3['CodigoDocente'];
                            $con1 = " SELECT Cedula FROM docente WHERE CodigoDocente = '$cdocente' ";
                            $con1 = mysqli_query($conexion,$con1);
                            $con1 = mysqli_fetch_array($con1);
                            $con3 = $con1['Cedula'];
                            $con2 = " SELECT Nombres,Apellidos FROM persona WHERE Cedula = '$con3' ";
                            $con2 = mysqli_query($conexion,$con2);
                            while ($r1 = $con2->fetch_array()){
                              $nombreA = $r1['Nombres'];
                              $apellidoA = $r1['Apellidos'];
                              ?>
                              <tr align="center" class="bg-light text-black">
                                <td rowspan="2" valign="middle">
                                  <b>ASESOR</b> 
                                </td>
                                <td>
                                  <b><i>CODIGO</i></b>
                                </td>
                                <td>
                                  <b><i>NOMBRES</i></b>
                                </td>
                              </tr>
                              <tr align="center" class="bg-light text-black">
                                <td>
                                  <?php echo $cdocente; ?>
                                </td>
                                <td>
                                  <?php echo $nombreA; ?>
                                  <?php echo $apellidoA; ?>
                                </td>
                              </tr>
                              <?php
                            }
                          }
                        }else{
                          ?>
                          <tr align="center" class="bg-light text-black">
                            <td rowspan="2" valign="middle">
                              <b>ASESOR</b> 
                            </td>
                            <td>
                              <b><i>CODIGO</i></b>
                            </td>
                            <td>
                              <b><i>NOMBRES</i></b>
                            </td>
                          </tr>
                          <tr align="center" class="bg-light text-black">
                            <td>

                            </td>
                            <td>

                            </td>
                          </tr>
                          <?php
                        }
                        $consulta3 = "SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                        $consulta3 = mysqli_query($conexion,$consulta3);
                        $resultado3  = mysqli_fetch_array($consulta3);
                        if($resultado3){
                          $consulta3 = "SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                          $res2 = mysqli_query($conexion,$consulta3);
                          while ($row4 = $res2->fetch_array()){
                            $cjurado = $row4['CodigoDocente'];
                            $con4 = " SELECT Cedula FROM docente WHERE CodigoDocente = '$cjurado' ";
                            $con4 = mysqli_query($conexion,$con4);
                            $con4 = mysqli_fetch_array($con4);
                            $con5 = $con4['Cedula'];
                            $con6 = " SELECT Nombres,Apellidos FROM persona WHERE Cedula = '$con5' ";
                            $con6 = mysqli_query($conexion,$con6);
                            while ($r2 = $con6->fetch_array()){
                              $nombreJ = $r2['Nombres'];
                              $apellidoJ = $r2['Apellidos'];
                              ?>
                              <tr align="center" class="bg-transparent text-black">
                                <td rowspan="2" valign="middle">
                                  <b>JURADO</b> 
                                </td>
                                <td>
                                  <b><i>CODIGO</i></b>
                                </td>
                                <td>
                                  <b><i>NOMBRES</i></b>
                                </td>
                              </tr>
                              <tr align="center" class="bg-transparent text-black">
                                <td>
                                  <?php echo $cjurado; ?>
                                </td>
                                <td>
                                  <?php echo $nombreJ; ?>
                                  <?php echo $apellidoJ; ?>
                                </td>
                              </tr>
                              <?php
                            }
                          }
                        }else{
                          ?>
                          <tr align="center" class="bg-transparent text-black">
                            <td rowspan="2" valign="middle">
                              <b>JURADO</b>
                            </td>
                            <td>
                              <b><i>CODIGO</i></b>
                            </td>
                            <td>
                              <b><i>NOMBRES</i></b>
                            </td>
                          </tr>
                          <tr align="center" class="bg-transparent text-black">
                            <td>

                            </td>
                            <td>

                            </td>
                          </tr>
                          <?php
                        }
                        $consulta4 = "SELECT Mensaje FROM comentario WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                        $consulta4 = mysqli_query($conexion,$consulta4);
                        $resultado4  = mysqli_fetch_array($consulta4);
                        if($resultado4){
                          $consulta4 = "SELECT Mensaje FROM comentario WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                          $res4 = mysqli_query($conexion,$consulta4);
                          $contador = 0;
                          while ($row5 = $res4->fetch_array()){
                            $men          = $row5['Mensaje'];
                            $contador++;
                            ?>
                            <tr align="center" class="bg-light text-black">
                              <td valing="middle" >
                                <b>COMENTARIO #</b> 
                              </td>
                              <td>
                                <b><i><?php echo $contador; ?>=></i></b>
                              </td>
                              <td>
                                <?php echo $men; ?>
                              </td>
                            </tr>
                            <?php
                          }
                        }else{
                          ?>
                          <tr align="center" class="bg-light text-black">
                            <td valing="middle">
                              <b>COMENTARIOS</b> 
                            </td>
                            <td>
                              <b><i>=></i></b> 
                            </td>
                            <td>

                            </td>
                          </tr>
                          <?php
                        }
                        $consulta5 = "SELECT Nota, Estado FROM calificacion WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                        $consulta5 = mysqli_query($conexion,$consulta5);
                        $resultado5  = mysqli_fetch_array($consulta5);
                        if($resultado5){
                          $consulta5 = "SELECT Nota, Estado FROM calificacion WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
                          $res5 = mysqli_query($conexion,$consulta5);
                          while ($row6 = $res5->fetch_array()){
                            $nota1 = $row6['Nota'];
                            $estado1 = $row6['Estado'];
                            ?>
                            <tr align="center" class="bg-transparent text-black">
                              <td>
                                <b>NOTA</b> 
                              </td>
                              <td colspan="2">
                                <?php echo $nota1; ?>
                              </td>
                            </tr>
                            <tr align="center" class="bg-light text-black">
                              <td>
                                <b>ESTADO</b> 
                              </td>
                              <td colspan="2">
                                <?php echo $estado1; ?>
                              </td>
                            </tr>
                            <?php
                          }
                        }else{
                          ?>
                          <tr align="center" class="bg-transparent text-black">
                            <td>
                              <b>NOTA</b> 
                            </td>
                            <td colspan="2">
                            </td>
                          </tr>
                          <tr align="center" class="bg-light text-black">
                            <td>
                              <b>ESTADO</b> 
                            </td>
                            <td colspan="2">
                            </td>
                          </tr>
                          <?php
                        }
                      }else{
                        ?>
                        <tr align="center">
                          <td>
                            <b>NO HAY TRABAJO REGISTRADO</b>
                          </td>
                        </tr>
                        <?php
                      }
                      
                    }
                    ?>
                  </table>
                </div>
              </div>
              <div class="card bg-transparent" style="width: 18rem;">
                <div class="card-body">
                 <br>
                 <h4><i><b>MODIFICAR</b></i></h4>
                 <form class="row g-3" name="nuevo archivo" method="POST" action="php/ModificarArchivo.php" enctype="multipart/form-data">
                  <div class="col-12">
                    <label for="validationDefault01" class="form-label"><b>Nombre</b></label>
                    <?php
                    if ($resultado) {
                      ?>
                      <input type="text" name="nombreproyecto" placeholder="Ingrese nombre del proyecto" class="form-control" id="validationDefault01" value="<?php echo $nomTrabajo; ?>" required>
                      <?php
                    }else{
                      ?>
                      <input type="text" name="nombreproyecto" placeholder="Ingrese nombre del proyecto" class="form-control" id="validationDefault01" required>
                      <?php
                    }
                    ?>
                  </div>
                  <div class="col-md-12">
                    <label for="validationDefault05" class="form-label"><b>Contraseña</b></label>
                    <input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese su contraseña" class="form-control" id="validationDefault05" required>
                  </div>
                  <div class="col-12">
                    <label for="validationDefault01" class="form-label"><b>Subir Proyecto</b></label>
                    <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf">
                  </div>
                  <div class="col-12">
                    <button class="btn btn-success border-dark" type="submit" name="enviar">Modificar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </p>  
        <h4 id="scrollspyHeading7" align="center"><b><i>CONTACTOS</i></b></h4>
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
  <br>
</div>
<div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
  <br>
  <div class="row h-100 justify-content-center align-items-center">
    <div class="card col-10 border-black" style="background-color: #F0F2EE;">
      <br>
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
        <h4 id="scrollspyHeading1" align="center"><b><i>ASESOR DE TRABAJO DE GRADO</i></b></h4>
        <h4  align="center"><b><i>__________________________________________</i></b></h4>
        <p> 
          <?php
          if($inc){
            $consulta6 = " SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
            $consulta6 = mysqli_query($conexion,$consulta6);
            $consulta6  = mysqli_fetch_array($consulta6);
            if($consulta6){
              $idd = $consulta6['idTrabajo'];
              $consulta7 = " SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = '$idd' ";
              $consulta7 = mysqli_query($conexion,$consulta7);
              $consulta7  = mysqli_fetch_array($consulta7);
              if($consulta7){
                $cod = $consulta7['CodigoDocente'];
                $consulta8 = " SELECT * FROM docente WHERE CodigoDocente = '$cod' ";
                $consulta8 = mysqli_query($conexion,$consulta8);
                $consulta8  = mysqli_fetch_array($consulta8);
                $esp = $consulta8['Especializacion'];
                $ced = $consulta8['Cedula'];
                $consulta9 = " SELECT * FROM persona WHERE Cedula = '$ced' ";
                $consulta9 = mysqli_query($conexion,$consulta9);
                $consulta9  = mysqli_fetch_array($consulta9);
                $nom = $consulta9['Nombres'];
                $ape = $consulta9['Apellidos'];
                $cor = $consulta9['Correo'];
                $tel = $consulta9['Telefono'];
                ?>
                <table class="table table-success table-striped">
                  <tr align="center">
                    <td>
                      <b>COD_ASESOR</b>
                    </td>
                    <td>
                      <?php echo $cod; ?>
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
                      <?php echo $nom; ?>
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
                      <?php echo $ape; ?>
                    </td>
                    <td>
                      <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <b>ESPECIALIZACIÓN</b>
                    </td>
                    <td>
                      <?php echo $esp; ?>
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
                      <?php echo $cor; ?>
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
                      <?php echo $tel; ?>
                    </td>
                    <td>
                      <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                    </td>
                  </tr>
                </table>
                <?php
              }else{
                ?>
                <table align="center">
                  <td>
                    <div class="alert alert-danger" role="alert">
                      AUN NO SE ASIGNA ASESOR
                    </div>
                  </td>
                </table>
                <?php
              }
            }else{
              ?>
              <table align="center">
                <td>
                  <div class="alert alert-danger" role="alert">
                    AUN NO SE REGISTRA EL TRABAJO
                  </div>
                </td>
              </table>
              <?php
            }
          }
          ?>
        </p>
        <h4 id="scrollspyHeading1" align="center"><b><i>JURADO DE TRABAJO DE GRADO</i></b></h4>
        <h4  align="center"><b><i>__________________________________________</i></b></h4>
        <p> 
          <?php
          if($inc){
            $consulta10 = " SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
            $consulta10 = mysqli_query($conexion,$consulta10);
            $consulta10  = mysqli_fetch_array($consulta10);
            if($consulta10){
              $idd = $consulta10['idTrabajo'];
              $consulta11 = " SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = '$idd' ";
              $consulta11 = mysqli_query($conexion,$consulta11);
              $consulta11  = mysqli_fetch_array($consulta11);
              if($consulta11){
                $cod = $consulta11['CodigoDocente'];
                $consulta12 = " SELECT * FROM docente WHERE CodigoDocente = '$cod' ";
                $consulta12 = mysqli_query($conexion,$consulta12);
                $consulta12  = mysqli_fetch_array($consulta12);
                $esp = $consulta12['Especializacion'];
                $ced = $consulta12['Cedula'];
                $consulta13 = " SELECT * FROM persona WHERE Cedula = '$ced' ";
                $consulta13 = mysqli_query($conexion,$consulta13);
                $consulta13  = mysqli_fetch_array($consulta13);
                $nom = $consulta13['Nombres'];
                $ape = $consulta13['Apellidos'];
                $cor = $consulta13['Correo'];
                $tel = $consulta13['Telefono'];
                ?>
                <table class="table table-success table-striped">
                  <tr align="center">
                    <td>
                      <b>COD_ASESOR</b>
                    </td>
                    <td>
                      <?php echo $cod; ?>
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
                      <?php echo $nom; ?>
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
                      <?php echo $ape; ?>
                    </td>
                    <td>
                      <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                    </td>
                  </tr>
                  <tr align="center">
                    <td>
                      <b>ESPECIALIZACIÓN</b>
                    </td>
                    <td>
                      <?php echo $esp; ?>
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
                      <?php echo $cor; ?>
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
                      <?php echo $tel; ?>
                    </td>
                    <td>
                      <img src="img/visto.png" class="img-fluid rounded-start" width="50">
                    </td>
                  </tr>
                </table>
                <?php
              }else{
                ?>
                <table align="center">
                  <td>
                    <div class="alert alert-danger" role="alert">
                      AUN NO SE ASIGNA JURADO
                    </div>
                  </td>
                </table>
                <?php
              }
            }else{
              ?>
              <table align="center">
                <td>
                  <div class="alert alert-danger" role="alert">
                    AUN NO SE REGISTRA EL TRABAJO
                  </div>
                </td>
              </table>
              <?php
            }
          }
          ?>
        </p>
      </div>
    </div>
  </div>
</div>
</div>
</body>
</html>