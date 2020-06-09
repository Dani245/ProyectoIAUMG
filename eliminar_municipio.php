<script src="js/admin.js"></script>

<?php
	include 'conexion/conexion.php';

		// process form
	$idmunicipio_eli = $_POST["idmunicipio_eli"];

	$sql = mysqli_query($conn, "DELETE FROM municipio WHERE idmunicipio = '$idmunicipio_eli'");
		  	
		  	//preguntar si se elimino el dato
			if($sql==TRUE)
			{
				?><script language='javascript'> 
					$('#myModalEliminarMunicipio').modal('hide') 
					swal("El registro ha sido eliminado con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registromunicipio();
					},100);
					</script> <?php 
			}
		  	else 
		  	{
		  		echo "<br>Ha ocurrido un error al actualizar.<br>Por favor intente nuevamente";
          	} 

?>