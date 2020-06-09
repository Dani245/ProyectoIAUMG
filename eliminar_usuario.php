<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idusuario_eli = $_POST["idusuario_eli"];

	$sql = mysqli_query($conn, "DELETE FROM usuarios WHERE idusuarios = '$idusuario_eli'");
		  	
		  	//preguntar si se insertó el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarUsuario').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroUsuarios();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>