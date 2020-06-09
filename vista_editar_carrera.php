<?php
  include 'conexion/conexion.php';
  
  $Id_Carrera = $_POST["Id_Carrera"];

  $sql = mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera = '$Id_Carrera'");
  $row = mysqli_fetch_array($sql);

  $codigo = $row['idcarrera'];
  $nombrecarr = $row['nombre'];  
  
  

?>

<!--Vista Editar Negocio-->
<p><center>Por favor ingrese los datos solicitados para editar registro de la Carrera seleccionado.</center></p>
        <div class="col-md-12">
          <br>
          <label>Codigo</label>
          <input type="text" disabled="false" name="" id="codigo_act_carr" class="form-control input-sm" value="<?php echo $codigo; ?>">
        </div>

        <div class="form-group col-md-12">
          <label>Nombre de la Carrera</label>
          <input type="text" name="" id="nombrecarr_act_carr" class="form-control input-sm" value="<?php echo $nombrecarr; ?>">
        </div>

        
