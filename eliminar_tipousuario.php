<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idtipousuario_eli = $_POST["idtipousuario_eli"];

	$sql = mysqli_query($conn, "DELETE FROM tipousuario WHERE idtipousuario = '$idtipousuario_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarmodalTipoUsuario').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroTipUs();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>