<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idsemestre_eli = $_POST["idsemestre_eli"];

	$sql = mysqli_query($conn, "DELETE FROM semestre WHERE idsemestre = '$idsemestre_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarmodalSemestre').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroSemestre();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>