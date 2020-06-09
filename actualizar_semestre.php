<script src="js/admin.js"></script>


<?php
		include 'conexion/conexion.php';

		// process form
 		
		$nombresem_act_sem = $_POST["nombresem_act_sem"];
		$carrera_act_sem = $_POST["carrera_act_sem"];
		$codigo_act_sem = $_POST["codigo_act_sem"];
		
		
		
		$sql = mysqli_query($conn, "UPDATE semestre SET  nombre = '$nombresem_act_sem', idcarrera = '$carrera_act_sem' WHERE idsemestre = '$codigo_act_sem'");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarmodalSemestre').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroSemestre();
					},100);
		        </script> <?php
		    

		    } 
          
?>