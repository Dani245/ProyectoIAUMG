<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
		$nombreper = $_POST["nombreper"];
		$descripcionper = $_POST["descripcionper"];
		
		
		

			$sql = "INSERT INTO tipousuario (nombre, descripcion)
			VALUES ('$nombreper', '$descripcionper')";

		  	//preguntar si se insertó el dato
			if($conn->query($sql)===TRUE)
				{
					?><script language='javascript'> 
						$('#modalTipUs').modal('hide') 
						limpiarModalNuevoTipUs();
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