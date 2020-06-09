<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
 		
		$maestrocur = $_POST["maestrocur"];		
		$cursomaes = $_POST["cursomaes"];		
		
		$consultatipo = mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Maestro' ");
		while($filatipo=mysqli_fetch_array($consultatipo))
		{
			$consultausuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios='".$maestrocur."' AND idtipousuario='".$filatipo['idtipousuario']."' ");
			while($filausuario=mysqli_fetch_array($consultausuario))
			{
				$query1 = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idcurso='$cursomaes' AND idusuarios!='$maestrocur' ");
				$verificar1=mysqli_num_rows($query1);
			}		
		}					

		if($verificar1>0)
        {
			?><script language='javascript'> 
  					alert("Este curso ya lo tiene asignado otro maestro, por favor asigne otro curso."); 
  					window.location='admin.php'; 
			</script> <?php 
		}
		else{		
			
			$consultatipo = mysqli_query($conn, "SELECT * FROM tipousuario WHERE nombre='Maestro' ");
			while($filatipo=mysqli_fetch_array($consultatipo))
			{
				$consultausuario = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios='".$maestrocur."' AND idtipousuario='".$filatipo['idtipousuario']."' ");
				while($filausuario=mysqli_fetch_array($consultausuario))
				{
					$query2 = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idcurso='$cursomaes' AND idusuarios='$maestrocur' ");
					$verificar2=mysqli_num_rows($query2);
				}		
			}
			
			if($verificar2>0)
        	{
				?><script language='javascript'> 
  					alert("El maestro ya tiene asignado este curso, por favor asigne otro curso."); 
  					window.location='admin.php'; 
				</script> <?php
			}
			else
			{

				$query3 = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idusuarios='$maestrocur' ");
				$verificar3=mysqli_num_rows($query3);
				
				if($verificar3<4)
				{
					

					$sql = "INSERT INTO asignacion_usuario (idcurso, idusuarios)
					VALUES ('$cursomaes', '$maestrocur')";

					//preguntar si se insertó el dato
					if($conn->query($sql)===TRUE)
						{
							?><script language='javascript'> 
								$('#modalCursoMaestro').modal('hide') 						
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
							alert("Un maestro solo se puede asignar a 4 cursos."); 
							window.location='admin.php'; 
					</script> <?php 
				}	  
			}
		}
?>