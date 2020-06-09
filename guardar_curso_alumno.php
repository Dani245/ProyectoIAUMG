<script src="js/admin.js"></script>
<script src="js/datos.js"></script>

<?php

 include 'conexion/conexion.php';

		// process form
 		
		$alumnocur = $_POST["alumnocur"];		
		$cursoal = $_POST["cursoal"];		
		
		$query1 = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idusuarios='$alumnocur' AND idcurso='$cursoal'");
		$verificar1=mysqli_num_rows($query1);

		if($verificar1>0)
		{
			?><script language='javascript'> 
  					alert("Este curso ya lo tiene asignado el alumno por favor asigne otro curso."); 
  					window.location='admin.php'; 
			</script> <?php 
		}
		else{

			$consultacurso = mysqli_query($conn, "SELECT * FROM curso WHERE idcurso='$cursoal' ");
			while($filacurso=mysqli_fetch_array($consultacurso))
			{
				$requisitocurso=$filacurso['requisito'];
			}

			$consultaalumno = mysqli_query($conn, "SELECT * FROM usuarios WHERE idusuarios='$alumnocur' ");
			while($filaalumno=mysqli_fetch_array($consultaalumno))
			{
				$creditoalumno=$filaalumno['creditos'];
			}

			if($creditoalumno < $requisitocurso){
				?><script language='javascript'> 
  					alert("El alumno no tiene los suficientes requisitos para asignarse el curso."); 
  					window.location='admin.php'; 
				</script> <?php 
			}
			else
			{

				$query2 = mysqli_query($conn, "SELECT * FROM asignacion_usuario WHERE idusuarios='$alumnocur' ");
				$verificar2=mysqli_num_rows($query2);
			
				if($verificar2<6)
				{
				
					$sql = "INSERT INTO asignacion_usuario (idcurso, idusuarios)
					VALUES ('$cursoal', '$alumnocur')";

					//preguntar si se insertó el dato
					if($conn->query($sql)===TRUE)
						{
							?><script language='javascript'> 
								$('#modalCursoAlumno').modal('hide') 						
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
							alert("Un Alumno solo se puede asignar a 6 cursos."); 
							window.location='admin.php'; 
					</script> <?php 
				}
			
			}
		}
			  
?>