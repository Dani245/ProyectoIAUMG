<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
 		
		$nombrecur = $_POST["nombrecur"];		
		$requisitocur = $_POST["requisitocur"];		
		$creditoscur = $_POST["creditoscur"];		
		$semestrecur = $_POST["semestrecur"];		

		$query = mysqli_query($conn, "SELECT * FROM curso WHERE idsemestre='$semestrecur' ");
		$verificar=mysqli_num_rows($query);
		
		if($verificar<5)
        {
		

			$sql = "INSERT INTO curso (nombre, requisito, creditos, idsemestre)
			VALUES ('$nombrecur', '$requisitocur', '$creditoscur', '$semestrecur')";

		  	//preguntar si se insertó el dato
			if($conn->query($sql)===TRUE)
				{
					?><script language='javascript'> 
						$('#modalCursos').modal('hide') 
						limpiarModalNuevoCurso();
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
		}
		else
		{
			?><script language='javascript'> 
  					alert("Solo se pueden ingresar 5 cursos por semestre."); 
  					window.location='admin.php'; 
			</script> <?php 
		}	  
?>