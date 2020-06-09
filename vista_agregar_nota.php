<script src="js/validacion.js"></script>

<?php
	include 'conexion/conexion.php';

	
  $Id_Usuario = $_POST["Id_Usuario"];
  $Id_Curso = $_POST["Id_Curso"];
  
?>

<!--Vista Editar Usuario-->
<p><center>Por favor ingrese las notas del Alumno seleccionado.</center></p>

        <div class="form-group col-md-12" >
          <label>Alumno</label>
          <select class="form-control" name="alumnonota" id="alumnonota" disabled="false">
            <?php            
              $usuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '".$Id_Usuario."'");
              while ($usuario_= mysqli_fetch_array($usuario)) 
              {
                echo'<option value = "'.$usuario_['idusuarios'].'">'.$usuario_['nombre'].' '.$usuario_['apellido'].'</option>';
              }
              ?>
          </select>
        </div>
        <div class="form-group col-md-12">
          <label>Curso</label>
          <select class="form-control" name="cursonota" id="cursonota" disabled="false">
            <?php            
              $curso = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '".$Id_Curso."'");
              while ($curso_= mysqli_fetch_array($curso)) 
              {
                echo'<option value = "'.$curso_['idcurso'].'">'.$curso_['nombre'].'</option>';
              }
              ?>
          </select>
        </div>
        
        <div class="form-group col-md-4">
          <label>Parcial 1</label>
          <input type="number" name="" id="parcial1" class="form-control input-sm" min="1" max="10" step="1" placeholder="10 Pts Máximo">
        </div>
        <div class="form-group col-md-4">
          <label>Parcial 2</label>
          <input type="number" name="" id="parcial2" class="form-control input-sm" min="1" max="10" step="1" placeholder="10 Pts Máximo">
        </div>
        <div class="form-group col-md-4">
          <label>Parcial 3</label>
          <input type="number" name="" id="parcial3" class="form-control input-sm" min="1" max="10" step="1" placeholder="10 Pts Máximo">
        </div>
        <div class="form-group col-md-4">
          <label>Tareas</label>
          <input type="number" name="" id="tareas" class="form-control input-sm" min="1" max="20" step="1" placeholder="20 Pts Máximo">
        </div>
        <div class="form-group col-md-4">
          <label>Proyecto Final</label>
          <input type="number" name="" id="proyecto" class="form-control input-sm" min="1" max="20" step="1" placeholder="20 Pts Máximo">
        </div>
        <div class="form-group col-md-4">
          <label>Examen Final</label>
          <input type="number" name="" id="examen" class="form-control input-sm" min="1" max="30" step="1" placeholder="30 Pts Máximo">
        </div>
