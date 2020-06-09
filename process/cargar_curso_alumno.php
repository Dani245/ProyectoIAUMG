<?php
	
	include '../conexion/conexion.php';

	$cursoal = mysqli_real_escape_string($conn, $_POST["cargarcurso"]);
	$query = mysqli_query($conn, "SELECT * FROM curso WHERE idsemestre = '$cursoal' ");
	$verificar=mysqli_num_rows($query);

	if($verificar>0)
    {	
    	echo "<option>---Seleccione un Curso---</option>";
    	while($row = mysqli_fetch_array($query))
    	{
    		echo '<option value="' .$row["idcurso"]. '">' .$row["nombre"]. '</option>';
    	}
    	mysqli_close($conn);    	
    }
    else 
    {
    	echo "<option>---Seleccione un Curso---</option>";
    }

 ?>