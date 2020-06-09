<script src="js/maestro.js"></script>
<script src="js/datos2.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
		$alumnonota = $_POST["alumnonota"];		
		$cursonota = $_POST["cursonota"];		
		$parcial1 = $_POST["parcial1"];		
		$parcial2 = $_POST["parcial2"];		
		$parcial3 = $_POST["parcial3"];		
		$tareas = $_POST["tareas"];		
		$proyecto = $_POST["proyecto"];		
		$examen = $_POST["examen"];		
		$total = $parcial1+$parcial2+$parcial3+$tareas+$proyecto+$examen;
				

			$sql = "INSERT INTO calificacion (p1, p2, p3, tareas, proyecto, examen, total, idusuarios, idcurso)
			VALUES ('$parcial1', '$parcial2', '$parcial3', '$tareas', '$proyecto', '$examen', '$total', '$alumnonota', '$cursonota')";

		  	//preguntar si se insertó el dato
			if($conn->query($sql)===TRUE)
			{

					if($total>60){
						$nombre_cur=mysqli_query($conn, "SELECT * FROM curso WHERE idcurso='".$cursonota."'");
        				while($filacurso=mysqli_fetch_array($nombre_cur))
    					{
							$creditos = $filacurso['creditos'];
							$nombre_usu=mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios='".$alumnonota."'");
        					while($filausuario=mysqli_fetch_array($nombre_usu))
    						{
								$creditos_usuario = $filausuario['creditos'];
								if($creditos_usuario == ""){
									$creditos_usuario = 0;									
								}

								$creditos_usuario = $creditos_usuario + $creditos;

								$sql = mysqli_query($conn, "UPDATE usuarios SET creditos = '$creditos_usuario'WHERE idusuarios = $alumnonota");

		  						//preguntar si se insertó el dato
								if($conn->query($sql) === TRUE)
								{
									echo "Error: " . $sql . "<br>" . $conn->error;
								}
		  						else 
		  						{
									?><script language='javascript'> 
									$('#myModalAgregarNota').modal('hide') 						
									swal("El registro ha sido guardado con éxito!", "Da click en OK para continuar", "success");
								</script><?php 
          						} 
							}							
						}

					}					 
			}
		  	else 
		  	{
		  		?><script language='javascript'> 
  					alert("Ocurrió un error. Por favor intente de nuevo."); 
  					window.location='maestro.php'; 
				</script> <?php 
          	}
?>