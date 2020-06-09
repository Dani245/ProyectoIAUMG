<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idcarrera_eli = $_POST["idcarrera_eli"];

	$sql = mysqli_query($conn, "DELETE FROM carrera WHERE idcarrera = '$idcarrera_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarmodalCarrera').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroCarrera();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>