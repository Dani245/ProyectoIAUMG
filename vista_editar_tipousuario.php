<?php
  include 'conexion/conexion.php';


  $Id_TipoUsuario = $_POST["Id_TipoUsuario"];

  $sql = mysqli_query($conn, "SELECT * FROM tipousuario WHERE idtipousuario = '$Id_TipoUsuario'");
  $row = mysqli_fetch_array($sql);

  $codigo = $row['idtipousuario'];
  $nombreper = $row['nombre'];
  $descripcionper = $row['descripcion'];
  
  

?>

<!--Vista Editar Negocio-->
<p><center>Por favor ingrese los datos solicitados para editar registro del Rol seleccionado.</center></p>
        <div class="col-md-12">
          <br>
          <label>Codigo</label>
          <input type="text" disabled="false" name="" id="codigo_act_tipus" class="form-control input-sm" value="<?php echo $codigo; ?>">
        </div>

        <div class="form-group col-md-12">
          <label>Nombre del Rol</label>
          <input type="text" name="" id="nombreper_act_tipus" class="form-control input-sm" value="<?php echo $nombreper; ?>">
        </div>
        <div class="form-group col-md-12">
          <label>Descripcion del Rol</label>
          <input type="text" name="" id="descripcionper_act_tipus" class="form-control input-sm" value="<?php echo $descripcionper; ?>">
        </div>

        
