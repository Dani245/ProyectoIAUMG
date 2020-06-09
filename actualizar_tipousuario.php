<script src="js/admin.js"></script>

<?php
		include 'conexion/conexion.php';

		// process form
 		$codigo_act_tipus = $_POST["codigo_act_tipus"];
		$nombreper_act_tipus = $_POST["nombreper_act_tipus"];
		$descripcionper_act_tipus = $_POST["descripcionper_act_tipus"];
	

		$sql = mysqli_query($conn, "UPDATE tipousuario SET nombre = '$nombreper_act_tipus', descripcion = '$descripcionper_act_tipus'  WHERE idtipousuario = '$codigo_act_tipus'");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
 		  		echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarmodalTipoUsuario').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroTipUs();
					},100);
		        </script> <?php
          	} 
?>