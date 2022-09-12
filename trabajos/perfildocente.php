<?php
  $inc = include("php/Conexion.php");
  include("php/validarSesion.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perfil Docente</title>
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
      
      <li class="nav-item">
        <a class="nav-link text-white bg-transparent" href="php/CerrarSesion.php">Cerrar Sesion</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10" style="background-color: #F0F2EE;">
            <br>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example p-3 rounded-2" tabindex="0">
              <h4 id="scrollspyHeading1" align="center"><b><i>PERFIL</i></b></h4>
              <p>
                <div class="card mb-3" style="background-color: #DADED6;">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="img/docente.jpg" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body" align="justify">
                        <h5 class="card-title" align="center">
                          <?php 
                            if($inc){

                              $con = "SELECT Nombres, Apellidos FROM Persona WHERE Cedula = (SELECT Cedula FROM docente WHERE CodigoDocente = '$_SESSION[codigodocente]') ";
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
                          Como Docente tiene la responsabilidad de brindar su acompañamiento para los estudiantes que usted fue asignado en asesorías, siendo de gran apoyo para estos estudiantes, igualmente sirviendo como jurado para los estudiantes que usted debe calificar, teniendo en cuenta todos los criterios de aceptación de los trabajos  de grado realizados por los estudiantes. 
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

                            $consulta = "SELECT * FROM docente WHERE CodigoDocente = '$_SESSION[codigodocente]' ";
                            $resultado = mysqli_query($conexion,$consulta);
                            $consulta1 = "SELECT * FROM persona WHERE Cedula = (SELECT Cedula FROM docente WHERE CodigoDocente = '$_SESSION[codigodocente]') ";
                            $resultado1 = mysqli_query($conexion,$consulta1);

                            if($resultado && $resultado1){
                              while ($row = $resultado->fetch_array()) {
                                $cdocente = $row['CodigoDocente'];
                                $cedula         = $row['Cedula'];
                                $especializacion     = $row['Especializacion'];
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
                                        <?php echo $cdocente; ?>
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
                                        <?php echo $especializacion; ?>
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
                        <form class="row g-3" name="modificar docente" method="POST" action="php/ModificarDocente.php">
                          
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
                            <label for="validationDefault05" class="form-label">Especialización</label>
                            <input type="text" name="especializacion" placeholder="Ingrese especializacion" class="form-control border-dark" id="validationDefault05" required>
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
              <div class="card  bg-transparent border-white" style="width: 18rem;">
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
        
       <br>
        <div class="row h-100 justify-content-center align-items-center">
          <div class="card col-10 " style="background-color: #F0F2EE;">
            <br>
            <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
              
               
              <h4 id="scrollspyHeading44" align="center"><b><i>COMENTAR/CALIFICAR</i></b></h4>
              <p> 
                

                <div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingOne">
      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Asesor
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
       

     
     <table class="table">
        <tr align="center">
          <td>
            <b>ID</b> 
          </td>
          <td>
            <b>COD_ESTUDIANTE</b>
          </td>
          <td>
            <b>NOMBRE</b>
          </td>
          <td>
            <b>DESCARGAR</b>
          </td>
          <td>
            <b>COMENTAR</b>
          </td>
        </tr>
        <tbody class="table-group-divider">


<?php

//$d = $_SESSION[codigodocente];
$d = " SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$_SESSION[codigodocente]' ";
 $d  = mysqli_query($conexion, $d);
          $d  = mysqli_fetch_array($d);
          $a = $d['CodigoDocente'];

          if($inc){

            //toca hacer que recorra fila por fila

            

            $consulta  = "SELECT idAsesor
          FROM asignaasesor
          ORDER BY idAsesor DESC
          LIMIT 1";
          $consulta  = mysqli_query($conexion, $consulta);
          $consulta  = mysqli_fetch_array($consulta);
          $idAsesor = $consulta['idAsesor'];

         // $cdoc = $_SESSION[codigodocente];
          
         // ++$idTrabajo;

            while($idAsesor>0){
              $consulta8  = "SELECT idTrabajo
          FROM trabajo
          ORDER BY idTrabajo DESC
          LIMIT 1";
          $consulta8  = mysqli_query($conexion, $consulta8);
          $consulta8  = mysqli_fetch_array($consulta8);
          $idTrabajo = $consulta8['idTrabajo'];


          while ($idTrabajo>0) {




$consulta1 = "SELECT * FROM trabajo WHERE idTrabajo = '$idTrabajo' ";
$consulta1 = mysqli_query($conexion,$consulta1);
$consulta1  = mysqli_fetch_array($consulta1);

$consulta7 = " SELECT * FROM asignaasesor WHERE idAsesor = '$idAsesor' ";
$consulta7 = mysqli_query($conexion,$consulta7);
$consulta7  = mysqli_fetch_array($consulta7);

//$d = $_SESSION[codigodocente];

if($consulta1['idTrabajo']==$consulta7['idTrabajo'] && $consulta7['CodigoDocente']==$a){

  $idtrabajo = $consulta1['idTrabajo'];
  $codigoestudiante         = $consulta1['CodigoEstudiante'];
  $nombretrabajo     = $consulta1['NombreTrabajo'];
  //$ubicacion          = $row['Ubicacion'];


   ?>

                
                  <tr align="center" valign="middle">
                    <td>
                      <?php echo $idtrabajo; ?>
                    </td>
                    <td>
                      <?php echo $codigoestudiante; ?>
                    </td>
                    <td>
                      <?php echo $nombretrabajo; ?>
                    </td>
                    <td>
                    
                      <a class="btn btn-primary" href="#" role="button">Descargar</a>


                    </td>
                    <td>

                      
  <form class="row g-3" name="comentar" method="POST" action="php/Comentar.php">
    <table class="table">
      <tr align="center">
        <td>
          ID
        </td>
        <td rowspan="2" valign="bottom">
          <input type="text" name="comentar" placeholder="cometario" class="form-control" id="validationDefault05" required>
        </td>
        
      </tr>

      <tr align="center">
        <td>
          <input type="text" name="idtrabajo1" placeholder=" <?php echo $idtrabajo; ?> " class="form-control" id="validationDefault05" value=" <?php echo $idtrabajo; ?> " >
        </td>
      </tr>
      <tbody class="table-group-divider">
      <tr align="center">
        <td colspan="2">
          <button class="btn btn-success border-dark" type="submit" name="enviar">Enviar</button>
        </td>
      </tr>
    </table>
  </form>
  

                      

                       

                    </td>
                  </tr>
                

                <?php







}

--$idTrabajo;

            






            
          } // aqui termina el segundo while


          --$idAsesor;    

            } //aqui cierra el primer while







            
          }

        ?>



      </table>


        


        
      </div>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="flush-headingTwo">
      <button class="accordion-button collapsed bg-secondary text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
        Jurado
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
       

       
        <table class="table">
        <tr align="center">
          <td>
            <b>ID</b> 
          </td>
          <td>
            <b>COD_ESTUDIANTE</b>
          </td>
          <td>
            <b>NOMBRE</b>
          </td>
          <td>
            <b>DESCARGAR</b>
          </td>
          <td>
            <b>CALIFICAR</b>
          </td>
        </tr>
        <tbody class="table-group-divider">


<?php

//$d = $_SESSION[codigodocente];
$d = " SELECT CodigoDocente FROM docente WHERE CodigoDocente = '$_SESSION[codigodocente]' ";
 $d  = mysqli_query($conexion, $d);
          $d  = mysqli_fetch_array($d);
          $a = $d['CodigoDocente'];

          if($inc){

            //toca hacer que recorra fila por fila

            

            $consulta  = "SELECT idJurado
          FROM asignajurado
          ORDER BY idJurado DESC
          LIMIT 1";
          $consulta  = mysqli_query($conexion, $consulta);
          $consulta  = mysqli_fetch_array($consulta);
          $idJurado = $consulta['idJurado'];

         // $cdoc = $_SESSION[codigodocente];
          
         // ++$idTrabajo;

            while($idJurado>0){
              $consulta8  = "SELECT idTrabajo
          FROM trabajo
          ORDER BY idTrabajo DESC
          LIMIT 1";
          $consulta8  = mysqli_query($conexion, $consulta8);
          $consulta8  = mysqli_fetch_array($consulta8);
          $idTrabajo = $consulta8['idTrabajo'];


          while ($idTrabajo>0) {




$consulta1 = "SELECT * FROM trabajo WHERE idTrabajo = '$idTrabajo' ";
$consulta1 = mysqli_query($conexion,$consulta1);
$consulta1  = mysqli_fetch_array($consulta1);

$consulta7 = " SELECT * FROM asignajurado WHERE idJurado = '$idJurado' ";
$consulta7 = mysqli_query($conexion,$consulta7);
$consulta7  = mysqli_fetch_array($consulta7);

//$d = $_SESSION[codigodocente];

if($consulta1['idTrabajo']==$consulta7['idTrabajo'] && $consulta7['CodigoDocente']==$a){

  $idtrabajo = $consulta1['idTrabajo'];
  $codigoestudiante         = $consulta1['CodigoEstudiante'];
  $nombretrabajo     = $consulta1['NombreTrabajo'];
  //$ubicacion          = $row['Ubicacion'];


   ?>

                
                  <tr align="center" valign="middle">
                    <td>
                      <?php echo $idtrabajo; ?>
                    </td>
                    <td>
                      <?php echo $codigoestudiante; ?>
                    </td>
                    <td>
                      <?php echo $nombretrabajo; ?>
                    </td>
                    <td>
                    
                      <a class="btn btn-primary" href="#" role="button">Descargar</a>


                    </td>
                    <td>

                      
  <form class="row g-3" name="comentar" method="POST" action="php/Calificar.php">
    <table class="table">
      <tr align="center">
        <td>
          ID
        </td>
        <td rowspan="2" valign="bottom">
          <input type="number" name="nota" placeholder="Nota" class="form-control" id="validationDefault05" min="0" max="50" required>
        </td>
        
        
      </tr>

      <tr align="center">
        <td>
          <input type="text" name="idtrabajo2" placeholder=" <?php echo $idtrabajo; ?> " class="form-control" id="validationDefault05" value=" <?php echo $idtrabajo; ?> " >
        </td>
      </tr>
      <tbody class="table-group-divider">
      <tr align="center">
        <td colspan="3">
          <button class="btn btn-success border-dark" type="submit" name="enviar">Enviar</button>
        </td>
      </tr>
    </table>
  </form>
  

                      

                       

                    </td>
                  </tr>
                

                <?php







}

--$idTrabajo;

            






            
          } // aqui termina el segundo while


          --$idJurado;    

            } //aqui cierra el primer while







            
          }

        ?>



      </table>



        
      </div>
    </div>
  </div>
</div>

              </p>
              <h4 id="scrollspyHeading5" align="center"><b><i>CONTACTOS</i></b></h4>
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
     
    </div>
  </body>
</html>