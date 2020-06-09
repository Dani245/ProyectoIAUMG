

<?php
	include 'conexion/conexion.php';
	
	$Id_Semestre = $_POST["Id_Semestre"];


	$sql = mysqli_query($conn, "SELECT * FROM semestre WHERE idsemestre = '$Id_Semestre'");
	$row = mysqli_fetch_array($sql);

  $id = $row['idsemestre'];
  $nombresem = $row['nombre'];
  $codigo = $row['idcarrera'];
  
  
?>

<!--Vista Editar Municipio-->
<p><center>Por favor ingrese los datos solicitados para editar registro del Semestre seleccionado.</center></p>
        
        <div class="col-md-12">
          <br>
          <input type="hidden" disabled="false" name="codigo_act_sem" id="codigo_act_sem" class="form-control input-sm" value="<?php echo $id; ?>">
        </div>

        <div class="form-group col-md-4">
          <label>Nombre Semestre</label>
          <input type="text" name="" id="nombresem_act_sem" class="form-control input-sm" value="<?php echo $nombresem; ?>">
        </div>
     
        <div class="form-group col-md-6">
          <label>Nombre Carrera</label>
          <select class="form-control" name="carrera_act_sem" id="carrera_act_sem">
            <?php
              include 'conexion/conexion.php';
            $semestre = mysqli_query($conn, "SELECT * FROM semestre WHERE idsemestre = '$Id_Semestre'");
                while ($semestre_= mysqli_fetch_array($semestre)) 
                {
                  $comparador_carr = mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera = '$codigo'");
                  $comparador_carr_ = mysqli_fetch_array($comparador_carr);
                  $nombre_carr = $comparador_carr_['nombre'];
                  $id_carrera = $comparador_carr_['idcarrera'];
                  echo'<option value = "'.$id_carrera.'">'.$nombre_carr.'</option>';

                      $codigo = mysqli_query($conn, "SELECT * FROM carrera WHERE nombre != '$nombre_carr'");
                      while ($codigo_= mysqli_fetch_array($codigo)) 
                      {
                        echo'<option value = "'.$codigo_['idcarrera'].'">'.$codigo_['nombre'].'</option>';
                      }
                }

            ?>
          </select>
        </div>
