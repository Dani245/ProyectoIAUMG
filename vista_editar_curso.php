<?php
  include 'conexion/conexion.php';
  
  $Id_Cursos = $_POST["Id_Cursos"];

  $sql = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '$Id_Cursos'");
  $row = mysqli_fetch_array($sql);

  $codigo = $row['idcurso'];
  $nombrecur = $row['nombre'];
  $requisitocur = $row['requisito'];
  $creditoscur = $row['creditos'];
  $idsemestrecur = $row['idsemestre'];
  
  $nombre_sem=mysqli_query($conn, "SELECT * FROM semestre");
  while($filasemestre=mysqli_fetch_array($nombre_sem))
  {
    if($idsemestrecur  == $filasemestre['idsemestre'])
    {
      $nombresemestrecur=$filasemestre['nombre'];
      $idcarrera=$filasemestre['idcarrera'];

      $nombre_carr=mysqli_query($conn, "SELECT * FROM carrera");
      while($filacarrera=mysqli_fetch_array($nombre_carr))
      {
        if($idcarrera  == $filacarrera['idcarrera'])
        {
          $nombrecarreracur=$filacarrera['nombre'];          
        }
      }
    }
  }

  

?>

<!--Vista Editar Negocio-->
<p><center>Por favor ingrese los datos solicitados para editar registro del Curso seleccionado.</center></p>
        <div class="col-md-12">
          <br>
          <label>Codigo</label>
          <input type="text" disabled="false" name="" id="codigo_act_cur" class="form-control input-sm" value="<?php echo $codigo; ?>">
        </div>

        <div class="form-group col-md-12">
          <label>Nombre de Curso</label>
          <input type="text" name="" id="nombrecur_act_cur" class="form-control input-sm" value="<?php echo $nombrecur; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Requisito</label>
          <input type="text" name="" id="requisito_act_cur" class="form-control input-sm" value="<?php echo $requisitocur; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Creditos</label>
          <input type="text" name="" id="creditos_act_cur" class="form-control input-sm" value="<?php echo $creditoscur; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Carrera</label>
          <select class="form-control" name="carreracur_act_cur" id="carrera_act_cur" required  onchange="CargarSemestreAct(this.value);">            
            <?php

            echo'<option value = "'.$idcarrera.'">'.$nombrecarreracur.'</option>';

            include 'conexion/conexion.php';
            $carrera = mysqli_query($conn, "SELECT * FROM carrera");
            while ($carrera_= mysqli_fetch_array($carrera)) 
            {
              echo'<option value = "'.$carrera_['idcarrera'].'">'.$carrera_['nombre'].'</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group col-md-6">
          <label>Semestre</label>
          <select class="form-control" name="semestrecur_act_cur" id="semestrecur_act_cur" required>
          <?php
            echo'<option value = "'.$idsemestrecur.'">'.$nombresemestrecur.'</option>';
          ?>
          </select>
        </div>

        
