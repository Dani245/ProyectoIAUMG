<script src="js/maestro.js"></script>

<?php
		include 'conexion/conexion.php';

		// process form
		
 		$idusuarios_act = $_POST["idusuarios_act"];
		$nombre_act = $_POST["nombre_act"];
		$apellido_act = $_POST["apellido_act"];
		$telefono_act = $_POST["telefono_act"];
		$pass_act = $_POST["pass_act"];
		$email_act = $_POST["email_act"];
		$direccion_act = $_POST["direccion_act"];
		$carnet_act = $_POST["carnet_act"];
		$titulo_act = $_POST["titulo_act"];
		$sexo_act = $_POST["sexo_act"];
		$idcarrera_act = $_POST["id_carrera_act"];
		$municipio_act = $_POST["municipio_act"];
		$idtipo_act = $_POST["tipo_usuario_act"];
        $creditos_act = $_POST["creditos_act"];

		$sql = mysqli_query($conn, "UPDATE usuarios SET nombre = '$nombre_act', apellido = '$apellido_act', telefono = '$telefono_act', pass = '$pass_act', email = '$email_act', direccion = '$direccion_act', sexo = '$sexo_act', titulo = '$titulo_act', carnet = '$carnet_act', creditos = '$creditos_act', idmunicipio = '$municipio_act', idtipousuario = '$idtipo_act', idcarrera = '$idcarrera_act' WHERE idusuarios = $idusuarios_act");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarUsuarios').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){	
						window.location='maestro.php';				
					},100);
		        </script> <?php 
          	} 
?>