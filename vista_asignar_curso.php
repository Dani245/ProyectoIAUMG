<?php
  include 'conexion/conexion.php';
  
  $Id_Cursos = $_POST["Id_Curso"];

  $sql1 = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso = '$Id_Cursos'");
  $row1 = mysqli_fetch_array($sql1);

  $sql2=mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_SESSION['emailAlumno']."'");
  $row2=mysqli_fetch_array($sql2);

  $idcurso = $row1['idcurso'];
  $nombrecurso = $row1['nombre'];
  
  $idusuarios = $row2['idusuarios'];
  $nombreusuario = $row2['nombre'];
  $apellidousuario = $row2['apellido'];

  

?>

<!--Vista Editar Negocio-->
<p><center>Por favor ingrese los datos solicitados para editar registro del Curso seleccionado.</center></p>
      <div class="form-group mx-sm-6">                    
        <select class="form-control" name="alumno_asig" id="alumno_asig" required disabled="false">                      
          <?php                                                 
            echo'<option value = "'.$idusuarios.'">'.$nombreusuario.' '.$apellidousuario.'</option>';                                                      
          ?>
        </select>
      </div>
      <div class="form-group mx-sm-6">                    
        <select class="form-control" name="curso_asig" id="curso_asig" required disabled="false">                      
          <?php                                                 
            echo'<option value = "'.$idcurso.'">'.$nombrecurso.'</option>';                                                      
          ?>
        </select>
      </div>