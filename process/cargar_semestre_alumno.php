<?php
	
	include '../conexion/conexion.php';

	$semestrescarr = mysqli_real_escape_string($conn, $_POST["cargarsemestre"]);
	$query = mysqli_query($conn, "SELECT * FROM semestre WHERE idcarrera = '$semestrescarr' ");
	$verificar=mysqli_num_rows($query);

	if($verificar>0)
    {	
    	echo "<option>---Seleccione un Semestre---</option>";
    	while($row = mysqli_fetch_array($query))
    	{
    		echo '<option value="' .$row["idsemestre"]. '">' .$row["nombre"]. '</option>';
    	}
    	mysqli_close($conn);    	
    }
    else 
    {
    	echo "<option>---Seleccione un Semestre---</option>";
    }

 ?>