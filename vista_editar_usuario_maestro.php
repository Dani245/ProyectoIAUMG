<script src="js/validacion.js"></script>

<?php
	include 'conexion/conexion.php';
	
	$Id_Usuario = $_POST["Id_Usuario"];

	$sql = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '$Id_Usuario'");
	$row = mysqli_fetch_array($sql);

  $codigo = $row['idusuarios'];  
  $nombre = $row['nombre'];
	$apellido = $row['apellido'];
	$telefono = $row['telefono'];
	$pass = $row['pass'];
  $email = $row['email'];
  $direccion = $row['direccion'];    
  $carnet = $row['carnet']; 
  $sexo = $row['sexo']; 
  $titulo = $row['titulo']; 
  $creditos = $row['creditos']; 
  $idtipousuario = $row['idtipousuario'];    
  $idmunicipio = $row['idmunicipio'];
  $idcarrera = $row['idcarrera'];
?>

<!--Vista Editar Usuario-->
<p><center>Por favor ingrese los datos solicitados para editar registro del usuario seleccionado.</center></p>
        
        <div class="col-md-12">
          <br>
          <input type="hidden" disabled="false" name="" id="idusuarios_act" class="form-control input-sm" value="<?php echo $codigo; ?>">
        </div>
        <input type="hidden" disabled="false" name="" id="creditos_act" class="form-control input-sm" value="<?php echo $creditos; ?>">

        <input type="hidden" disabled="false" name="" id="carnet_act" class="form-control input-sm" value="<?php echo $carnet; ?>">
        
        
        <div class="form-group col-md-6">
          <label>Nombre</label>
          <input type="text" name="" id="nombre_act" class="form-control input-sm" value="<?php echo $nombre; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Apellido</label>
          <input type="text" name="" id="apellido_act" class="form-control input-sm" value="<?php echo $apellido; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Telefono</label>
          <input type="text" name="" id="telefono_act" class="validantelefonoact form-control input-sm" value="<?php echo $telefono; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Sexo</label>
          <input type="text" name="" id="sexo_act" class="form-control input-sm" value="<?php echo $sexo; ?>">
        </div>

        <div class="col-md-12">
          <label>Direccion</label>
          <input type="text" name="" id="direccion_act" class="form-control input-sm" value="<?php echo $direccion; ?>">
        </div>
          
        <div class="form-group col-md-6">
          <label>Email</label>
          <input type="email" disabled="false" name="" id="email_act" class="form-control input-sm" value="<?php echo $email; ?>">
        </div>
        <div class="form-group col-md-6">
          <label>Password</label>
          <input type="password" disabled="false" name="" id="pass_act" class="form-control input-sm" value="<?php echo $pass; ?>">
        </div>

        <div class="form-group col-md-12">
          <label>Titulo</label>
          <input type="text" name="" id="titulo_act" class="form-control input-sm" value="<?php echo $titulo; ?>">
        </div>
          
        <div class="form-group col-md-6">
          <label>Tipo de Usuario</label>
          <select class="form-control" disabled="false" name="tipo_usuario_act" id="tipo_usuario_act">
            <?php
              
              $usuarios = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '$codigo'");
                while ($usuarios_= mysqli_fetch_array($usuarios)) 
                {
                  $comparador_tipousuarios = mysqli_query($conn, "SELECT * FROM tipousuario WHERE idtipousuario = '$idtipousuario'");
                  $comparador = mysqli_fetch_array($comparador_tipousuarios);
                  $nombre_tipousuario = $comparador['nombre'];
                  $id_tipousuario = $comparador['idtipousuario'];
                  echo'<option value = "'.$id_tipousuario.'">'.$nombre_tipousuario.'</option>';
                      $tipo_usuario = mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre != '$nombre_tipousuario'");
                      while ($tipo_usuario_= mysqli_fetch_array($tipo_usuario)) 
                      {
                        echo'<option value = "'.$tipo_usuario_['idtipousuario'].'">'.$tipo_usuario_['nombre'].'</option>';
                      }
                }
            ?>
          </select>
        </div>
    
        <div class="form-group col-md-6">
          <label>Municipio</label>
          <select class="form-control" name="municipio_act" id="municipio_act">
            <?php              

               $usuariomun = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '$codigo'");
                while ($usuarios_= mysqli_fetch_array($usuariomun)) 
                {
                  $compararmunicipio = mysqli_query($conn, "SELECT * FROM municipio WHERE idmunicipio = '$idmunicipio'");
                  $compararmun = mysqli_fetch_array($compararmunicipio);
                  $nombre_muni = $compararmun['nombre'];
                  $id_muni = $compararmun['idmunicipio'];
                  echo'<option value = "'.$id_muni.'">'.$nombre_muni.'</option>';
                      $munic = mysqli_query($conn, "SELECT * FROM municipio WHERE nombre != '$nombre_muni'");
                      while ($mun= mysqli_fetch_array($munic)) 
                      {
                        echo'<option value = "'.$mun['idmunicipio'].'">'.$mun['nombre'].'</option>';
                      }
                }
            ?>
          </select>
        </div>

        <div class="form-group col-md-12">
          <label>Carrera</label>
          <select class="form-control" disabled="false" name="carrera_act" id="carrera_act">
            <?php              

               $usuariocar = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios = '$codigo'");
                while ($usuarios_= mysqli_fetch_array($usuariocar)) 
                {
                  $compararcarrera = mysqli_query($conn, "SELECT * FROM carrera WHERE idcarrera = '$idcarrera'");
                  $compararcarr = mysqli_fetch_array($compararcarrera);
                  $nombre_carr = $compararcarr['nombre'];
                  $id_carr = $compararcarr['idcarrera'];
                  echo'<option value = "'.$id_carr.'">'.$nombre_carr.'</option>';
                      $carrer = mysqli_query($conn, "SELECT * FROM carrera WHERE nombre != '$nombre_carr'");
                      while ($car= mysqli_fetch_array($carrer)) 
                      {
                        echo'<option value = "'.$car['idcarrera'].'">'.$car['nombre'].'</option>';
                      }
                }
            ?>
          </select>
        </div>

