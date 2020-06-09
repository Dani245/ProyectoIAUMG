<script src="js/admin.js"></script>


<?php
		include 'conexion/conexion.php';

		// process form
 		
		$nombremun_act_m = $_POST["nombremun_act_m"];		
		$codigo_act_m = $_POST["codigo_act_m"];
		
		
		
		$sql = mysqli_query($conn, "UPDATE municipio SET  nombre = '$nombremun_act_m' WHERE idmunicipio = '$codigo_act_m'");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarMunicipio').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registromunicipio();
					},100);
		        </script> <?php
		    

		    } 
          
?>