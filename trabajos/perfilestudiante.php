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
        <a class="nav-link text-white bg-transparent" href="php/CerrarSesion.php">Cerrar Sesion</a>
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
                                $cedula         = $row['Cedula'];
                                $programa     = $row['Programa'];
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
                            <label for="validationDefault05" class="form-label">Programa</label>
                            <input type="text" name="programa" placeholder="Ingrese Programa" class="form-control border-dark" id="validationDefault05" required>
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
                        <button class="btn btn-primary border-dark" type="submit" name="enviar">Modificar</button>
                      </div>
                  </form>
                  </div>
              </div>
              <div class="card border-white bg-transparent" style="width: 18rem;">
                  <div class="card-body">
                        <br><br><br><br><br><br><br>
                        <img src="img/reg.png" class="img-thumbnail border-dark" width="400">
                    </div>
              </div>
            </div>




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
        
        <nav id="navbar-example2" class="navbar px-3 mb-3" style="background-color: #00923F;">
          <a class="navbar-brand text-white" href="">UDENAR</a>
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading1">Requisitos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading2">Inscribir</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading3">Visualizar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading44">Actualizar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#scrollspyHeading6">Eliminar</a>
            </li>
          </ul>
        </nav>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 border-black" style="background-color: #F0F2EE;">
            <br>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>REQUISITOS</i></b></h4>
              <p> 
                REQUISITOS
              </p>
              <h4 id="scrollspyHeading2" align="center"><b><i>INSCRIBIR TRABAJO</i></b></h4>
              <p>       
                <div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo archivo" method="POST" action="php/subirArchivo.php" enctype="multipart/form-data">
                        <div class="col-12">
                          <label for="validationDefault01" class="form-label">Nombre</label>
                          <input type="text" name="nombreproyecto" placeholder="Ingrese nombre del Trabajo" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-12">
                          <label for="validationDefault01" class="form-label">Subir Proyecto</label>
                          
                          <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf">
                        </div>
                        <div class="col-12">
                          <button class="btn btn-success " type="submit" name="enviar">Registrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card  bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                     
                      <img src="img/reg.png" class="img-thumbnail " width="400">
                    </div>
                  </div>
                </div>  
              </p>
              <h4 id="scrollspyHeading3" align="center"><b><i>VISUALIZAR TRABAJO</i></b></h4>
              <p> 
                

<table class="table table-striped">
  <tr align="center">
                          <td>
                            <b>ID_TRABAJO</b> 
                          </td>
                          <td>
                            <b>NOM_TRABAJO</b> 
                          </td>
                          <td>
                            <b>COD_ASESOR</b> 
                          </td>
                          <td>
                            <b>COD_JURADO</b> 
                          </td>
                          <td>
                            <b>COMENTARIOS</b> 
                          </td>
                          <td>
                            <b>NOTA</b> 
                          </td>
                          <td>
                            <b>ESTADO</b> 
                          </td>
                        </tr>
                        <tbody class="table-group-divider">

