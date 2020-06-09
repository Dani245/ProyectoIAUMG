<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form 		
		$password = $_POST["pass"]; 

		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$telefono = $_POST["telefono"];
		$sexo = $_POST["sexo"];
		$titulo = $_POST["titulo"];
		$carnet = $_POST["carnet"];		
		$pass = password_hash($password, PASSWORD_DEFAULT);;
		$email = $_POST["email"];
		$direccion = $_POST["direccion"];
		$municipio = $_POST["municipio"];
		$idtipo = $_POST["tipo_usuario"];
        $idcarrera = $_POST["id_carrera"];

			$sql = "INSERT INTO usuarios (nombre, apellido, sexo, direccion, carnet, titulo, creditos, telefono, email, pass, idtipousuario, idcarrera, idmunicipio)
			VALUES ('$nombre', '$apellido', '$sexo', '$direccion', '$carnet', '$titulo', '', '$telefono','$email', '$pass', '$idtipo', '$idcarrera', '$municipio')";

		  	//preguntar si se insertó el dato
			if($conn->query($sql)===TRUE)
				{
					?><script language='javascript'> 
						$('#modalUsuario').modal('hide') 
						limpiarModalNuevoUsuario();
						swal("El registro ha sido guardado con éxito!", "Da click en OK para continuar", "success");
					</script><?php 
				}
		  	else 
		  	{
		  		?><script language='javascript'> 
  					alert("Ocurrió un error. Por favor intente de nuevo."); 
  					window.location='admin.php'; 
				</script> <?php 
          	}
?>
