<script src="js/admin.js"></script>

<?php
		include 'conexion/conexion.php';

		// process form
 		$codigo_act_carr = $_POST["codigo_act_carr"];
		$nombrecarr_act_carr = $_POST["nombrecarr_act_carr"];		
	

		$sql = mysqli_query($conn, "UPDATE carrera SET nombre = '$nombrecarr_act_carr'  WHERE idcarrera = '$codigo_act_carr'");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
 		  		echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarmodalCarrera').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroCarrera();
					},100);
		        </script> <?php
          	} 
?>