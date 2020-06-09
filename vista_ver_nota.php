<script src="js/validacion.js"></script>

<?php
	include 'conexion/conexion.php';
	
  $Id_Usuario = $_POST["Id_Usuario"];
  $Id_Curso = $_POST["Id_Curso"];

  $sql = mysqli_query($conn, "SELECT * FROM calificacion WHERE idusuarios = '$Id_Usuario' AND idcurso = '$Id_Curso'");
  $verificar=mysqli_num_rows($sql);
  if($verificar>0)
  {
    $row = mysqli_fetch_array($sql);

    $p1 = $row['p1'];
    $p2 = $row['p2'];
    $p3 = $row['p3'];
    $tareas = $row['tareas'];
    $proyecto = $row['proyecto'];
    $examen = $row['examen'];
    $total = $row['total'];
  }
  else
  {
    $p1 = "NNI";
    $p2 = "NNI";
    $p3 = "NNI";
    $tareas = "NNI";
    $proyecto = "NNI";
    $examen = "NNI";
    $total = "NNI";
  }

  $sqlcurso = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '$Id_Curso'");
  $curso = mysqli_fetch_array($sqlcurso);
  $nombrecurso = $curso['nombre'];
	
?>

<!--Vista Ver Nota-->
<h4><center>Ver Notas del Curso: <?php echo $nombrecurso ?></center></h4>        
        <div class="form-group col-md-4">
          <label>Parcial 1</label>
          <input disabled="false" type="text" name="" id="parcial1" class="form-control input-sm" value="<?php echo $p1; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Parcial 2</label>
          <input disabled="false" type="text" name="" id="parcial2" class="form-control input-sm" value="<?php echo $p2; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Parcial 3</label>
          <input disabled="false" type="text" name="" id="parcial3" class="form-control input-sm" value="<?php echo $p3; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Tareas</label>
          <input disabled="false" type="text" name="" id="tareas" class="form-control input-sm" value="<?php echo $tareas; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Proyecto Final</label>
          <input disabled="false" type="text" name="" id="proyecto" class="form-control input-sm" value="<?php echo $proyecto; ?>">
        </div>
        <div class="form-group col-md-4">
          <label>Examen Final</label>
          <input disabled="false" type="text" name="" id="examen" class="form-control input-sm" value="<?php echo $examen; ?>">
        </div>
        <div class="form-group col-md-12">
          <center>
          <label>Total</label>
          </center>
          <input disabled="false" type="text" style="text-align:center" name="" id="total" class="form-control input-sm" value="<?php echo $total; ?>">
          
        </div>

