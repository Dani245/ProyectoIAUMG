<script src="js/admin.js"></script>


<?php
		include 'conexion/conexion.php';

		// process form
 		
		$nombrecur_act_cur = $_POST["nombrecur_act_cur"];
		$requisito_act_cur = $_POST["requisito_act_cur"];
		$creditos_act_cur = $_POST["creditos_act_cur"];
		$semestrecur_act_cur = $_POST["semestrecur_act_cur"];
		$codigo_act_cur = $_POST["codigo_act_cur"];
		
		$query = mysqli_query($conn, "SELECT * FROM curso WHERE idsemestre='$semestrecur_act_cur' ");
		$verificar=mysqli_num_rows($query);
		
		if($verificar<5)
        {
			$sql = mysqli_query($conn, "UPDATE curso SET  nombre = '$nombrecur_act_cur', requisito = '$requisito_act_cur', creditos='$creditos_act_cur', idsemestre='$semestrecur_act_cur' WHERE idcurso = '$codigo_act_cur'");

		  	//preguntar si se insertó el dato
			if($conn->query($sql) === TRUE)
			{
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
		  			$('#myModalEditarmodalCursos').modal('hide') 
					swal("El registro se actualizó con éxito!", "Da click en OK para continuar", "success");
					setTimeout(function(){
						obtener_registroCursos();
					},100);
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