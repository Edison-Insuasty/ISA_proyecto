<?php
$inc = include("php/Conexion.php");
include("php/validarSesion.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modificar Estudiante</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<br>
	<div class="row h-100 justify-content-center align-items-center">
    <div class="card col-10 " style="background-color: #F0F2EE;">
      <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-transparent p-3 rounded-2" tabindex="0">
       <?php
       $cod = $_POST["codigo"];
       $con = "SELECT Cedula, Programa FROM estudiante WHERE CodigoEstudiante = '$cod' ";
       $con = mysqli_query($conexion,$con);
       if($con){
         while ($row1 = $con->fetch_array()){
          $ced = $row1['Cedula'];
          $pro = $row1['Programa'];
          $con1 = "SELECT * FROM persona WHERE Cedula = '$ced' ";
          $con1 = mysqli_query($conexion,$con1);
          while ($row2 = $con1->fetch_array()){
           $ced1 = $row2['Cedula'];
           $nom = $row2['Nombres'];
           $ape = $row2['Apellidos'];
           $cor = $row2['Correo'];
           $tel = $row2['Telefono'];
           $dir = $row2['Direccion'];
           $ciu = $row2['Ciudad'];
         }
       }
       $con2 = "SELECT CodigoEstudiante FROM estudiante WHERE CodigoEstudiante = '$cod' ";
       $con2 = mysqli_query($conexion,$con2);
       $con2 = mysqli_fetch_array($con2);
       if($con2){
        ?>
        <form class="row g-3" name="modificar estudiante" method="POST" action="php/ModificarEstudianteAdmin.php">

          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                Codigo:
              </td>
              <td>
                <input type="text" name="codigo" placeholder="Codigo" class="form-control" value="<?php echo $cod ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Cedula:
              </td>
              <td>
                <input type="text" name="cedula" placeholder="Cedula" class="form-control" value="<?php echo $ced1 ?>" id="validationDefault01" readonly required >
              </td>
              <td>
                Nombres:
              </td>
              <td>
                <input type="text" name="nombre" placeholder="Nombres" class="form-control" value="<?php echo $nom ?>" id="validationDefault01"  required >
              </td>
              <td>
                Apellidos:
              </td>
              <td>
                <input type="text" name="apellidos" placeholder="Apellidos" class="form-control" value="<?php echo $ape ?>" id="validationDefault02"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Correo:
              </td>
              <td>
                <div class="input-group">
                  <span class="input-group-text" id="inputGroupPrepend2">@</span>
                  <input type="email" name="correo" placeholder="Email" class="form-control" value="<?php echo $cor ?>" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                </div>
              </td>
              <td>
                Telefono:
              </td>
              <td>
                <input type="phone" name="telefono" placeholder="Telefono" class="form-control" value="<?php echo $tel ?>" id="validationDefault05"  required>
              </td>
              <td>
                Direccion:
              </td>
              <td>
                <input type="text" name="direccion" placeholder="Direccion" class="form-control" value="<?php echo $dir ?>" id="validationDefault05"  required>
              </td>
              <td>
                Ciudad:
              </td>
              <td>
                <input type="text" name="ciudad" placeholder="Ciudad" class="form-control" value="<?php echo $ciu ?>" id="validationDefault05"  required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                Programa:
              </td>
              <td>
                <input type="text" name="programa" placeholder="Programa" class="form-control" value="<?php echo $pro ?>" id="validationDefault05" required>
              </td>
              <td>
                Contraseña:
              </td>
              <td>
                <input type="password" name="contraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
              </td>
              <td colspan="2">
                Repite Contraseña:
              </td>
              <td colspan="2">
                <input type="password" name="repitecontraseña" autocomplete="new-password" placeholder="Contraseña" class="form-control" id="validationDefault05" required>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td colspan="8">
                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
              </td>
            </tr>
          </table>
        </form>
        <?php
      }else{
        ?>
        <form class="row g-3" name="volver" action="perfiladministrador.php">
          <table class="table table-success table-striped">
            <tr align="center" valign="middle">
              <td>
                <div class="alert alert-danger border-dark text-black" role="alert">
                  CODIGO INCORRECTO
                </div>
              </td>
            </tr>
            <tr align="center" valign="middle">
              <td>
                <button class="btn btn-success border-dark" type="submit" name="enviar">Aceptar</button>
              </td>
            </tr>
          </table>
        </form>
        <?php
      }
    }
    ?>
  </div>
</div>
</div>
</body>
</html>