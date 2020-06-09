<?php
	include 'conexion/conexion.php';
	
	$Id_Municipio = $_POST["Id_Municipio"];


	$sql = mysqli_query($conn, "SELECT * FROM municipio WHERE idmunicipio = '$Id_Municipio'");
	$row = mysqli_fetch_array($sql);

  $id = $row['idmunicipio'];
  $nombremun = $row['nombre'];  
  
  
?>

<!--Vista Editar Municipio-->
<p><center>Por favor ingrese los datos solicitados para editar registro del Municipio seleccionado.</center></p>
        
        <div class="col-md-12">
          <br>
          <input type="hidden" disabled="false" name="codigo_act_m" id="codigo_act_m" class="form-control input-sm" value="<?php echo $id; ?>">
        </div>

        <div class="form-group col-md-4">
          <label>Nombre Municipio</label>
          <input type="text" name="" id="nombremun_act_m" class="form-control input-sm" value="<?php echo $nombremun; ?>">
        </div>
             
