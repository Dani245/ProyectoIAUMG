<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
 		
		$nombresem = $_POST["nombresem"];		
		$carrera = $_POST["carrera"];		
		

			$sql = "INSERT INTO semestre (nombre, idcarrera)
			VALUES ('$nombresem', '$carrera')";

		  	//preguntar si se insertó el dato
			if($conn->query($sql)===TRUE)
				{
					?><script language='javascript'> 
						$('#modalSemestre').modal('hide') 
						limpiarModalNuevoSemestre();
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