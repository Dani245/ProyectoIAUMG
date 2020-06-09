<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idasignacion_eli = $_POST["idasignacion_eli"];

	$sql = mysqli_query($conn, "DELETE FROM asignacion_usuario WHERE idasignacion_usuario = '$idasignacion_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarmodalCursoMaestro').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroCursoMaestro();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>