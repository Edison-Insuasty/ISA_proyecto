<?php
  include("conexion.php");
  include("validarSesion.php");
  
  $consulta  = "SELECT idJurado
          FROM asignajurado
          ORDER BY idJurado DESC
          LIMIT 1";
  $consulta  = mysqli_query($conexion, $consulta);
  $consulta  = mysqli_fetch_array($consulta);
  $idJurado = $consulta['idJurado'];
  
  ++$idJurado;

  $codigodocente = $_POST["codigodocente"];
  $idtrabajo     = $_POST["idtrabajo"];

  $consultaId = "SELECT idTrabajo
           FROM asignajurado
           WHERE idTrabajo = '$idtrabajo' ";
  $consultaId = mysqli_query($conexion, $consultaId);
  $consultaId = mysqli_fetch_array($consultaId);

  
    if(!$consultaId){
      $sql = "INSERT INTO asignajurado VALUES ('$idJurado', '$codigodocente', '$idtrabajo')";


$consulta1 = " SELECT CodigoDocente FROM numerojurados WHERE CodigoDocente = '$codigodocente' ";
      $consulta1 = mysqli_query($conexion, $consulta1);
      $consulta1 = mysqli_fetch_array($consulta1);

      if ($consulta1){
        //modificar

        $consulta3 = " SELECT Cantidad FROM numerojurados WHERE CodigoDocente = '$codigodocente' ";
        $consulta3 = mysqli_query($conexion, $consulta3);
      $consulta3 = mysqli_fetch_array($consulta3);
      $can = $consulta3['Cantidad'];

      ++$can;

$sql3 = "UPDATE numerojurados SET Cantidad='$can' WHERE CodigoDocente = '$codigodocente' ";


if(mysqli_query($conexion, $sql3) ) {
      echo '<script language="javascript">alert("numeros de proyectos Modificadas.");window.location.href="../perfiladministrador.php"</script>';
    }else{
      echo "Error" . $sql3 . "<br>" . mysqli_error($conexion);
    }





      }else{


        //guardar
        $consulta2 = "SELECT idNumeroJ
          FROM numerojurados
          ORDER BY idNumeroJ DESC
          LIMIT 1";
  $consulta2  = mysqli_query($conexion, $consulta2);
  $consulta2  = mysqli_fetch_array($consulta2);
  $idNumeroJ = $consulta2['idNumeroJ'];
  
  ++$idNumeroJ;

  $cantidad=0;
  ++$cantidad;

  $sql2 = "INSERT INTO numerojurados VALUES ('$idNumeroJ', '$codigodocente', '$cantidad')";

  if( mysqli_query($conexion, $sql2) ){
        echo '<script language="javascript">alert("numeros de proyectos Modificadas.");window.location.href="../perfiladministrador.php"</script>';

  }else{
        echo "Error" . $sql2 . "<br>" . mysqli_error($conexion);
  }


      }





      if(mysqli_query($conexion, $sql) ) {
        echo '<script language="javascript">alert("Jurado asignado.");window.location.href="../perfiladministrador.php"</script>';
      }else{
        echo "Error" . $sql . "<br>" . mysqli_error($conexion);
      }
    }else{
      echo '<script language="javascript">alert("El trabajo ya tiene Jurado.");window.location.href="../perfiladministrador.php"</script>';
    }
  
  mysqli_close($conexion);
?>