<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idcurso_eli = $_POST["idcurso_eli"];

	$sql = mysqli_query($conn, "DELETE FROM curso WHERE idcurso = '$idcurso_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarmodalCursos').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroCursos();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>