<?php
  if($inc){

    $consulta = "SELECT * FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
    $consulta = mysqli_query($conexion,$consulta);
    $resultado  = mysqli_fetch_array($consulta);

    if($resultado){
      $consulta = "SELECT * FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ";
      $res = mysqli_query($conexion,$consulta);
        ?>
        <tr align="center">
          <?php
          while ($row2 = $res->fetch_array()){
            $idtrabajo          = $row2['idTrabajo'];
            $nomTrabajo          = $row2['NombreTrabajo'];
            ?>
            <td>
              <?php echo $idtrabajo; ?>
            </td>
            <td>
              <?php echo $nomTrabajo; ?>
            </td>
            <?php
          }


          $consulta2 = "SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
          $consulta2 = mysqli_query($conexion,$consulta2);
          $resultado2  = mysqli_fetch_array($consulta2);

          if($resultado2){
            $consulta2 = "SELECT CodigoDocente FROM asignaasesor WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
            $res1 = mysqli_query($conexion,$consulta2);
            while ($row3 = $res1->fetch_array()){
              $cdocente          = $row3['CodigoDocente'];
              ?>
              <td>
                <?php echo $cdocente; ?>
              </td>
              <?php
            }
          }else{
            $cdocente          = '----';
            ?>
              <td>
                <?php echo $cdocente; ?>
              </td>
            <?php
          }

          $consulta3 = "SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
          $consulta3 = mysqli_query($conexion,$consulta3);
          $resultado3  = mysqli_fetch_array($consulta3);

          if($resultado3){
            $consulta3 = "SELECT CodigoDocente FROM asignajurado WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
            $res2 = mysqli_query($conexion,$consulta3);
            while ($row4 = $res2->fetch_array()){
              $cjurado          = $row4['CodigoDocente'];
              ?>
              <td>
                <?php echo $cjurado; ?>
              </td>
              <?php
            }
          }else{
            $cjurado          = '----';
            ?>
              <td>
                <?php echo $cjurado; ?>
              </td>
            <?php
          }

          $consulta4 = "SELECT Mensaje FROM comentario WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
          $consulta4 = mysqli_query($conexion,$consulta4);
          $resultado4  = mysqli_fetch_array($consulta4);

          if($resultado4){
            $consulta4 = "SELECT Mensaje FROM comentario WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
            $res4 = mysqli_query($conexion,$consulta4);
            ?>
            <td>
            <table>
              <?php
              while ($row5 = $res4->fetch_array()){
                $men          = $row5['Mensaje'];
                ?>
                <tr align="center">
                  <td>
                    <?php echo $men; ?>
                    <br>__________________________________________________________
                  </td>
                </tr>

                <?php
              }
              ?>
            </table>
            </td>
            <?php
          }else{
            $men          = '----';
            ?>
              <td>
                <?php echo $men; ?>
              </td>
            <?php
          }

          $consulta5 = "SELECT Nota, Estado FROM calificacion WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
          $consulta5 = mysqli_query($conexion,$consulta5);
          $resultado5  = mysqli_fetch_array($consulta5);

          if($resultado5){
            $consulta5 = "SELECT Nota, Estado FROM calificacion WHERE idTrabajo = ( SELECT idTrabajo FROM trabajo WHERE CodigoEstudiante = '$_SESSION[codigoestudiante]' ) ";
            $res5 = mysqli_query($conexion,$consulta5);
            while ($row6 = $res5->fetch_array()){
              $nota1          = $row6['Nota'];
              $estado1          = $row6['Estado'];
              ?>
              <td>
                <?php echo $nota1; ?>
              </td>
              <td>
                <?php echo $estado1; ?>
              </td>
              <?php
            }
          }else{
            $nota1          = '----';
            $estado1          = '----';
            ?>
              <td>
                <?php echo $nota1; ?>
              </td>
              <td>
                <?php echo $estado1; ?>
              </td>
            <?php
          }




          ?>
        </tr>
        <?php



      }else{

        ?>
        <tr align="center">

          <td colspan="7">
            <b>NO HAY TRABAJO REGISTRADO</b>
          </td>
          
        </tr>


        <?php
      }

  }
?>
  
</table>

               
              </p> 
              <h4 id="scrollspyHeading44" align="center"><b><i>ACTUALIZAR TRABAJO</i></b></h4>
              <p> 
                


                <div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo archivo" method="POST" action="php/ModificarArchivo.php" enctype="multipart/form-data">
                        <div class="col-12">
                          <label for="validationDefault01" class="form-label">Nombre</label>
                          <input type="text" name="nombreproyecto" placeholder="Ingrese nombre del proyecto" class="form-control" id="validationDefault01" required>
                        </div>
                        <div class="col-md-12">
                        <label for="validationDefault05" class="form-label">Contraseña</label>
                        <input type="password" name="contraseña" autocomplete="new-password" placeholder="Ingrese su contraseña" class="form-control" id="validationDefault05" required>
                      </div>
                        <div class="col-12">
                          <label for="validationDefault01" class="form-label">Subir Proyecto</label>
                          
                          <input type="file" class="form-control" id="archivo" name="archivo" accept=".pdf">
                        </div>
                        <div class="col-12">
                          <button class="btn btn-success " type="submit" name="enviar">Modificar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                     <br>
                      <img src="img/reg.png" class="img-thumbnail " width="400">
                    </div>
                  </div>
                </div>



               
              </p> 
              
              <h4 id="scrollspyHeading6" align="center"><b><i>ELIMINAR TRABAJO</i></b> </h4>
              <p> 
                

                <div class="card-group" align="center">
                  <div class="card bg-transparent " style="width: 18rem;">
                    <div class="card-body">
                      <form class="row g-3" name="nuevo estudiante" method="POST" action="php/Eliminar.php">
                        
                        
                        
                        <br>
                        <div class="col-md-12">
                          <br>
                          <button class="btn btn-success " type="submit" name="enviar">Eliminar trabajo</button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="card  bg-transparent" style="width: 18rem;">
                    <div class="card-body">
                      
                      <img src="img/reg.png" class="img-thumbnail " width="130">
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
        docentes
      </div>
    </div>
  </body>
</html>